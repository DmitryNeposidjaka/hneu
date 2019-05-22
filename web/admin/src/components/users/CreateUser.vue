<template>
    <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="120px" class="demo-ruleForm">
        <el-form-item label="Name" prop="firstname">
            <el-input v-model="ruleForm.firstname"></el-input>
        </el-form-item>
        <el-form-item label="Last Name" prop="lastname">
            <el-input v-model="ruleForm.lastname"></el-input>
        </el-form-item>
        <el-form-item label="Username" prop="username">
            <el-input v-model="ruleForm.username"></el-input>
        </el-form-item>
        <el-form-item label="Email" prop="email">
            <el-input v-model="ruleForm.email"></el-input>
        </el-form-item>
        <el-form-item label="Password" prop="password">
            <el-input v-model="ruleForm.password" type="password"></el-input>
        </el-form-item>
        <el-form-item label="Password confirm" prop="password_confirmation">
            <el-input v-model="ruleForm.password_confirmation" type="password"></el-input>
        </el-form-item>
        <el-form-item label="Role" prop="role">
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
            <img v-else :src="defaultUrl + '/storage/images/default/img_avatar.png'" class="avatar">
        </el-upload>
        <el-form-item>
            <el-button type="primary" @click="getData">Create</el-button>
            <el-button @click="resetForm('ruleForm')">Reset</el-button>
        </el-form-item>
    </el-form>
</template>

<script>
    export default {
        props: ['roles'],
        data() {
            return {
                imageUrl: '',
                defaultUrl: '',
                ruleForm: {
                    firstname: '',
                    lastname: '',
                    email: '',
                    username: '',
                    password: '',
                    password_confirmation: '',
                    role: ''
                },
                rules: {
                    firstname: [
                        {required: true, message: 'Please input Activity firstname', trigger: 'blur'},
                        {min: 3, max: 255, message: 'Length should be 3 to 255', trigger: 'blur'}
                    ],
                    lastname: [
                        {required: true, message: 'Please input Activity lastname', trigger: 'blur'},
                        {min: 3, max: 255, message: 'Length should be 3 to 255', trigger: 'blur'}
                    ],
                    username: [
                        {required: true, message: 'Please input Activity username', trigger: 'blur'},
                        {min: 3, max: 255, message: 'Length should be 3 to 255', trigger: 'blur'}
                    ],
                    role: [
                        {required: true, message: 'Please input Activity Role', trigger: 'blur'},
                    ],
                    email: [
                        {required: true, message: 'Please input Activity email', trigger: 'blur'},
                        {min: 3, max: 255, message: 'Length should be 3 to 255', trigger: 'blur'},
                        { type: 'email', message: 'Please enter a valid email address', trigger: 'blur' },
                    ],
                    password: [
                        {required: true, message: 'Please input Activity password', trigger: 'blur'},
                        {min: 3, max: 255, message: 'Length should be 3 to 255', trigger: 'blur'},
                    ],
                    password_confirmation: [
                        {required: true, message: 'Please input Activity password confirmation', trigger: 'blur'},
                        {min: 3, max: 255, message: 'Length should be 3 to 255', trigger: 'blur'},
                        {validator: this.passwordConfirm, trigger: 'blur'}
                    ],
                }
            };
        },
        methods: {
            passwordConfirm(rule, value, callback) {
                if (this.ruleForm.password !== this.ruleForm.password_confirmation) {
                    callback(new Error('Confirmation failed'));
                }
            },
            submitForm(formName) {
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                        alert('submit!');
                    } else {
                        console.log('error submit!!');
                        return false;
                    }
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
                this.ruleForm.thumbnail = image;
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
                    url: 'user',
                    data: this.getFormData(this.ruleForm)
                }).then(function (response) {
                    if (response.status == 201) {
                        vm.$emit('userCreated');
                    }
                }).then(function () {
                    vm.resetForm('ruleForm');
                })
            }
        },
        mounted() {
            this.defaultUrl = process.env.VUE_APP_SERVER_URL;
        }
    }
</script>