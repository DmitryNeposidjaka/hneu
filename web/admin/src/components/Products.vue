<template>
    <div>
        <el-table
                v-loading="loading"
                :data="data"
                style="width: 100%"
                :row-class-name="tableRowClassName"
                v-on:cell-click="copy">
            <el-table-column
                    prop="sku_parent"
                    label="SKU"
                    width="100px">
            </el-table-column>
            <el-table-column
                    prop="brand"
                    label="Brand">
            </el-table-column>
            <el-table-column
                    prop="product_name"
                    label="Name">
            </el-table-column>
            <el-table-column
                    prop="product_title"
                    label="Title">
            </el-table-column>
            <el-table-column
                    prop="sport"
                    label="Sport">
            </el-table-column>
            <el-table-column
                    prop="category"
                    label="Category">
            </el-table-column>
            <el-table-column
                    prop="language"
                    label="Language">
            </el-table-column>
            <el-table-column
                    prop="shop"
                    label="Shop">
            </el-table-column>
            <el-table-column
                    prop="product_url"
                    label="P URL"
                    :show-overflow-tooltip="true">
            </el-table-column>
            <el-table-column
                    prop="image_url"
                    label="I URL"
                    :show-overflow-tooltip="true">
            </el-table-column>
        </el-table>
        <el-pagination
                layout="prev, pager, next"
                :total="5"
        @current-change="pagination">
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
    import clipboardJS from 'clipboard'
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
            pagination(page){
                console.log(page)
            },
            copy(row, column, cell, event) {
                const vm = this;
                const data = row[column.property];

                this.$copyText(data).then(function (e) {
                    vm.$message('Copied');
                }, function (e) {
                    vm.$message('Not copied');
                })
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
                    url: 'products',
                }).then(function (response) {
                    if (response.status == 200) {
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