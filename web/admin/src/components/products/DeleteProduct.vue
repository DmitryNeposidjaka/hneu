<template>
<el-row>
    <p>
        Are u sure u want to delete <strong>{{ product.title}}</strong>
    </p>
    <el-button type="danger" @click="getData">Confirm</el-button>
    <el-button type="info" @click="$emit('productDeleted')">Reject</el-button>
</el-row>
</template>

<script>
    export default {
        props: ['product'],

        methods: {
            getData() {
                const vm = this;
                this.loading = true;
                this.axios({
                    method: 'delete',
                    url: 'product/' + vm.product.id,

                }).then(function (response) {
                    if (response.status == 200) {
                        vm.$emit('productDeleted', vm.product);
                    }
                })
            }
        },
    }
</script>