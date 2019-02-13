import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'
import Login from './views/Login.vue'

Vue.use(Router);

let router = new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      redirect: Home,
    },
    {
        path: '/admin/',
        name: 'home',
        component: Home,
    },
    {
      path: '/admin/login',
      name: 'login',
      component: Login
    },
  ]
});

router.beforeEach((to, from, next) => {
    if(!localStorage._token && to.name !== 'login') {
        next({name: 'login'});
    } else {
        next();
    }
});

export default router