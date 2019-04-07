<template>
    <el-row :gutter="10">
        <el-col :span="8">
            <el-row style="text-align: right; line-height: 30px; margin: 20px;" :gutter=10>
                <el-col :span="4">
                    <el-button type="primary" icon="el-icon-refresh" circle title="Refresh"
                               @click="clearRefresh"></el-button>
                </el-col>
                <el-col :span="16">
                    <el-input placeholder="Title" v-model="filters.fullname"></el-input>
                </el-col>
                <el-col :span="4">
                    <el-button type="success" icon="el-icon-search" @click="getData">Search</el-button>
                </el-col>
            </el-row>
            <el-table
                    v-loading="loading"
                    :data="data"
                    style="width: 100%"
                    @row-click="rowClick">
                <el-table-column
                        prop="fullname"
                        label="Name"
                        width="180">
                </el-table-column>
                <el-table-column
                        prop="role"
                        label="Role"
                        width="180">
                </el-table-column>
            </el-table>
            <el-pagination
                    layout="prev, pager, next"
                    :page-size="pagination.per_page"
                    :total="pagination.total"
                    @current-change="pChange">
            </el-pagination>
        </el-col>
        <el-col :span="15">
            <div v-if="form.user">Assign to <span style="color: #1d68a7">{{form.user.fullname}}</span></div>
                <el-transfer
                        style="text-align: left; display: inline-block"
                        v-model="form.permissions"
                        filterable
                        :titles="['Abilities', 'Permissions']"
                        :button-texts="['Unassign', 'Assign']"
                        :format="{
                        noChecked: '${total}',
                        hasChecked: '${checked}/${total}'
                      }"
                        :data="_abilities">
                                   <!--<el-button class="transfer-footer" slot="left-footer" size="small">Operation</el-button>-->
                                   <el-button class="transfer-footer" slot="right-footer" size="small" @click="assignAbilities" :disabled="form.user == null">Assign</el-button>
                </el-transfer>
        </el-col>
    </el-row>
</template>

<script>
    export default {
        name: 'PermissionsUsers',
        props: ['roles', 'abilities'],
        data() {
            return {
                data: [],
                form: {
                    user: null,
                    permissions: [],
                },
                filters: {
                    email: '',
                    name: '',
                    username: '',
                    fullname: '',
                },
                pagination: {
                    total: 0,
                    per_page: 5,
                    current_page: 1,
                    last_page: 0,
                },
                loading: false,
            }
        },
        computed: {
            _abilities() {
                 return this.abilities.map(function (item, i, array) {
                    return {
                        key: item.id,
                        label: item.title,
                        disabled: false,
                    }
                });
            }
        },
        methods: {
            handleChange(i) {
                console.log(i)
            },
            rowClick(row, column, event) {
                this.form.user = row;
                this.getUserPermissions(row.id)
            },
            clearRefresh() {
                this.filters = {
                    title: '',
                };
                this.getData();
            },
            pChange(page) {
                this.pagination.current_page = page;
                this.getData();
            },
            assignAbilities(){
                let id = this.form.user.id;
                let formData = {
                    permissions: this.form.permissions
                };
              this.applyPermissions(id, this.getFormData(formData))
            },
            getUserPermissions(id) {
                const vm = this;
                this.axios({
                    method: 'get',
                    url: 'permissions/user/' + id,
                }).then(function (response) {
                    if (response.status == 200) {
                        vm.form.permissions = response.data.map(function (item) {
                            return item.id
                        });
                    }
                })
            },
            applyPermissions(id, formData) {
                const vm = this;
                this.axios({
                    method: 'post',
                    url: 'permissions/user/' + id,
                    data: formData
                }).then(function (response) {
                    if (response.status == 200) {
                        vm.permissions = response.data;
                        vm.$message('Permissions has been applied.')
                    }
                })
            },
            getFormData(data = {}) {
                const formData = new FormData();
                for (var key in data) {
                    formData.append(key, data[key]);
                }
                return formData;
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
                });
            }
        },
        mounted() {
            this.getData();
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>

</style>
