import Vue from 'vue'
import Router from 'vue-router'
import Home from './templates/Home'
import Login from './templates/Logint'
import Users from './pages/Users'
import News from './pages/News'
import Products from './pages/Products'

Vue.use(Router);

export default new Router({
  mode: 'history',
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
            path: '/news',
            name: 'news',
            component: News,
        },
        {
            path: '/products',
            name: 'products',
            component: Products,
        },
      ]
    },
  ]
})
