<template>
    <el-container>
        <el-header>
            <m-header :user="user"/>
        </el-header>
        <el-container>
            <navigation/>
            <el-main>
                <div class="breadcrumb">
                    <el-breadcrumb separator-class="el-icon-arrow-right">
                        <el-breadcrumb-item :to="{ path: '/' }">{{$t('nav.home')}}</el-breadcrumb-item>
                        <el-breadcrumb-item >{{$t('nav.' + $router.currentRoute.name)}}</el-breadcrumb-item>
                    </el-breadcrumb>
                </div>
                <div class="m-content">
                    <router-view/>
                </div>
            </el-main>
        </el-container>
    </el-container>
</template>

<script>
    import Navigation from '../components/Navigation'
    import MHeader from '../components/Header'

    export default {
        name: 'home',
        data() {
          return {
              user: {
                  username: null
              },
          }
        },
        components: {
            Navigation, MHeader
        },
        methods: {
            getUser() {
                let vm = this;
                this.axios.get('/user/me')
                    .then(function (response) {
                        if (response.status == 200) {
                            vm.user = response.data
                        }
                    })
            }
        },
        mounted() {
            this.getUser();
        //    console.log(this.$router)
        }
    }
</script>

<style>
    .breadcrumb {
        margin: auto;
        width: 90%;
        padding: 20px;
    }

    .el-dropdown-link {
        cursor: pointer;
        color: #409EFF;
    }

    .el-icon-arrow-down {
        font-size: 12px;
    }

    .m-content {
        margin: auto;
        width: 90%;
        padding: 20px;
        background: white;
    }

    .el-main {
        background-color: #f4f4f5;
        color: #333;
        text-align: center;
        /* line-height: 160px; */
    }

    body > .el-container {
        margin-bottom: 40px;
    }

    .el-container:nth-child(5) .el-aside,
    .el-container:nth-child(6) .el-aside {
        line-height: 260px;
    }

    .el-container:nth-child(7) .el-aside {
        line-height: 320px;
    }
</style>