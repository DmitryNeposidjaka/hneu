import axios from 'axios';
import Vue from 'vue';
import Router from './router'

const instance = axios.create({
    baseURL: process.env.VUE_APP_SERVER_URL + '/api/admin',
});
instance.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';

if(!instance.defaults.headers.common['Authorization']) {
    instance.defaults.headers.common['Authorization'] = 'Bearer ' + sessionStorage.getItem('_token');
}

instance.interceptors.request.use(function (request) {
    instance.defaults.headers.common['Authorization'] = 'Bearer ' + sessionStorage.getItem('_token');
    return request;
}, function (error) {

});

instance.interceptors.response.use(function (response) {
    return response;
}, function (error) {
    if(error.response.status === 401){
        Router.push({name: 'login'})
    }
    return error.response
});
export default instance;