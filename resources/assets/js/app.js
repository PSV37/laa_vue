/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import router from './routes';
import Toast from 'vue-easy-toast';


window.Vue = require('vue');
Vue.use(Toast)
Vue.use(VueRouter);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('message', require('./components/message.vue'));
Vue.component('home', require('./view/home.vue'));
Vue.component('about', require('./view/about.vue'));



const app = new Vue({
    el: '#app',
    router
});