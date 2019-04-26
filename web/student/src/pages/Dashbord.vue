<template>
    <div>
        <h2>Курсы</h2>
        <el-collapse v-model="opened" accordion="">
            <el-collapse-item class="box-card" v-for="(course, key) in data" :title="course.fullname" :name="key">
                <div slot="header" class="clearfix">
                    <span>{{course.fullname}}</span>
                </div>
                <p v-html="course.summary" >{{course.summary}}</p>
            </el-collapse-item>
        </el-collapse>
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
                opened: 0,
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
                    url: '/user/courses',
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