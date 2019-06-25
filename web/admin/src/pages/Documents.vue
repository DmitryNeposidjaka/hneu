<template>
    <div>
        <el-dialog
                title="Create document"
                :visible.sync="createUserVisible"
                width="60%">
            <create-document style="padding: 0px 100px 0px 50px" v-on:documentCreated="documentCreated"
                            :categories="categories" :languages="languages">
            </create-document>
        </el-dialog>
        <el-dialog
                title="Edit document"
                :visible.sync="editUserVisible"
                width="60%">
            <edit-document ref="edit-user-form" style="padding: 0px 100px 0px 50px" v-on:documentEdited="documentEdited"
                          v-bind:document="userOnEdit" v-on:userEditClose="editUserVisible = false"
                          :categories="categories" v-if="editUserVisible">
            </edit-document>
        </el-dialog>
        <el-dialog
                title="Delete document"
                :visible.sync="deleteUserVisible"
                width="40%">
            <delete-document ref="edit-user-form" style="padding: 0px 100px 0px 50px" v-on:documentDeleted="documentDeleted"
                            v-bind:document="userOnDelete"
                            v-on:userDeleteClose="deleteUserVisible = false"></delete-document>
        </el-dialog>
        <el-row>
            <el-col :span="4">
                <el-dropdown @command="chengePerPage">
              <span class="el-dropdown-link">
                Perpage<i class="el-icon-arrow-down el-icon--right"></i>
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
                    <el-button type="primary" icon="el-icon-plus" circle title="Add document"
                               @click="createUserVisible = true"></el-button>
                </div>
            </div>
        </el-row>
        <el-row style="text-align: right; line-height: 30px; margin: 20px;" :gutter=10>
            <el-col :span="1">
                <el-button type="primary" icon="el-icon-refresh" circle title="Refresh"
                           @click="clearRefresh"></el-button>
            </el-col>
            <el-col :span="4">
                <el-input placeholder="Title" v-model="filters.title"></el-input>
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
                            <span class="document-card-title">{{ props.row.title }}</span>
                            <span class="document-card-date">{{ props.row.created_at }}</span>
                        </div>
                        <el-row>
                            <el-col style="padding-left: 20px; margin: 20px 0px; color: #1d68a7">
                                <a :href="defaultUrl+'/'+props.row.lang+'/document/'+props.row.link">{{defaultUrl+'/'+props.row.lang+'/document/'+props.row.link}}</a>
                            </el-col>
                        </el-row>
                        <el-row>
                            <el-col style="padding-left: 20px; margin: 20px 0px; color: #1d68a7">{{props.row.document_link}}</el-col>
                        </el-row>
                        <el-row>
                            <div title="Content" v-html="props.row.content" class="ql-editor">{{ props.row.content }}</div>
                        </el-row>
                        <el-row>
                            <div title="file" v-if="props.row.document_path"><a :href="props.row.document_path"><i class="fas fa-file-alt"></i> {{ props.row.document_path }}</a> </div>
                        </el-row>
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
    .document-card-date {
        float: right;
        padding: 3px;
        color: grey;
    }

    .document-card-image-place {
        text-align: center;
    }

    .document-card-image-place img {
        width: 200px;
        border: 4px solid #f4f4f5;
        border-radius: 1px;
    }

    .document-card-title {
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
    import CreateDocument from '../components/documents/CreateDocument';
    import DeleteDocument from '../components/documents/DeleteDocument';
    import EditDocument from '../components/documents/EditDocument';

    export default {
        components: {CreateDocument, EditDocument, DeleteDocument},
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
            documentCreated() {
                this.createUserVisible = false;
                this.getData();
            },
            documentEdited() {
                this.editUserVisible = false;
                this.getData();
            },
            documentDeleted(user) {
                this.deleteUserVisible = false;
                this.$message({
                    dangerouslyUseHTMLString: true,
                    message: 'The document <strong>' + user.title + '</strong> has been deleted!'
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
                    url: 'document/all',
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
                    url: 'document/categories/all'
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