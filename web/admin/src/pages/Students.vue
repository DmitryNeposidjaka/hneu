<template>
    <div>
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
            </div>
        </el-row>
        <el-row style="text-align: right; line-height: 30px; margin: 20px;" :gutter=10>
            <el-col :span="1">
                <el-button type="primary" icon="el-icon-refresh" circle title="Refresh"
                           @click="clearRefresh"></el-button>
            </el-col>
            <el-col :span="4">
                <el-input placeholder="Email" v-model="filters.email"></el-input>
            </el-col>
            <el-col :span="4">
                <el-input placeholder="Name/Lastname" v-model="filters.name"></el-input>
            </el-col>
            <el-col :span="4">
                <el-input placeholder="Username" v-model="filters.username"></el-input>
            </el-col>
            <el-col :span="4">
                <el-button type="success" icon="el-icon-search" @click="getData">{{ $t('common.search') }}</el-button>
            </el-col>
        </el-row>
        <el-row>
            <el-button type="warning" :disabled="!multipleSelection.length" @click="TestFunction" size="mini">Test</el-button>
        </el-row>
        <el-table
                v-loading="loading"
                :data="data"
                style="width: 100%"
                :row-class-name="tableRowClassName"
                @selection-change="handleSelectionChange">
            <el-table-column
                    type="selection"
                    width="55">
            </el-table-column>
            <el-table-column type="expand">
                <template slot-scope="props">
                    <div style="overflow: auto;">
                        <p title="Username">{{ props.row.username }}</p>
                        <p title="Name">{{ props.row.firstname + ' ' + props.row.lastname }} </p>
                        <p title="Email">{{ props.row.email }}</p>
                        <p title="Created">{{ props.row.created_at }}</p>
                    </div>
                </template>
            </el-table-column>
            <el-table-column
                    prop="firstname"
                    label="Name">
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
                <!--<template slot-scope="scope">
                    <el-button type="text" style="color: darkorange" title="edit" @click="openEditUser(scope.row)"><i class="el-icon-edit"></i></el-button>
                    <el-button type="text" style="color: orangered" title="delete" @click="openDeleteUser(scope.row)"><i class="el-icon-delete"></i></el-button>
                </template>-->
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
                multipleSelection: []
            }
        },
        computed: {
            firstname() {
                return this.data.firstname + ' ' + this.data.lastname
            }
        },
        methods: {
            TestFunction() {
                var vm = this;
                this.multipleSelection.forEach(function (item, i, array) {
                    setTimeout(function() {
                        vm.$notify.info({
                            title: 'Тестовое действие',
                            message: item.fullname + ' успешно информирован!'
                        });
                    }, i * 1000);
                })
                this.multipleSelection = [];
            },
            handleSelectionChange(val) {
                this.multipleSelection = val;
            },
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
                    message: 'The user <strong>' + user.username + '</strong> has been deleted!'
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
                    url: 'student/all',
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