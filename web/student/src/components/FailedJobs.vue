<template>
    <div>
        <el-row style="text-align: left; line-height: 30px">
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
        </el-row>
        <el-table
                v-loading="loading"
                :data="jobs"
                style="width: 100%"
                :row-class-name="tableRowClassName">
            <el-table-column type="expand">
                <template slot-scope="props">
                    <div style="overflow: auto;">
                        <p title="ID">{{ props.row.id }}</p>
                        <p title="Connection">{{ props.row.connection }}</p>
                        <p title="Queue">{{ props.row.queue }}</p>
                        <p title="Failed at">{{ props.row.failed_at }}</p>
                        <p title="Payload">{{ props.row.payload }}</p>
                        <p title="Exception">{{ props.row.exception }}</p>
                    </div>
                </template>
            </el-table-column>
            <el-table-column
                    prop="id"
                    label="ID"
                    width="100px">
            </el-table-column>
            <el-table-column
                    prop="connection"
                    label="Connection">
            </el-table-column>
            <el-table-column
                    prop="queue"
                    label="Queue">
            </el-table-column>
            <el-table-column
                    prop="payload"
                    label="Payload"
                    :show-overflow-tooltip="true">
            </el-table-column>
            <el-table-column
                    prop="exception"
                    label="Exception"
                    :show-overflow-tooltip="true">
            </el-table-column>
            <el-table-column
                    prop="failed_at"
                    label="Failed at">
            </el-table-column>
            <el-table-column
                    fixed="right"
                    label="Operations"
                    width="100">
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
    .el-dialog{
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
    export default {
        data() {
            return {
                pagination: {
                    total: 0,
                    per_page: 50,
                    current_page: 1,
                    last_page: 0,
                },
                loading: false,
                jobs: []
            }
        },
        methods: {
            chengePerPage(command){
                this.pagination.per_page = command;
                this.getData();
            },
            pChange(page){
                this.pagination.current_page = page;
                this.getData();
            },
            tableRowClassName({row, rowIndex}) {
                if ((rowIndex % 2) == 0) return 'second-row';
            },
            getData() {
                const vm = this;
                this.loading = true;
                this.axios({
                    method: 'get',
                    url: 'failed-jobs',
                    params: {
                        page: vm.pagination.current_page,
                        per_page: vm.pagination.per_page,
                    }
                }).then(function (response) {
                    if(response.status == 200){
                        vm.jobs = response.data.data;
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