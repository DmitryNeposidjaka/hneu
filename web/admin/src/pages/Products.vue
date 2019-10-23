<template>
    <div>
        <el-dialog
                title="Создание продукта"
                :visible.sync="createUserVisible"
                width="60%">
            <create-product style="padding: 0px 100px 0px 50px" v-on:productCreated="productCreated"
                            :categories="categories" :languages="languages">
            </create-product>
        </el-dialog>
        <el-dialog
                title="Редактирование продукта"
                :visible.sync="editUserVisible"
                width="60%">
            <edit-product ref="edit-user-form" style="padding: 0px 100px 0px 50px" v-on:productEdited="productEdited"
                          v-bind:product="userOnEdit" v-on:userEditClose="editUserVisible = false"
                          :categories="categories" v-if="editUserVisible">
            </edit-product>
        </el-dialog>
        <el-dialog
                title="Удаление продукта"
                :visible.sync="deleteUserVisible"
                width="40%">
            <delete-product ref="edit-user-form" style="padding: 0px 100px 0px 50px" v-on:productDeleted="productDeleted"
                            v-bind:product="userOnDelete"
                            v-on:userDeleteClose="deleteUserVisible = false"></delete-product>
        </el-dialog>
        <el-row>
            <el-col :span="4">
                <el-dropdown @command="chengePerPage">
              <span class="el-dropdown-link">
                Отобразить<i class="el-icon-arrow-down el-icon--right"></i>
              </span>
                    <el-dropdown-menu slot="dropdown">
                        <el-dropdown-item :command="10">10</el-dropdown-item>
                        <el-dropdown-item :command="20">20</el-dropdown-item>
                        <el-dropdown-item :command="50">50</el-dropdown-item>
                        <el-dropdown-item :command="100">100</el-dropdown-item>
                        <el-dropdown-item :command="500">500</el-dropdown-item>
                    </el-dropdown-menu>
                </el-dropdown>
            </el-col>
            <div style="text-align: right; width: 70%; float: right;">
                <div style="padding: 0px 50px">
                    <el-button type="primary" icon="el-icon-plus" circle title="Добавить продукт"
                               @click="createUserVisible = true"></el-button>
                </div>
            </div>
        </el-row>
        <el-row style="text-align: right; line-height: 30px; margin: 20px;" :gutter=10>
            <el-col :span="1">
                <el-button type="primary" icon="el-icon-refresh" circle title="Обновить"
                           @click="clearRefresh"></el-button>
            </el-col>
            <el-col :span="4">
                <el-input placeholder="Название" v-model="filters.title"></el-input>
            </el-col>
            <el-col :span="4">
                <el-button type="success" icon="el-icon-search" @click="getData">{{ $t('common.search') }}</el-button>
            </el-col>
        </el-row>
        <el-table
                v-loading="loading"
                :data="data"
                style="width: 100%"
                :row-class-name="tableRowClassName">
            <el-table-column type="expand">
                <template slot-scope="props">
                    <el-card class="box-card">
                        {{ props.row.title }}
                        <!--<div slot="header" class="clearfix">
                            <span class="product-card-title">{{ props.row.title }}</span>
                            <span class="product-card-date">{{ props.row.created_at }}</span>
                        </div>
                        <el-row>
                            <el-col style="padding-left: 20px; margin: 20px 0px; color: #1d68a7">
                                <a :href="defaultUrl+'/'+props.row.lang+'/product/'+props.row.link">{{defaultUrl+'/'+props.row.lang+'/product/'+props.row.link}}</a>
                            </el-col>
                        </el-row>
                        <el-row>
                            <el-col style="padding-left: 20px; margin: 20px 0px; color: #1d68a7">{{props.row.categories.map(function(item, i, arr) {
                                return item.name
                                }).join(', ')}}</el-col>
                        </el-row>
                        <el-row :gutter="20">
                            <el-col :span="16" style="padding-left: 25px;">
                                <div v-html="props.row.description" class="ql-editor">{{ props.row.description }}</div>
                            </el-col>
                            <el-col :span="8">
                                <div class="news-card-image-place" v-if="props.row.thumbnails.length > 0">
                                    <img :src="props.row.thumbnails[0]"/>
                                </div>
                            </el-col>
                        </el-row>
                        <el-row>
                            <div title="Контент" v-html="props.row.content" class="ql-editor">{{ props.row.content }}</div>
                        </el-row>
                        <el-row>
                            <div class="images-block">
                                <div class="img-content" v-for="(img, i) in props.row.thumbnails">
                                    <img width="100%" :src="img" alt="" class="avatar">
                                </div>
                            </div>
                        </el-row>-->
                    </el-card>
                </template>
            </el-table-column>
            <el-table-column
                    prop="title"
                    label="Название">
            </el-table-column>
            <el-table-column
                    prop="lang"
                    label="Язык">
            </el-table-column>
            <el-table-column
                    prop="price"
                    label="Цена">
            </el-table-column>
            <el-table-column
                    prop="created_at"
                    label="Создан в">
            </el-table-column>
            <el-table-column
                    align="right">
                <template slot-scope="scope">

                    <!--<el-button type="text" style="color: cornflowerblue" title="view"><i class="el-icon-view"></i></el-button>-->
                    <el-button type="text" style="color: darkorange" :title="$t('common.edit')" @click="openEditUser(scope.row)"><i
                            class="el-icon-edit"></i></el-button>
                    <el-button type="text" style="color: orangered" :title="$t('common.delete')" @click="openDeleteUser(scope.row)"><i
                            class="el-icon-delete"></i></el-button>
                </template>
            </el-table-column>
        </el-table>
        <el-pagination
                layout="prev, pager, next"
                :page-size="pagination.per_page"
                :total="pagination.total"
                @current-change="pChange">
        </el-pagination>
    </div>
</template>

<style>
    .product-card-date {
        float: right;
        padding: 3px;
        color: grey;
    }

    .product-card-image-place {
        text-align: center;
    }

    .product-card-image-place img {
        width: 200px;
        border: 4px solid #f4f4f5;
        border-radius: 1px;
    }

    .product-card-title {
        color: #1b1e21;
        font-weight: bolder;
        font-size: 18px;
    }

    .el-dialog {
        line-height: 30px
    }

    .el-table .warning-row {
        background: oldlace;
    }

    .el-table .second-row {
        background: #ecf5ff;
    }

    .dialog-tip {
        text-align: left;
        overflow: auto;
        height: auto;
    }
</style>

<script>
    import CreateProduct from '../components/products/CreateProduct';
    import DeleteProduct from '../components/products/DeleteProduct';
    import EditProduct from '../components/products/EditProduct';

    export default {
        components: {CreateProduct, EditProduct, DeleteProduct},
        data() {
            return {
                languages: [
                    {
                        id: 'ua',
                        name: 'Українська'
                    },
                    {
                        id: 'en',
                        name: 'English'
                    },
                    {
                        id: 'ru',
                        name: 'Русский'
                    },
                ],
                defaultUrl: '',
                userOnEdit: null,
                userOnDelete: null,
                createUserVisible: false,
                editUserVisible: false,
                deleteUserVisible: false,
                filters: {
                    email: '',
                    name: '',
                    username: ''
                },
                pagination: {
                    total: 0,
                    per_page: 50,
                    current_page: 1,
                    last_page: 0,
                },
                loading: false,
                detail: false,
                detailData: {},
                data: [],
                categories: []
            }
        },
        computed: {
            firstname() {
                return this.data.firstname + ' ' + this.data.lastname
            }
        },
        methods: {
            openDeleteUser(user) {
                this.userOnDelete = user;
                this.deleteUserVisible = true;
            },
            openEditUser(user) {
                this.userOnEdit = user;
                this.editUserVisible = true;
            },
            productCreated() {
                this.createUserVisible = false;
                this.getData();
            },
            productEdited() {
                this.editUserVisible = false;
                this.getData();
            },
            productDeleted(user) {
                this.deleteUserVisible = false;
                this.$message({
                    dangerouslyUseHTMLString: true,
                    message: 'The Product <strong>' + user.title + '</strong> has been deleted!'
                });
                this.getData();
            },
            clearRefresh() {
                this.filters = {
                    email: '',
                    name: '',
                    username: ''
                };
                this.getData();
            },
            chengePerPage(command) {
                this.pagination.per_page = command;
                this.getData();
            },
            pChange(page) {
                this.pagination.current_page = page;
                this.getData();
            },
            showDetail(row) {
                this.detail = true;
                this.detailData = row
            },
            tableRowClassName({row, rowIndex}) {
                if ((rowIndex % 2) == 0) return 'second-row';
            },
            getData() {
                const vm = this;
                this.loading = true;
                this.axios({
                    method: 'get',
                    url: 'product/all',
                    params: {
                        page: vm.pagination.current_page,
                        per_page: vm.pagination.per_page,
                        filters: vm.filters,
                    }
                }).then(function (response) {
                    if (response.status == 200) {
                        vm.data = response.data.data;
                        vm.pagination.total = response.data.total;
                        vm.pagination.per_page = parseInt(response.data.per_page);
                        vm.pagination.current_page = response.data.current_page;
                        vm.pagination.last_page = response.data.last_page;
                    }
                }).then(function () {
                    vm.loading = false;
                })
            },
            getCategories() {
                const vm = this;
                this.axios({
                    method: 'get',
                    url: 'product/categories/all'
                }).then(function (response) {
                    if (response.status == 200) {
                        vm.categories = response.data;
                    }
                })
            }
        },
        mounted() {
            this.getData();
            this.getCategories();
            this.defaultUrl = process.env.VUE_APP_SERVER_URL;
        }
    }
</script>