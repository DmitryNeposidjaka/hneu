<template>
    <el-tabs v-model="activeName">
        <el-tab-pane label="Roles" name="roles">
            <permissions-roles :roles="roles" :abilities="abilities"></permissions-roles>
        </el-tab-pane>
        <el-tab-pane label="Users" name="users">
            <permissions-users :roles="roles" :abilities="abilities"></permissions-users>
        </el-tab-pane>
    </el-tabs>
</template>

<style>

</style>

<script>
    import PermissionsRoles from '../components/PermissionsRoles';
    import PermissionsUsers from '../components/PermissionsUsers';

    export default {
        components: {PermissionsRoles, PermissionsUsers},
        data() {
            return {
                activeName: 'roles',
                roles: [],
                abilities: [],
            }
        },
        methods: {
            getData() {
                const vm = this;
                this.loading = true;
                this.axios({
                    method: 'get',
                    url: 'permissions/roles',
                }).then(function (response) {
                    if (response.status == 200) {
                         vm.roles = response.data
                    }
                });
                this.axios({
                    method: 'get',
                    url: 'permissions/abilities',
                }).then(function (response) {
                    if (response.status == 200) {
                         vm.abilities = response.data
                    }
                });
            }
        },
        mounted() {
            this.getData();
        }
    }
</script>