<template>
    <el-menu
            :router="true"
            :default-active="$router.currentRoute.name"
            class="el-menu-vertical-demo">

        <el-menu-item v-for="(item) in nav" :index="item.route" :route="{name: item.route}">
            <i :class="item.icon"></i>
            <span>{{ item.name }}</span>
        </el-menu-item>
    </el-menu>
</template>

<script>
    export default {
        name: 'Navigation',
        data() {
            return {
                nav: [
                    {
                        name: this.$t('nav.users'),
                        icon: 'far fa-address-card',
                        route: 'users'
                    },
                    {
                        name: this.$t('nav.students'),
                        icon: 'fas fa-user-graduate',
                        route: 'students'
                    },
                    {
                        name: this.$t('nav.permissions'),
                        icon: 'fas fa-user-tag',
                        route: 'permissions'
                    },
                    {
                        name: this.$t('nav.news'),
                        icon: 'far fa-newspaper',
                        route: 'news'
                    },
                    {
                        name: this.$t('nav.products'),
                        icon: 'fas fa-shopping-basket',
                        route: 'products'
                    },
                    {
                        name: this.$t('nav.pages'),
                        icon: 'fa fa-window-maximize',
                        route: 'pages'
                    },
                    {
                        name: this.$t('nav.documents'),
                        icon: 'fas fa-file-alt',
                        route: 'documents'
                    },
                    {
                        name: this.$t('nav.memos'),
                        icon: 'far fa-comment-dots',
                        route: 'memos'
                    },
                ]
            }
        }
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
