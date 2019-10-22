import Vue from 'vue'
import Router from 'vue-router'
import Home from './templates/Home'
import Login from './templates/Logint'
import Users from './pages/Users'
import Students from './pages/Students'
import News from './pages/News'
import Products from './pages/Products'
import Permissions from './pages/Permissions'
import Pages from './pages/Pages'
import Documents from './pages/Documents'
import Memos from './pages/Memos'

Vue.use(Router);

export default new Router({
  //mode: 'history',
  //base: process.env.BASE_URL,
  routes: [
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
      path: '/',
      name: 'home',
      component: Home,
      children: [
        {
            path: '/users',
            name: 'users',
            component: Users,
        },
        {
            path: '/students',
            name: 'students',
            component: Students,
        },
        {
            path: '/permissions',
            name: 'permissions',
            component: Permissions,
        },
        {
            path: '/news',
            name: 'news',
            component: News,
        },
        {
            path: '/products',
            name: 'products',
            component: Products,
        },
        {
            path: '/pages',
            name: 'pages',
            component: Pages,
        },
        {
            path: '/documents',
            name: 'documents',
            component: Documents,
        },
        {
            path: '/memos',
            name: 'memos',
            component: Memos,
        },
      ]
    },
  ]
})
