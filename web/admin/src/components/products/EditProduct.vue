<template>
    <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="120px" class="demo-ruleForm">
        <el-form-item label="Название" prop="title">
            <el-input v-model="ruleForm.title"></el-input>
        </el-form-item>
        <el-form-item :label="$t('news.link')">
            {{defaultUrl+'/'+ruleForm.lang+'/product/'+ruleForm.link}}
        </el-form-item>
        <el-form-item :label="$t('news.link')" prop="link">
            <el-input v-model="linkMutated"></el-input>
        </el-form-item>
        <el-form-item :label="$t('news.price')" prop="price" style="text-align: left">
            <el-input :type="'number'" v-model="ruleForm.price" style="width: 200px"></el-input>
        </el-form-item>
        <el-form-item label="Описание" prop="description">
            <vue-editor v-model="ruleForm.description"></vue-editor>
        </el-form-item>
        <el-form-item label="Категории" prop="categories">
            <el-select
                    v-model="ruleForm.categories"
                    multiple
                    filterable
                    allow-create
                    default-first-option
                    placeholder="Выберите категорию">
                <el-option
                        v-for="category in categories"
                        :key="category.id"
                        :label="category.name"
                        :value="category.id">
                </el-option>
            </el-select>
        </el-form-item>
        <el-form-item label="Изображения" prop="thumbnail">
        <el-upload
                ref="newsThumb"
                id="file"
                class="avatar-uploader"
                multiple
                :limit="8"
                :action="defaultUrl + '/api'"
                :show-file-list="false"
                :on-success="handleAvatarSuccess"
                :http-request="uploadFile"
                :before-upload="beforeAvatarUpload">
            <el-button size="small" type="primary">Загрузить фото</el-button>
        </el-upload>
        </el-form-item>
        <div class="images-block">
            <div>
                <div class="img-content" v-for="(img, i) in ruleForm.thumbnails" v-if="typeof img === 'string'">
                    <img width="100%" :src="img" alt="" class="avatar">
                    <el-button class="cancel-button" @click="handleRemove(i)" type="danger"
                               icon="el-icon-circle-close-outline" circle style="width: 5px;height: 5px;"></el-button>
                </div>
            </div>
        </div>
        <el-form-item>
            <el-button type="primary" @click="save('ruleForm')">Сохранить</el-button>
            <el-button @click="resetForm('ruleForm')">Очистить</el-button>
        </el-form-item>
    </el-form>
</template>

<style scoped>
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
        border-radius: 4px;
    }
</style>

<script>
    import { VueEditor } from 'vue2-editor'
    import {slugify} from 'transliteration'

    export default {
        components: {VueEditor},
        props: ['product', 'categories'],
        data() {
            return {
                imageUrl: '',
                thumbnailsUrl: [],
                defaultUrl: '',
                dialogVisible: false,
                tempLink: '',
                ruleForm: {
                    title: '',
                    price: '',
                    description: '',
                    thumbnails: [],
                    categories: []
                },
                rules: {
                    title: [
                        {required: true, message: 'Название обязательное!', trigger: 'blur'},
                        {min: 3, max: 255, message: 'Длина должна быть от 3 до 255 символов!', trigger: 'blur'}
                    ],
                    description: [
                        {required: true, message: 'Описание обязательное!', trigger: 'blur'},
                    ],
                    thumbnail: [
                        {validator: this.filesCheck, trigger: 'blur'},
                    ],
                    price: [
                        {required: true, message: 'Цена обязатеьна!', trigger: 'blur'}
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
            },
            priceMutated: {
                get: function () {
                    return this.ruleForm.price
                },
                set: function (val) {
                    this.ruleForm.price = val
                }
            }
        },
        methods: {
            filesCheck(rule, value, callback) {
                if (this.ruleForm.thumbnails.length <= 0) {
                    callback(new Error('Должно быть не мение одного изображения!'));
                }
                callback();
            },
            handleRemoveImages(item) {
                this.ruleForm.images.splice(item, 1);
            },
            handleRemove(item) {
                this.thumbnailsUrl.splice(item, 1);
                this.ruleForm.thumbnails.splice(item, 1);
            },
            uploadFile() {
                var vm = this;
                var formData = new FormData();
                var files = this.$refs.newsThumb.uploadFiles;
                var image = files.pop().raw;
                formData.append("image", image);
                this.imageUrl = image;
                this.ruleForm.thumbnails.push(image);
                this.axios.post('/temporary?type=images&entity=products', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(function (response) {
                    if (response.status == 200) {
                        vm.ruleForm.thumbnails.push(response.data);
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
                return this.$refs[formName].validate((valid) => {
                    return valid
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
                    url: 'product/' + this.product.id,
                    data: this.getFormData(this.ruleForm),
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(function (response) {
                    if (response.status == 200) {
                        vm.$emit('productEdited');
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
            this.ruleForm = this.product;
            this.ruleForm.categories = this.product.categories.map(function (item, i, arr) {
                if(item.id) return item.id;
            });
        }
    }
</script>