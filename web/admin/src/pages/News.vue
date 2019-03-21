<template>
    <div>
        <el-dialog
                title="Create news"
                :visible.sync="createUserVisible"
                width="40%">
            <create-news style="padding: 0px 100px 0px 50px"  v-on:userCreated="userCreated"></create-news>
        </el-dialog>
        <el-dialog
                title="Edit news"
                :visible.sync="editUserVisible"
                width="40%">
            <edit-news ref="edit-user-form" style="padding: 0px 100px 0px 50px"  v-on:userEdited="userEdited" v-bind:user="userOnEdit" v-on:userEditClose="editUserVisible = false"></edit-news>
        </el-dialog>
        <el-dialog
                title="Delete news"
                :visible.sync="deleteUserVisible"
                width="40%">
            <delete-news ref="edit-user-form" style="padding: 0px 100px 0px 50px"  v-on:userDeleted="userDeleted" v-bind:user="userOnDelete" v-on:userDeleteClose="deleteUserVisible = false"></delete-news>
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
                    <el-button type="primary" icon="el-icon-plus" circle title="Add user" @click="createUserVisible = true"></el-button>
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
                <el-button type="success" icon="el-icon-search" @click="getData">Search</el-button>
            </el-col>
        </el-row>
        <el-table
                v-loading="loading"
                :data="data"
                style="width: 100%"
                :row-class-name="tableRowClassName">
            <el-table-column type="expand">
                <template slot-scope="props">
                    <div style="overflow: auto;">
                        <p title="Created">{{ props.row.created_at }}</p>
                        <p title="Title">{{ props.row.title }}</p>
                        <p title="Description">{{ props.row.description }} </p>
                        <p title="Content">{{ props.row.content }}</p>
                    </div>
                </template>
            </el-table-column>
            <el-table-column
                    prop="title"
                    label="Title">
            </el-table-column>
            <el-table-column
                    prop="username"
                    label="Username">
            </el-table-column>
            <el-table-column
                    prop="email"
                    label="Email">
            </el-table-column>
            <el-table-column
                    align="right">
                <template slot-scope="scope">

                    <!--<el-button type="text" style="color: cornflowerblue" title="view"><i class="el-icon-view"></i></el-button>-->
                    <el-button type="text" style="color: darkorange" title="edit" @click="openEditUser(scope.row)"><i class="el-icon-edit"></i></el-button>
                    <el-button type="text" style="color: orangered" title="delete" @click="openDeleteUser(scope.row)"><i class="el-icon-delete"></i></el-button>
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
    import CreateNews from '../components/CreateNews';
    import DeleteNews from '../components/DeleteNews';
    import EditNews from '../components/EditNews';

    export default {
        components: {CreateNews, EditNews, DeleteNews},
        data() {
            return {
                userOnEdit: null,
                userOnDelete: null,
                createUserVisible: false,
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
                data: []
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
            userCreated() {
                this.createUserVisible = false;
                this.getData();
            },
            userEdited() {
                this.editUserVisible = false;
                this.getData();
            },
            userDeleted(user) {
                this.deleteUserVisible = false;
                this.$message({
                    dangerouslyUseHTMLString: true,
                    message: 'The user <strong>user.username</strong> has been deleted!'
                });
                this.getData();
            },
            clearRefresh() {
                this.filters = {
                    title: '',
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
            }
        },
        mounted() {
            this.getData();
        }
    }
</script>