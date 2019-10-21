<template>
    <el-form :model="ruleForm" :rules="rules" :ref="'ruleForm' + user.id" label-width="120px" class="demo-ruleForm">
        <el-form-item label="Имя" prop="firstname">
            <el-input v-model="ruleForm.firstname"></el-input>
        </el-form-item>
        <el-form-item label="Фамилия" prop="lastname">
            <el-input v-model="ruleForm.lastname"></el-input>
        </el-form-item>
        <el-form-item label="Username" prop="username">
            <el-input v-model="ruleForm.username"></el-input>
        </el-form-item>
        <el-form-item label="Email" prop="email">
            <el-input v-model="ruleForm.email"></el-input>
        </el-form-item>
        <el-form-item label="Роль" prop="role">
            <el-select v-model="ruleForm.role" placeholder="Select">
                <el-option
                        v-for="role in roles"
                        :key="role.id"
                        :label="role.title"
                        :value="role.name">
                </el-option>
            </el-select>
        </el-form-item>
        <el-upload
                ref="newsThumb"
                id="file"
                class="avatar-uploader"
                :action="defaultUrl + '/api'"
                :show-file-list="false"
                :on-success="handleAvatarSuccess"
                :http-request="uploadFile"
                :before-upload="beforeAvatarUpload">
            <img v-if="imageUrl" :src="imageUrl" class="avatar">
            <img v-else :src="user.thumbnail_img" class="avatar">
        </el-upload>
        <el-dialog
            width="30%"
            title="Смена пароля"
            :visible.sync="changePasswordVisible"
            append-to-body>
            <reset-password :user="user" v-on:passwordChanged="changePasswordVisible = false"/>
        </el-dialog>
        <div style="margin: 20px 0px">
            <el-button @click="changePasswordVisible = true">Сменить пароль <i class="el-icon-edit"></i></el-button>
        </div>
        <div style="margin: 20px 0px">
            <el-button @click="save('ruleForm' + user.id)" type="success">Сохранить</el-button>
            <el-button @click="resetForm('ruleForm' + user.id)">Обновить</el-button>
            <el-button @click="editClose" type="warning">Закрыть</el-button>
        </div>
    </el-form>
</template>

<script>
    import ResetPassword from './ResetPassword'

    export default {
        props: ['user', 'roles'],
        data() {
            return {
                changePasswordVisible: false,
                imageUrl: '',
                defaultUrl: '',
                ruleForm: {
                    firstname: '',
                    lastname: '',
                    username: '',
                    email: '',
                    role: '',
                    thumbnail: '',
                },
                rules: {
                    firstname: [
                        {required: true, message: 'Укажите Имя', trigger: 'blur'},
                        {min: 1, max: 255, message: 'Длина должна быть от 1 до "255 символов', trigger: 'blur'}
                    ],
                    lastname: [
                        {required: true, message: 'Укажите фамилию', trigger: 'blur'},
                        {min: 1, max: 255, message: 'Длина должна быть от 1 до "255 символов', trigger: 'blur'}
                    ],
                    username: [
                        {required: true, message: 'Укажите username', trigger: 'blur'},
                        {min: 3, max: 255, message: 'Длина должна быть от 3 до "255 символов', trigger: 'blur'}
                    ],
                    role: [
                        {required: true, message: 'Выберите роль', trigger: 'blur'},
                    ],
                    email: [
                        {required: true, message: 'Введите email', trigger: 'blur'},
                        {min: 3, max: 255, message: 'Длина должна быть от 3 до "255 символов', trigger: 'blur'},
                        { type: 'email', message: 'Введите валидный email', trigger: 'blur' },
                    ],
                }
            };
        },
        components: {ResetPassword},
        methods: {
            editClose() {
              this.resetForm('ruleForm' + this.user.id)
                this.$emit('userEditClose');
            },
            submitForm(formName) {
                return this.$refs[formName].validate((valid) => {
                    return valid
                });
            },
            resetForm(formName) {
                this.$refs[formName].resetFields();
            },
            uploadFile() {
                var vm = this;
                var formData = new FormData();
                var files = this.$refs.newsThumb.uploadFiles;
                var image = files.pop().raw;
                formData.append("image", image);
                this.user.thumbnail = image;
                this.axios.post('/temporary?type=images&entity=users', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(function (response) {
                    if(response.status == 200) {
                        vm.imageUrl = response.data
                    }
                })
            },
            handleAvatarSuccess(res, file) {
                this.imageUrl = URL.createObjectURL(file.raw);
            },
            beforeAvatarUpload(file) {
                const isJPG = file.type === 'image/jpeg' || file.type === 'image/png';
                const isLt2M = file.size / 1024 / 1024 < 2;

                if (!isJPG) {
                    this.$message.error('Avatar picture must be JPG or PNG format!');
                }
                if (!isLt2M) {
                    this.$message.error('Avatar picture size can not exceed 2MB!');
                }
                return isJPG && isLt2M;
            },
            getFormData(data = {}){
                const formData = new FormData();
                for(var key in data){
                    formData.append(key, data[key]);
                }
                return formData;
            },
            getData() {
                const vm = this;
                this.loading = true;
                this.axios({
                    method: 'post',
                    url: 'user/' + vm.user.id,
                    data: this.getFormData(this.ruleForm),
                }).then(function (response) {
                    if (response.status == 200) {
                        vm.$emit('userEdited');
                    }
                })
            },
            save(formName) {
                let vm = this;
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                        vm.getData()
                    } else {
                        return false;
                    }
                });
            }
        },
        created() {
            this.defaultUrl = process.env.VUE_APP_SERVER_URL;
            this.ruleForm = this.user;
        }
    }
</script>