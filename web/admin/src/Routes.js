import Vue from 'vue';
import Router from 'vue-router';

import Layout from '@/components/Layout/Layout';
import TypographyPage from '@/pages/Typography/Typography';
import TablesBasicPage from '@/pages/Basic/Basic';
import GoogleMapPage from '@/pages/Google/Google';
import AnalyticsPage from '@/pages/Dashboard/Dashboard';
import UsersPage from '@/pages/Users/Users';
import ChartsPage from '@/pages/Charts/Charts';
import Login from '@/pages/Login/Login';
import ErrorPage from '@/pages/Error/Error';
import IconsPage from '@/pages/Icons/Icons';
import NotificationsPage from '@/pages/Notifications/Notifications';

Vue.use(Router);

export default new Router({
  mode: 'hash',
  routes: [
    {
      path: '/login',
      name: 'Login',
      component: Login,
    },
    {
      path: '/error',
      name: 'Error',
      component: ErrorPage,
    },
    {
      path: '/home',
      redirect: to => { 'UsersPage' },
    },
    {
      path: '/app',
      name: 'Layout',
      component: Layout,
      children: [
        {
          path: 'users',
          name: 'UsersPage',
          component: UsersPage,
        },
        {
          path: 'dashboard',
          name: 'AnalyticsPage',
          component: AnalyticsPage,
        },
        {
          path: 'typography',
          name: 'TypographyPage',
          component: TypographyPage,
        },
        {
          path: 'ui/icons',
          name: 'IconsPage',
          component: IconsPage,
        },
        {
          path: 'notifications',
          name: 'NotificationsPage',
          component: NotificationsPage,
        },
        {
          path: 'ui/charts',
          name: 'ChartsPage',
          component: ChartsPage,
        },
        {
          path: 'tables',
          name: 'TablesBasicPage',
          component: TablesBasicPage,
        },
        {
          path: 'ui/maps',
          name: 'GoogleMapPage',
          component: GoogleMapPage,
        },
      ],
    },
  ],
});
