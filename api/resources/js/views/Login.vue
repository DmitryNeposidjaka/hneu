<template>
    <div class="login">
        <div class="login-header">
            <span>Login</span>
        </div>
        <div class="login-form">
            <el-input
                    class="login-form-input"
                    placeholder="Pick a date"
                    v-model="form.email">
            </el-input>
            <el-input
                    class="login-form-input"
                    type="password"
                    placeholder="Password"
                    v-model="form.password">
            </el-input>
        </div>
        <div class="login-bottom">
            <el-button type="success" @click="login">login</el-button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    email: '',
                    password: '',
                }
            }
        },
        methods: {
            login() {
                const vm = this;
                this.axios({
                    method: 'post',
                    url: 'login',
                    data: this.getFormData(this.form)
                }).then(function (response) {
                    if(response.status == 200){
                        localStorage._token = response.data.token
                        vm.$router.push({name: 'home'})
                    }
                })
            },
            getFormData(data = {}){
                const formData = new FormData();
                for(var key in data){
                    formData.append(key, data[key]);
                }
                return formData;
            },
        }
    }
</script>

<style>
    .login {
        min-width: 150px;
        max-width: 300px;
        margin: auto;
        background: #f4f4f5;
        border-radius: 10px 10px 0px 0px;
        -moz-border-radius: 10px 10px 0px 0px;
        -webkit-border-radius: 10px 10px 0px 0px;
        border: 0px solid grey;
        overflow: hidden;
    }

    .login-header {
        width: inherit;
        text-align: center;
        background: tomato;
        padding: 20px;
        color: cornsilk;
        font-weight: bold;
    }

    .login-form {
        margin: auto;
        padding: 20px;
    }

    .login-form-input {
        width: 100%;
    }

    .login-bottom {
        width: inherit;
        text-align: center;
        padding-bottom: 20px;
    }
</style>