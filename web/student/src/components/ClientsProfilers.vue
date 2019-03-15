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
                    prop="subscription_timestamp"
                    label="Subscription Timestamp">
            </el-table-column>
            <el-table-column
                    prop="subscription_breadcrumb"
                    label="Breadcrumb">
            </el-table-column>
            <el-table-column
                    prop="subscription_division"
                    label="Division">
            </el-table-column>
            <el-table-column
                    prop="subscription_ip"
                    label="Subscription Ip">
            </el-table-column>
            <el-table-column
                    prop="doi_ip"
                    label="Doi IP">
            </el-table-column>
            <el-table-column
                    prop="doi_timestamp"
                    label="Doi Timestamp">
            </el-table-column>
            <el-table-column
                    prop="doi_date"
                    label="Doi date">
            </el-table-column>
            <el-table-column
                    prop="cancel_doi_timestamp"
                    label="cancel_doi_timestamp">
            </el-table-column>
            <el-table-column
                    prop="cancel_doi_date"
                    label="cancel_doi_date">
            </el-table-column>
            <el-table-column
                    prop="cancel_doi_ip"
                    label="cancel_doi_ip">
            </el-table-column>
            <el-table-column
                    prop="doi_stats"
                    label="doi_stats">
            </el-table-column>
            <el-table-column
                    prop="preference_running"
                    label="preference_running">
            </el-table-column>
            <el-table-column
                    prop="preference_tennis"
                    label="preference_tennis">
            </el-table-column>
            <el-table-column
                    prop="preference_outdoor"
                    label="preference_outdoor">
            </el-table-column>
            <el-table-column
                    prop="preference_fitness"
                    label="preference_fitness">
            </el-table-column>
            <el-table-column
                    prop="preference_wintersport"
                    label="preference_wintersport">
            </el-table-column>
            <el-table-column
                    prop="preference_bike"
                    label="preference_bike">
            </el-table-column>
            <el-table-column
                    prop="preference_athleisure"
                    label="preference_athleisure">
            </el-table-column>
            <el-table-column
                    prop="premium_status"
                    label="premium_status">
            </el-table-column>
            <el-table-column
                    prop="shop_tld"
                    label="shop_tld">
            </el-table-column>
            <el-table-column
                    prop="zipcode_txt"
                    label="zipcode_txt">
            </el-table-column>
            <el-table-column
                    prop="premium_cancel_date"
                    label="premium_cancel_date">
            </el-table-column>
            <el-table-column
                    prop="premium_renewal_date"
                    label="premium_renewal_date">
            </el-table-column>
            <el-table-column
                    prop="frequency_of_newsletter"
                    label="frequency_of_newsletter">
            </el-table-column>
            <el-table-column
                    prop="keller_sports_status"
                    label="keller_sports_status">
            </el-table-column>
            <el-table-column
                    prop="keller_x_status"
                    label="keller_x_status">
            </el-table-column>
            <el-table-column
                    prop="keller_smiles_status"
                    label="keller_smiles_status">
            </el-table-column>
            <el-table-column
                    prop="keller_studios_status"
                    label="keller_studios_status">
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
                    url: 'profilers',
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