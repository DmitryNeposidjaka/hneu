<template>
<el-row>
    <p>
        Are u sure u want to delete <strong>{{ memo.title}}</strong>
    </p>
    <el-button type="danger" @click="getData">Confirm</el-button>
    <el-button type="info" @click="$emit('memoDeleted')">Reject</el-button>
</el-row>
</template>

<script>
    export default {
        props: ['memo'],

        methods: {
            getData() {
                const vm = this;
                this.loading = true;
                this.axios({
                    method: 'delete',
                    url: 'memo/' + vm.memo.id,

                }).then(function (response) {
                    if (response.status == 200) {
                        vm.$emit('memoDeleted', vm.memo);
                    }
                })
            }
        },
    }
</script>