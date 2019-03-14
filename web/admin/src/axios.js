import axios from 'axios';
import Vue from 'vue';
import Router from './Routes'

const instance = axios.create({
    baseURL: 'http://localhost:88/api/admin',
});
instance.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';

instance.interceptors.request.use(function (request) {

    instance.defaults.params = {
        token: sessionStorage.getItem('_token')
    };

    return request;
}, function (error) {

});

instance.interceptors.response.use(function (response) {
  return response;
}, function (error) {
  if(error.response.status === 401){
      Router.push({name: 'Login'})
  }
  return error.response
});
export default instance;