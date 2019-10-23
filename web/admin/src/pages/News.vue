<template>
    <div>
        <el-dialog
                :title="$t('news.create')"
                :visible.sync="actions.createModel.open"
                width="60%">
            <create-news style="padding: 0px 100px 0px 50px" v-on:newsCreated="userCreated"
                         :categories="categories"
                         :type="actions.createModel.type"
                         :languages="languages"></create-news>
        </el-dialog>
        <el-dialog
                :title="$t('news.edit')"
                :visible.sync="actions.editModel.open"
                width="60%">
            <edit-news ref="edit-user-form" style="padding: 0px 100px 0px 50px" v-on:newsEdited="userEdited"
                       v-bind:news="userOnEdit" v-on:userEditClose="editUserVisible = false"
                       :categories="categories"
                       :languages="languages" v-if="actions.editModel.open"></edit-news>
        </el-dialog>
        <el-dialog
                :title="$t('news.delete')"
                :visible.sync="deleteUserVisible"
                width="40%">
            <delete-news ref="edit-user-form" style="padding: 0px 100px 0px 50px" v-on:userDeleted="userDeleted"
                         v-bind:user="userOnDelete" v-on:userDeleteClose="deleteUserVisible = false"></delete-news>
        </el-dialog>
        <el-row>
            <el-col :span="4">
                <el-dropdown @command="changePerPage">
              <span class="el-dropdown-link">
                {{$t('common.perpage')}}<i class="el-icon-arrow-down el-icon--right"></i>
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
                    <el-dropdown @command="handleCommand">
                        <el-button type="primary" icon="el-icon-plus" circle >
                        </el-button>
                        <el-dropdown-menu slot="dropdown">
                            <el-dropdown-item :command="{action: 'createModel', type: 'article'}">Создать новость</el-dropdown-item>
                            <el-dropdown-item :command="{action: 'createModel', type: 'advertising'}">Создать рекламу</el-dropdown-item>
                            <el-dropdown-item :command="{action: 'createModel', type: 'message'}">Создать уведомление</el-dropdown-item>
                        </el-dropdown-menu>
                    </el-dropdown>
                </div>
            </div>
        </el-row>
        <el-row style="text-align: right; line-height: 30px; margin: 20px;" :gutter=10>
            <el-col :span="1">
                <el-button type="primary" icon="el-icon-refresh" circle :title="$t('common.refresh')"
                           @click="clearRefresh"></el-button>
            </el-col>
            <el-col :span="4">
                <el-input :placeholder="$t('news.table.title')" v-model="filters.title"></el-input>
            </el-col>
            <el-col :span="4">
                <el-select v-model="filters.lang" placeholder="Язык">
                    <el-option
                            v-for="item in languages"
                            :key="item.id"
                            :label="item.name"
                            :value="item.id">
                    </el-option>
                </el-select>
            </el-col>
            <el-col :span="4">
                <el-select v-model="filters.type" placeholder="Тип">
                    <el-option
                            v-for="item in types"
                            :key="item.id"
                            :label="item.name"
                            :value="item.id">
                    </el-option>
                </el-select>
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
                        <div slot="header" class="clearfix">
                            <span class="news-card-title">{{ props.row.title }}</span>
                            <span class="news-card-date">{{ props.row.created_at }}</span>
                        </div>
                        <el-row>
                            <el-col style="padding-left: 20px; margin: 20px 0px; color: #1d68a7">
                                <a :href="defaultUrl+'/'+props.row.lang+'/blog/'+props.row.type+'/'+props.row.link">{{defaultUrl+'/'+props.row.lang+'/blog/'+props.row.type+'/'+props.row.link}}</a>
                            </el-col>
                        </el-row>
                        <el-row>
                            <el-col style="padding-left: 20px; margin: 20px 0px; color: #1d68a7">{{props.row.categories.map(function(item, i, arr) {
                                return item.name
                                }).join(', ')}}</el-col>
                        </el-row>
                        <el-row :gutter="20">
                            <el-col :span="16" style="padding-left: 25px;">
                                <div>{{ props.row.description }}</div>
                            </el-col>
                            <el-col :span="8">
                                <div class="news-card-image-place" v-if="props.row.thumbnail">
                                    <img :src="props.row.thumbnail"/>
                                </div>
                            </el-col>
                        </el-row>
                        <el-row>
                            <div title="Content" v-html="props.row.content" class="ql-editor">{{ props.row.content }}</div>
                        </el-row>
                        <el-row>
                            <div class="images-block">
                                <div class="img-content" v-for="(img, i) in props.row.thumbnails">
                                    <img width="100%" :src="img" alt="" class="avatar">
                                </div>
                            </div>
                        </el-row>
                    </el-card>
                </template>
            </el-table-column>
            <el-table-column
                    prop="title"
                    :label="$t('news.table.title')">
            </el-table-column>
            <el-table-column
                    prop="type"
                    :label="$t('news.type')">
            </el-table-column>
            <el-table-column
                    prop="lang"
                    :label="$t('news.language')">
            </el-table-column>
            <el-table-column
                    prop="created_at"
                    :label="$t('news.table.created_at')">
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
    .news-card-date {
        float: right;
        padding: 3px;
        color: grey;
    }

    .news-card-image-place {
        text-align: center;
    }

    .news-card-image-place img {
        width: 300px;
        border: 4px solid #f4f4f5;
        border-radius: 1px;
    }

    .news-card-title {
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

    .avatar {
        width: 178px;
        height: 178px;
        display: block;
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
</style>

<script>
    import CreateNews from '../components/news/CreateNews';
    import DeleteNews from '../components/news/DeleteNews';
    import EditNews from '../components/news/EditNews';

    export default {
        components: {CreateNews, EditNews, DeleteNews},
        data() {
            return {
                types: [
                    {
                        id: 'article',
                        name: 'Статья'
                    },
                    {
                        id: 'advertising',
                        name: 'Реклама'
                    },
                    {
                        id: 'message',
                        name: 'Уведомление'
                    },
                ],
                languages: [
                    {
                        id: 'ua',
                        name: 'Українська'
                    },
                    {
                        id: 'en',
                        name: 'English'
                    },
                    /*{
                        id: 'ru',
                        name: 'Русский'
                    },*/
                ],
                actions: {
                    createModel: {
                        open: false,
                        type: ''
                    },
                    editModel: {
                        open: false,
                        type: ''
                    },
                },
                defaultUrl: '',
                userOnEdit: null,
                userOnDelete: null,
                editUserVisible: false,
                deleteUserVisible: false,
                filters: {
                    title: '',
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
            handleCommand(command) {
                if (this.actions[command.action]){
                    this.actions[command.action].open = true
                    this.actions[command.action].type = command.type
                }
            },
            openDeleteUser(user) {
                this.userOnDelete = user;
                this.deleteUserVisible = true;
            },
            openEditUser(user) {
                this.userOnEdit = user;
                this.actions.editModel.type = user.type
                this.actions.editModel.open = true;
            },
            userCreated() {
                this.actions.createModel.open = false
                this.getData();
                this.getCategories();
            },
            userEdited() {
                this.actions.editModel.open = false
                this.getData();
                this.getCategories();
            },
            userDeleted(news) {
                this.deleteUserVisible = false;
                this.$message({
                    dangerouslyUseHTMLString: true,
                    message: '<strong>' + news.title + '</strong> has been deleted!'
                });
                this.getData();
            },
            clearRefresh() {
                this.filters = {
                    title: '',
                };
                this.getData();
            },
            changePerPage(command) {
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
                    url: 'news/all',
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
                    url: 'news/categories/all'
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