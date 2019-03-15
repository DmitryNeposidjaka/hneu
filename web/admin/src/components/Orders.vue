<template>
    <div>
        <el-table
                v-loading="loading"
                :data="data"
                style="width: 100%"
                :row-class-name="tableRowClassName">
            <el-table-column
                    prop="order_number"
                    label="ID"
                    width="100px">
            </el-table-column>
            <el-table-column
                    prop="sku"
                    label="SKU">
            </el-table-column>
            <el-table-column
                    prop="customer_id"
                    label="Customer">
            </el-table-column>
            <el-table-column
                    prop="order_status"
                    label="Status">
            </el-table-column>
            <el-table-column
                    prop="voucher_used"
                    label="Status">
            </el-table-column>
            <el-table-column
                    prop="customer_type"
                    label="Customer Type">
            </el-table-column>
            <el-table-column
                    prop="shop_tld"
                    label="Shop">
            </el-table-column>
            <el-table-column
                    fixed="order_date"
                    label="Date"
                    width="150">
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
                    url: 'orders',
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