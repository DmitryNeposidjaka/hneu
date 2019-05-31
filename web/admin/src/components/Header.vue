<template>
    <el-header>
        <div class="k-logo">
            <div style="height: 100%">
                <img src=""
                     style="height: -webkit-fill-available; float: left; display: block">
                <span style="display: block; float: left; margin-left: 20px">Admin Panel</span>
            </div>
        </div>
        <div style="text-align: right; width: 70%; float: right; ">
            <div style="padding: 0px 50px">
                <img height="40px" width="40px" style="border-radius: 50%; margin: 0px 10px; line-height: 60px;" :src="user.thumbnail_img"/>
                <span>{{user.username}}</span>
                <el-button type="text" icon="el-icon-arrow-right" @click="logout" >{{ $t('header.logout') }}
                </el-button>
            </div>
        </div>
    </el-header>
</template>

<script>
    export default {
        props: ['user'],
        name: 'Header',
        methods: {
            logout() {
                sessionStorage.clear();
                this.$router.push({name: 'login'})
            }
        },
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
    .k-logo {
        width: 30%;
        float: left;
        font-size: 20px;
        font-weight: bold;
    }

    .el-header {
        border-bottom: 2px solid #FFFD00;
        color: #495057!;
        line-height: 60px;
        padding: 0px 0px;
    }
</style>
