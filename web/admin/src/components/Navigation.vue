<template>
    <el-menu
            :router="true"
            default-active="2"
            class="el-menu-vertical-demo">

        <el-menu-item index="1" :route="{name: 'users'}">
            <i class="far fa-address-card"></i>
            <span>Admins</span>
        </el-menu-item>
    </el-menu>
</template>

<script>
    export default {
        name: 'Navigation',
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    i {
        margin: 0px 10px;
    }
    .el-menu {
        color: #6c757d !important;
        min-width: 200px;
        max-width: 300px;
        text-align: left;
        padding: 20px 40px 40px 20px;
    }
</style>
