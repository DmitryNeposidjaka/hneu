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
                    prop="last_order_date"
                    label="Last Order Date">
            </el-table-column>
            <el-table-column
                    prop="premium_subscription_date"
                    label="Date"
                    title="Premium Subscription Date">
            </el-table-column>
            <el-table-column
                    prop="total_revenues"
                    label="Revenues">
            </el-table-column>
            <el-table-column
                    prop="orders_last_30_days_cnt"
                    label="30"
                    title="Orders last 180 days cnt">
            </el-table-column>
            <el-table-column
                    prop="orders_last_90_days_cnt"
                    label="90"
                    title="Orders last 180 days cnt">
            </el-table-column>
            <el-table-column
                    fixed="orders_last_180_days_cnt"
                    label="180"
                    title="Orders last 180 days cnt">
            </el-table-column>
            <el-table-column
                    prop="total_vouchers_used_cnt"
                    label="Used"
                    title="Total vouchers used cnt">
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
                    url: 'client-statistic',
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