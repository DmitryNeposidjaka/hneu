<template>
    <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="120px" class="demo-ruleForm">
        <el-form-item label="Language" prop="lang">
            <el-select
                    v-model="ruleForm.lang"
                    default-first-option
                    placeholder="Choose Language">
                <el-option
                        v-for="lang in languages"
                        :key="lang.id"
                        :label="lang.name"
                        :value="lang.id">
                </el-option>
            </el-select>
        </el-form-item>
        <el-form-item label="Type" prop="type">
            <el-select
                    v-model="ruleForm.type"
                    default-first-option
                    placeholder="Choose Language">
                <el-option
                        v-for="type in types"
                        :key="type.id"
                        :label="type.name"
                        :value="type.id">
                </el-option>
            </el-select>
        </el-form-item>
        <el-form-item label="Link" prop="link">
            <el-input v-model="ruleForm.link"></el-input>
        </el-form-item>
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
        <el-form-item label="Categories" prop="categories">
            <el-select
                    v-model="ruleForm.categories"
                    multiple
                    filterable
                    allow-create
                    default-first-option
                    placeholder="Choose tags for your article">
                <el-option
                        v-for="category in categories"
                        :key="category.id"
                        :label="category.name"
                        :value="category.id">
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
            <img v-else :src="defaultUrl + '/storage/images/default/News.jpg'" class="avatar">
            <i v-else class="el-icon-plus avatar-uploader-icon"></i>
        </el-upload>
        <el-form-item class="form-buttons">
            <div>
                <el-button type="primary" @click="getData">Create</el-button>
                <el-button @click="resetForm('ruleForm')">Reset</el-button>
            </div>
        </el-form-item>
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
        props: ['categories', 'languages'],
        data() {
            return {
                imageUrl: '',
                defaultUrl: '',
                types: [
                    {
                        id: 'article',
                        name: 'Article'
                    },
                    {
                        id: 'advertising',
                        name: 'Advertising'
                    },
                    {
                        id: 'message',
                        name: 'Message'
                    },
                ],
                ruleForm: {
                    link: '',
                    title: '',
                    description: '',
                    content: '',
                    thumbnail: '',
                    categories: [],
                    lang: ''
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
                    type: [
                        {required: true, message: 'Please select Type', trigger: 'blur'},
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
                    if (Array.isArray(data[key])) {
                        data[key].forEach(function (item, i, arr) {
                            formData.append(key + "[" + i + "]", item);
                        });
                    } else {
                        formData.append(key, data[key]);
                    }
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