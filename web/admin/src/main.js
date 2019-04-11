import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import axios from './axios'
import VueAxios from 'vue-axios'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import lang from 'element-ui/lib/locale/lang/en'
import locale from 'element-ui/lib/locale'
import VueI18n from 'vue-i18n'
import messages from './assets/langs/data'

// configure language
locale.use(lang);

Vue.use(VueI18n)
Vue.use(ElementUI);
Vue.use(VueAxios, axios);
Vue.config.productionTip = false;

const i18n = new VueI18n({
    locale: 'ru',
    messages
});

new Vue({
  router,
  store,
  i18n,
  render: function (h) { return h(App) }
}).$mount('#app');
