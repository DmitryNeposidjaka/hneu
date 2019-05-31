<template>
    <el-menu
            :router="true"
            default-active="2"
            class="el-menu-vertical-demo">

        <el-menu-item index="1" :route="{name: 'users'}">
            <i class="far fa-address-card"></i>
            <span>{{ $t('nav.users') }}</span>
        </el-menu-item>
        <el-menu-item index="2" :route="{name: 'students'}">
            <i class="fas fa-user-graduate"></i>
            <span>{{ $t('nav.students') }}</span>
        </el-menu-item>
        <el-menu-item index="3" :route="{name: 'permissions'}">
            <i class="fas fa-user-tag"></i>
            <span>{{ $t('nav.permissions') }}</span>
        </el-menu-item>
        <el-menu-item index="4" :route="{name: 'news'}">
            <i class="far fa-newspaper"></i>
            <span>{{ $t('nav.news') }}</span>
        </el-menu-item>
        <el-menu-item index="5" :route="{name: 'products'}">
            <i class="fas fa-shopping-basket"></i>
            <span>{{ $t('nav.products') }}</span>
        </el-menu-item>
        <el-menu-item index="5" :route="{name: 'pages'}">
            <i class="fa fa-window-maximize"></i>
            <span> {{ $t('nav.pages') }} </span>
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
