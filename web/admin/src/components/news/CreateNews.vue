<template>
    <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="120px" class="demo-ruleForm">
        <el-form-item label="Title" prop="title">
            <el-input v-model="ruleForm.title"></el-input>
        </el-form-item>
        <el-form-item label="Description" prop="description">
            <el-input v-model="ruleForm.description"
                      type="textarea"
                      :autosize="{ minRows: 2, maxRows: 4}"></el-input>
        </el-form-item>
        <el-form-item label="Content" prop="content">
            <vue-editor v-model="ruleForm.content"></vue-editor>
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
            <img v-if="imageUrl" :src="defaultUrl + imageUrl" class="avatar">
            <i v-else class="el-icon-plus avatar-uploader-icon"></i>
        </el-upload>
        <el-form-it class="form-buttons">
            <div>
                <el-button type="primary" @click="getData">Create</el-button>
                <el-button @click="resetForm('ruleForm')">Reset</el-button>
            </div>
        </el-form-it>
    </el-form>
</template>

<style>
    .form-buttons div {
        margin: 50px;
    }
    .avatar-uploader .el-upload {
        border: 1px dashed #d9d9d9;
        border-radius: 6px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .avatar-uploader .el-upload:hover {
        border-color: #409EFF;
    }

    .avatar-uploader-icon {
        font-size: 28px;
        color: #8c939d;
        width: 178px;
        height: 178px;
        line-height: 178px;
        text-align: center;
    }

    .avatar {
        width: 178px;
        height: 178px;
        display: block;
    }
</style>


<script>
import { VueEditor } from 'vue2-editor'

    export default {
        components: {VueEditor},
        data() {
            return {
                imageUrl: '',
                defaultUrl: '',
                ruleForm: {
                    title: '',
                    description: '',
                    content: '',
                    thumbnail: '',
                },
                rules: {
                    title: [
                        {required: true, message: 'Please input Activity title', trigger: 'blur'},
                        {min: 3, max: 255, message: 'Length should be 3 to 255', trigger: 'blur'}
                    ],
                    description: [
                        {required: true, message: 'Please input Activity description', trigger: 'blur'},
                        {min: 3, max: 255, message: 'Length should be 3 to 255', trigger: 'blur'}
                    ],
                    content: [
                        {required: true, message: 'Please input Activity content', trigger: 'blur'},
                    ],
                }
            };
        },
        methods: {
            uploadFile() {
                var vm = this;
                var formData = new FormData();
                var files = this.$refs.newsThumb.uploadFiles;
                var image = files.pop().raw;
                formData.append("image", image);
                this.ruleForm.thumbnail = image;
                this.axios.post('/temporary?type=images&entity=news', formData, {
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
            getFormData(data = {}) {
                const formData = new FormData();
                for (var key in data) {
                    formData.append(key, data[key]);
                }
                return formData;
            },
            getData() {
                const vm = this;
                this.loading = true;
                this.axios({
                    method: 'post',
                    url: 'news',
                    data: this.getFormData(this.ruleForm)
                }).then(function (response) {
                    if (response.status == 201) {
                        vm.$emit('newsCreated');
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