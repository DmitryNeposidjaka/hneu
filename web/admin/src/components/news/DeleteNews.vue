<template>
<el-row>
    <p>
        Are u sure u want to delete <strong>{{ user.username}}</strong>
    </p>
    <el-button type="danger" @click="getData">Confirm</el-button>
    <el-button type="info" @click="$emit('userDeleted')">Reject</el-button>
</el-row>
</template>

<script>
    export default {
        props: ['user'],

        methods: {
            getData() {
                const vm = this;
                this.loading = true;
                this.axios({
                    method: 'delete',
                    url: 'news/' + vm.user.id,

                }).then(function (response) {
                    if (response.status == 200) {
                        vm.$emit('userDeleted', vm.user);
                    }
                })
            }
        },
    }
</script>