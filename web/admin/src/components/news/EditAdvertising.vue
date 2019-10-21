<template>
    <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="120px" class="demo-ruleForm">
        <el-row :gutter="20">
            <el-col :span="12">
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
                <el-form-item :label="$t('news.categories')" prop="categories">
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
            </el-col>
            <el-col :span="12">
                <el-form-item prop="thumbnail" style="margin: 0px 0px 50px 0px">
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
                        <div class="block" style="padding: 20px; background: #ebeef5;" v-else>
                            <span class="demonstration">Миниатюра</span>
                            <el-image>
                                <div slot="error" class="image-slot">
                                    <i class="el-icon-picture-outline"></i>
                                </div>
                            </el-image>
                        </div>
                        <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                    </el-upload>
                </el-form-item>
            </el-col>
        </el-row>
        <el-form-item :label="$t('news.title')" prop="title">
            <el-input v-model="ruleForm.title"></el-input>
        </el-form-item>
        <el-form-item :label="$t('news.link')">
            {{defaultUrl+'/'+ruleForm.lang+'/blog/advertising/'+ruleForm.link}}
        </el-form-item>
        <el-form-item :label="$t('news.link')" prop="link">
            <el-input v-model="linkMutated"></el-input>
        </el-form-item>
        <el-form-item :label="$t('news.description')" prop="description">
            <el-input v-model="ruleForm.description"
                      type="textarea"
                      :autosize="{ minRows: 2, maxRows: 4}"></el-input>
        </el-form-item>
        <el-form-item :label="$t('news.content')" prop="content">
            <vue-editor v-model="ruleForm.content"></vue-editor>
        </el-form-item>
        <el-form-item class="form-buttons">
            <div>
                <el-button type="primary" @click="save('ruleForm')">{{$t('news.create')}}</el-button>
                <el-button @click="resetForm('ruleForm')">{{$t('news.clear')}}</el-button>
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
        props: ['news', 'categories', 'languages'],
        data() {
            return {
                imageUrl: '',
                defaultUrl: '',
                thumbnailsUrl: [],
                tempLink: '',
                ruleForm: {
                    link: '',
                    title: '',
                    description: '',
                    content: '',
                    thumbnail: '',
                    type: 'advertising',
                    categories: [],
                    thumbnails: [],
                    lang: 'ua'
                },
                rules: {
                    title: [
                        {required: true, message: 'Название должно быть заполнино!', trigger: 'blur'},
                        {min: 3, max: 255, message: 'Длина текста должна быть от 3 до 255', trigger: 'blur'}
                    ],
                    description: [
                        {required: true, message: 'Описание обязательное', trigger: 'blur'},
                    ],
                    thumbnail: [
                        {required: true, message: 'Миниатюра обязательно', trigger: 'blur'},
                        {max: 2000000, message: 'Не больше 2 Мб', trigger: 'blur'},
                    ],
                    content: [
                        {required: true, message: 'Контен обязательный', trigger: 'blur'},
                    ],
                    lang: [
                        {required: true, message: 'Пожалуйста, выберите язык', trigger: 'blur'},
                    ],
                    link: [
                        {required: true, message: 'ссылка должна быть заполнена', trigger: 'blur'},
                        {regex: '~^(?:http(s)?:\\/\\/)?[\\w.-]+(?:\\.[\\w\\.-]+)+[\\w\\-\\._~:/?#[\\]@!\\$&\'\\(\\)\\*\\+,;=.]+$~gm', message: 'Ссилка должна содержать только латинские буквы и подчеркивания', trigger: 'blur'},
                        {min: 3, max: 255, message: 'Длина ссыдки должна быть от 3 до 255', trigger: 'blur'}
                    ]
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
            uploadImages() {
                var vm = this;
                var formData = new FormData();
                var files = this.$refs.newsImgs.uploadFiles;
                var image = files.pop().raw;
                formData.append("image", image);
                //    this.imageUrl = image;
                this.ruleForm.thumbnails.push(image);
                this.axios.post('/temporary?type=images&entity=products', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(function (response) {
                    if (response.status == 200) {
                        vm.thumbnailsUrl.push(response.data);
                    }
                })
            },
            handleRemove(item) {
                this.thumbnailsUrl.splice(item, 1);
                this.ruleForm.thumbnails.splice(item, 1);
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
                return this.$refs[formName].validate((valid) => {
                    return valid
                });
            },
            resetForm(formName) {
                this.$refs[formName].resetFields();
                this.imageUrl = ''
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
                    url: 'news/'+ vm.news.id,
                    data: this.getFormData(this.ruleForm)
                }).then(function (response) {
                    if (response.status == 200) {
                        vm.$emit('newsEdited');
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
        mounted() {
            this.defaultUrl = process.env.VUE_APP_SERVER_URL;
        },
        created() {
            this.defaultUrl = process.env.VUE_APP_SERVER_URL;
            this.ruleForm = this.news;
            this.ruleForm.categories = this.news.categories.map(function (item, i, arr) {
                if(item.id) return item.id;
            });
        }

    }
</script>