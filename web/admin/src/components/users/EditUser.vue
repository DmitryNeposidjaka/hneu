<template>
    <el-form :model="user" :rules="rules" :ref="'ruleForm' + user.id" label-width="120px" class="demo-ruleForm">
        <el-form-item label="Name" prop="firstname">
            <el-input v-model="user.firstname"></el-input>
        </el-form-item>
        <el-form-item label="Last Name" prop="lastname">
            <el-input v-model="user.lastname"></el-input>
        </el-form-item>
        <el-form-item label="Username" prop="username">
            <el-input v-model="user.username"></el-input>
        </el-form-item>
        <el-form-item label="Email" prop="email">
            <el-input v-model="user.email"></el-input>
        </el-form-item>
        <el-form-item label="Role" prop="role">
            <el-select v-model="user.role" placeholder="Select">
                <el-option
                        v-for="role in roles"
                        :key="role.id"
                        :label="role.title"
                        :value="role.name">
                </el-option>
            </el-select>
        </el-form-item>
        <el-form-item>
            <el-button @click="getData" type="success">Save</el-button>
            <el-button @click="resetForm('ruleForm' + user.id)">Reset</el-button>
            <el-button @click="editClose" type="warning">Close</el-button>
        </el-form-item>
    </el-form>
</template>

<script>
    export default {
        props: ['user', 'roles'],
        data() {
            return {
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
                    email: [
                        {required: true, message: 'Please input Activity email', trigger: 'blur'},
                        {min: 3, max: 255, message: 'Length should be 3 to 255', trigger: 'blur'},
                        { type: 'email', message: 'Please enter a valid email address', trigger: 'blur' },
                    ],
                }
            };
        },
        methods: {
            editClose() {
              this.resetForm('ruleForm' + this.user.id)
                this.$emit('userEditClose');
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
                    data: this.getFormData(this.user),
                }).then(function (response) {
                    if (response.status == 200) {
                        vm.$emit('userEdited');
                    }
                })
            }
        },
    }
</script>