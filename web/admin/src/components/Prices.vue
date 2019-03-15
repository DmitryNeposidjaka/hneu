<template>
    <div>
        <el-table
                v-loading="loading"
                :data="data"
                style="width: 100%"
                :row-class-name="tableRowClassName">
            <el-table-column
                    prop="sku"
                    label="SKU"
                    width="100px">
            </el-table-column>
            <el-table-column
                    prop="price_de"
                    label="DE">
            </el-table-column>
            <el-table-column
                    prop="price_fr"
                    label="FR">
            </el-table-column>
            <el-table-column
                    prop="ek_de"
                    label="EK DE">
            </el-table-column>
            <el-table-column
                    prop="ek_fr"
                    label="EK DE">
            </el-table-column>
            <el-table-column
                    prop="premium_de"
                    label="Premium De">
            </el-table-column>
            <el-table-column
                    prop="premium_fr"
                    label="Premium De">
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
                    url: 'prices',
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