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
                :data="data"
                style="width: 100%"
                :row-class-name="tableRowClassName"
                :cell-style="cellStyle">
            <el-table-column
                    prop="cst_subscription_timestamp"
                    label="Subscription Timestamp">
            </el-table-column>
            <el-table-column
                    prop="cst_subscription_breadcrumb"
                    label="Breadcrumb">
            </el-table-column>
            <el-table-column
                    prop="cst_subscription_division"
                    label="Division">
            </el-table-column>
            <el-table-column
                    prop="cst_subscription_ip"
                    label="Subscription Ip">
            </el-table-column>
            <el-table-column
                    prop="cst_doi_ip"
                    label="Doi IP">
            </el-table-column>
            <el-table-column
                    prop="cst_doi_timestamp"
                    label="Doi Timestamp">
            </el-table-column>
            <el-table-column
                    prop="cst_doi_date"
                    label="Doi date">
            </el-table-column>
            <el-table-column
                    prop="cst_cancel_doi_timestamp"
                    label="Cancel doi timestamp">
            </el-table-column>
            <el-table-column
                    prop="cst_cancel_doi_date"
                    label="Cancel doi date">
            </el-table-column>
            <el-table-column
                    prop="cst_cancel_doi_ip"
                    label="Cancel doi ip">
            </el-table-column>
            <el-table-column
                    prop="cst_doi_stats"
                    label="Doi stats">
            </el-table-column>
            <el-table-column
                    prop="cst_preference_running"
                    label="Preference running">
            </el-table-column>
            <el-table-column
                    prop="cst_preference_tennis"
                    label="Preference tennis">
            </el-table-column>
            <el-table-column
                    prop="cst_preference_outdoor"
                    label="Preference outdoor">
            </el-table-column>
            <el-table-column
                    prop="cst_preference_fitness"
                    label="Preference fitness">
            </el-table-column>
            <el-table-column
                    prop="cst_preference_wintersport"
                    label="Preference wintersport">
            </el-table-column>
            <el-table-column
                    prop="cst_preference_bike"
                    label="Preference_bike">
            </el-table-column>
            <el-table-column
                    prop="cst_preference_athleisure"
                    label="Preference athleisure">
            </el-table-column>
            <el-table-column
                    prop="cst_premium_status"
                    label="Premium status">
            </el-table-column>
            <el-table-column
                    prop="cst_shop_tld"
                    label="Shop tld">
            </el-table-column>
            <el-table-column
                    prop="cst_zipcode_txt"
                    label="Zipcode txt">
            </el-table-column>
            <el-table-column
                    prop="cst_premium_cancel_date"
                    label="Premium cancel date">
            </el-table-column>
            <el-table-column
                    prop="cst_premium_renewal_date"
                    label="Premium renewal date">
            </el-table-column>
            <el-table-column
                    prop="cst_frequency_of_newsletter"
                    label="Frequency of newsletter">
            </el-table-column>
            <el-table-column
                    prop="cst_keller_sports_status"
                    label="Keller sports status">
            </el-table-column>
            <el-table-column
                    prop="cst_keller_x_status"
                    label="Keller x status">
            </el-table-column>
            <el-table-column
                    prop="cst_keller_smiles_status"
                    label="Keller smiles status">
            </el-table-column>
            <el-table-column
                    prop="cst_keller_studios_status"
                    label="Keller studios status">
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
                detailData: {},
                data: []
            }
        },
        methods: {
            cellStyle({row, column, rowIndex, columnIndex}) {
                let text = row[column.property];
                if(text === 'true') return 'color: #32cd32;';
                if(text === 'false') return 'color: #FF3E3E;';
            },
            chengePerPage(command) {
                this.pagination.per_page = command;
                this.getData();
            },
            pChange(page) {
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
                    url: 'full-profilers',
                    params: {
                        page: vm.pagination.current_page,
                        per_page: vm.pagination.per_page,
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
            }
        },
        mounted() {
            this.getData();
        }
    }
</script>