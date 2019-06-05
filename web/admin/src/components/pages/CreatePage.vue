<template>
        <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="120px" class="demo-ruleForm">
        <el-form-item :label="$t('news.language')" prop="lang">
            <el-select
                    v-model="ruleForm.lang"
                    default-first-option
                    :placeholder="$t('news.choose_language')">
                <el-option
                        v-for="lang in languages"
                        :key="lang.id"
                        :label="lang.name"
                        :value="lang.id">
                </el-option>
            </el-select>
        </el-form-item>
        <el-form-item :label="$t('news.title')" prop="title">
            <el-input v-model="ruleForm.title"></el-input>
        </el-form-item>
        <el-form-item :label="$t('news.link')">
            {{defaultUrl+'/'+ruleForm.lang+'/page/'+ruleForm.link}}
        </el-form-item>
            <el-form-item :label="$t('news.link')" prop="link">
                <el-input v-model="linkMutated"></el-input>
            </el-form-item>
            <el-tabs v-model="tab">
                <el-tab-pane label="Редактор" name="redactor">
                    <el-form-item :label="$t('news.content')" prop="content">
                        <vue-editor v-model="ruleForm.content"></vue-editor>
                    </el-form-item>
                </el-tab-pane>
                <el-tab-pane label="Код" name="code">
                    <el-input v-model="ruleForm.content"
                              type="textarea"
                              :autosize="{ minRows: 30, maxRows: 80}"></el-input>
                </el-tab-pane>
                <el-tab-pane label="Просмотр" name="viewer">
                    <div v-html="ruleForm.content">{{ruleForm.content}}</div>
                </el-tab-pane>
            </el-tabs>
        <el-form-item class="form-buttons">
            <div>
                <el-button type="primary" @click="getData">{{$t('news.create')}}</el-button>
                <el-button @click="resetForm('ruleForm')">{{$t('news.clear')}}</el-button>
            </div>
        </el-form-item>
        </el-form>
</template>

<style scoped>
    @import '../../assets/css/material-kit.css';
    @import '../../assets/css/style.css';
    @import '../../assets/css/vertical-nav.css';
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

    .cancel-button {
        position: relative;
        right: -75px;
        bottom: 190px;
    }

    .images-block {
        width: 100%;
    }

    .img-content {
        width: 200px;
        height: 200px;
        margin: 0px 5px;
        display: inline-block;
    }

    .avatar-uploader .el-upload {
        border: 1px dashed #d9d9d9;
        border-radius: 6px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }
</style>


<script>

    import { VueEditor } from 'vue2-editor'
    import {slugify} from 'transliteration'

    export default {
        components: {VueEditor},
        props: ['categories', 'languages'],
        data() {
            return {
                tab: 'redactor',
                imageUrl: '',
                defaultUrl: '',
                thumbnailsUrl: [],
                tempLink: '',
                ruleForm: {
                    link: '',
                    title: '',
                    description: '',
                    content: '',
                    lang: 'ua'
                },
                rules: {
                    title: [
                        {required: true, message: 'Please input Activity title', trigger: 'blur'},
                        {min: 3, max: 255, message: 'Length should be 3 to 255', trigger: 'blur'}
                    ],
                    content: [
                        {required: true, message: 'Please input Activity content', trigger: 'blur'},
                    ],
                    lang: [
                        {required: true, message: 'Please select Language', trigger: 'blur'},
                    ],
                    link: [
                        {required: true, message: 'Please input link', trigger: 'blur'},
                        {min: 3, max: 255, message: 'Length should be 3 to 255', trigger: 'blur'}
                    ],
                }
            };
        },
        computed: {
            linkMutated: {
                get: function () {
                    if (this.tempLink == '') {
                        this.ruleForm.link = slugify(this.ruleForm.title)
                    }
                    return this.ruleForm.link
                },
                set: function (val) {
                    this.tempLink = val
                    this.ruleForm.link = slugify(val)
                }
            }
        },
        methods: {
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
                    url: 'pages',
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