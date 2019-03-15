<template>
    <el-header>
        <div class="k-logo">
            <div style="height: 100%">
                <img src=""
                     style="height: -webkit-fill-available; float: left; display: block">
                <span style="display: block; float: left; margin-left: 20px">Keller CRM</span>
            </div>
        </div>
        <div style="text-align: right; width: 70%; float: right;">
            <div style="padding: 0px 50px">
                <span>Tom</span>
                <el-button type="text" icon="el-icon-arrow-right" @click="logout" style="color: floralwhite;">Logout</el-button>
            </div>
        </div>
    </el-header>
</template>

<script>
    export default {
        name: 'Header',
        methods: {
            logout() {
                /*localStorage.clear();
                this.$router.push({name: 'home'})*/
            }
        }
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
        color: #495057;
        line-height: 60px;
        padding: 0px 0px;
    }
</style>
