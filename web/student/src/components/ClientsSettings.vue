<template>
    <div>
        <el-table
                v-loading="loading"
                :data="data"
                style="width: 100%"
                :row-class-name="tableRowClassName">
            <el-table-column
                    prop="client_id"
                    label="ID"
                    width="100px">
            </el-table-column>
            <el-table-column
                    prop="preference_sport_1"
                    label="Sport 1">
            </el-table-column>
            <el-table-column
                    prop="preference_sport_2"
                    label="Sport 2">
            </el-table-column>
            <el-table-column
                    prop="currency"
                    label="Currency">
            </el-table-column>
            <el-table-column
                    prop="language"
                    label="Language">
            </el-table-column>
            <el-table-column
                    prop="training_interval"
                    label="Interval">
            </el-table-column>
        </el-table>
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
                loading: false,
                detail: false,
                detailData: {},
                data: []
            }
        },
        methods: {
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
                    url: 'client-settings',
                }).then(function (response) {
                    if(response.status == 200){
                        vm.data = response.data
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