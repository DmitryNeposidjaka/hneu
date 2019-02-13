import Vue from 'vue'
import App from './App.vue'
import router from './router'
import axios from './axios'
import VueAxios from 'vue-axios'
import VueClipboard from 'vue-clipboard2'
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue);
Vue.use(VueClipboard)
Vue.use(VueAxios, axios)

Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
