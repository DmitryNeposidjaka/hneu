import Vue from 'vue'
import Router from 'vue-router'
import Home from './templates/Home'
import Login from './templates/Logint'
import Dashbord from './pages/Dashbord'

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
      redirect: to => {return {name: 'dashbord'}},
      children: [
          {
              path: '/dashbord',
              name: 'dashbord',
              component: Dashbord,
          }
      ]
    },
  ]
})
