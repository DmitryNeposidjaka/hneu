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
        <el-form-item>
            <el-button type="primary" @click="getData">Create</el-button>
            <el-button @click="resetForm('ruleForm')">Reset</el-button>
        </el-form-item>
    </el-form>
</template>

<script>
    export default {
        data() {
            return {
                ruleForm: {
                    firstname: '',
                    lastname: '',
                    email: '',
                    username: '',
                    password: '',
                    password_confirmation: '',
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
        }
    }
</script>