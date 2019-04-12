<template>
    <div>
<!--        <el-row style="text-align: left; line-height: 30px">
            <el-col :span="4">
                <el-dropdown @command="chengePerPage">
              <span class="el-dropdown-link">
                Perpage<i class="el-icon-arrow-down el-icon&#45;&#45;right"></i>
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
            <el-col :span="4">
              <span class="el-dropdown-link">
                Items: {{data.length}}
              </span>
            </el-col>
        </el-row>
        <el-row style="text-align: right; line-height: 30px; margin: 20px;" :gutter=10>
            <el-col :span="1">
                <el-button type="primary" icon="el-icon-refresh" circle title="Refresh"
                           @click="clearRefresh"></el-button>
            </el-col>
            <el-col :span="4">
                <el-input placeholder="Email" v-model="filters.email_address"></el-input>
            </el-col>
            <el-col :span="4">
                <el-input placeholder="Mobile" v-model="filters.mobile_number"></el-input>
            </el-col>
            <el-col :span="4">
                <el-input placeholder="UUID" v-model="filters.uuid"></el-input>
            </el-col>
            <el-col :span="4">
                <el-radio-group v-model="filters.in_salesforce" title="In Salesforce">
                    <el-radio-button name="All" :label="null">All</el-radio-button>
                    <el-radio-button name="In" :label="1">In</el-radio-button>
                    <el-radio-button name="Out" :label="0">Out</el-radio-button>
                </el-radio-group>
            </el-col>
            <el-col :span="4">
                <el-button type="success" icon="el-icon-search" @click="getData">Search</el-button>
            </el-col>
        </el-row>-->
        <el-dialog
                :title="$t('user.create')"
                :visible.sync="createUserVisible"
                width="40%">
            <create-user style="padding: 0px 100px 0px 50px"  v-on:userCreated="userCreated" :roles="roles"></create-user>
        </el-dialog>
        <el-dialog
                :title="$t('user.edit')"
                :visible.sync="editUserVisible"
                width="40%">
            <edit-user ref="edit-user-form" style="padding: 0px 100px 0px 50px"  v-on:userEdited="userEdited" v-bind:user="userOnEdit" v-on:userEditClose="editUserVisible = false" :roles="roles" v-if="editUserVisible"></edit-user>
        </el-dialog>
        <el-dialog
                :title="$t('user.delete')"
                :visible.sync="deleteUserVisible"
                width="40%">
            <delete-user ref="edit-user-form" style="padding: 0px 100px 0px 50px"  v-on:userDeleted="userDeleted" v-bind:user="userOnDelete" v-on:userDeleteClose="deleteUserVisible = false"></delete-user>
        </el-dialog>
        <el-row>
            <el-col :span="4">
                <el-dropdown @command="chengePerPage">
                    <span class="el-dropdown-link">
                        {{ $t('common.perpage') }}<i class="el-icon-arrow-down el-icon--right"></i>
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
                    <el-button type="primary" icon="el-icon-plus" circle :title="$t('user.add')" @click="createUserVisible = true"></el-button>
                </div>
            </div>
        </el-row>
        <el-row style="text-align: right; line-height: 30px; margin: 20px;" :gutter=10>
            <el-col :span="1">
                <el-button type="primary" icon="el-icon-refresh" circle :title="$t('common.refresh')"
                           @click="clearRefresh"></el-button>
            </el-col>
            <el-col :span="4">
                <el-input placeholder="Email" v-model="filters.email"></el-input>
            </el-col>
            <el-col :span="4">
                <el-input :placeholder="$t('user.table.name_username')" v-model="filters.name"></el-input>
            </el-col>
            <el-col :span="4">
                <el-input placeholder="Username" v-model="filters.username"></el-input>
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
                    <div style="overflow: auto;">
                        <div class="table-thumbnail">
                            <img width="100%" :src="props.row.thumbnail"/>
                        </div>
                        <div class="table-data">
                            <div class="content">
                                <div class="fullname">{{ props.row.fullname }}</div>
                                <div class="username">@{{ props.row.username }}</div>
                            </div>
                            <p title="Email"><span>Email</span>: <span>{{ props.row.email }}</span></p>
                            <p title="Created"><span>{{ $t('user.table.created_at') }}</span>: <span>{{ props.row.created_at }}</span></p>
                        </div>
                    </div>
                </template>
            </el-table-column>
            <el-table-column
                    prop="fullname"
                    :label="$t('user.table.name')">
            </el-table-column>
            <el-table-column
                    prop="email"
                    label="Email">
            </el-table-column>
            <el-table-column
                    align="right">
                <template slot-scope="scope">

                    <!--<el-button type="text" style="color: cornflowerblue" title="view"><i class="el-icon-view"></i></el-button>-->
                    <el-button type="text" style="color: darkorange" :title="$t('common.edit')" @click="openEditUser(scope.row)"><i class="el-icon-edit"></i></el-button>
                    <el-button type="text" style="color: orangered" :title="$t('common.delete')" @click="openDeleteUser(scope.row)"><i class="el-icon-delete"></i></el-button>
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
    .table-thumbnail {
        width: 200px;
        float: left;
    }
    .table-data {
        float: left;
        margin: 0px 40px;
        width: 400px;
    }

    .table-data .content {
        margin: 0px auto 40px auto;
        width: 200px;
    }

    .table-data .content .fullname{
        font-size: 18px;
        font-weight: bold;
        font-style: italic;
    }

    .table-data .content .username{
        font-size: 14px;
        color: #909399;
    }

    p>span:first-child{
        font-weight: bold;
        width: 50px;
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
    import CreateUser from '../components/users/CreateUser';
    import DeleteUser from '../components/users/DeleteUser';
    import EditUser from '../components/users/EditUser';

    export default {
        components: {CreateUser, EditUser, DeleteUser},
        data() {
            return {
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
                roles: [],
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
                    message: 'The user <strong>'+ user.username +'</strong> has been deleted!'
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
                    url: 'user/all',
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
            getRoles() {
                const vm = this;
                this.axios({
                    method: 'get',
                    url: 'permissions/roles',
                }).then(function (response) {
                    if (response.status == 200) {
                        vm.roles = response.data;
                    }
                })
            }
        },
        mounted() {
            this.getRoles();
            this.getData();
        }
    }
</script>