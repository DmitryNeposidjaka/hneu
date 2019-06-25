<template>
<el-row>
    <p>
        Are u sure u want to delete <strong>{{ document.title}}</strong>
    </p>
    <el-button type="danger" @click="getData">Confirm</el-button>
    <el-button type="info" @click="$emit('documentDeleted')">Reject</el-button>
</el-row>
</template>

<script>
    export default {
        props: ['document'],

        methods: {
            getData() {
                const vm = this;
                this.loading = true;
                this.axios({
                    method: 'delete',
                    url: 'document/' + vm.document.id,

                }).then(function (response) {
                    if (response.status == 200) {
                        vm.$emit('documentDeleted', vm.document);
                    }
                })
            }
        },
    }
</script>