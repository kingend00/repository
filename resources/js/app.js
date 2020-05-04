/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue'
import VueRouter from 'vue-router';
import { routes } from './index';
import axios from 'axios';
import VueAxios from 'vue-axios';
import VueCookies from 'vue-cookies';
import VueSimplemde from 'vue-simplemde';
import Vuex from 'vuex';
import 'simplemde/dist/simplemde.min.css';
import { storeData } from './store/store'
import InputTag from 'vue-input-tag'
import MarkdownItVue from 'markdown-it-vue';
import Paginate from 'vuejs-paginate';



require('./bootstrap');
axios.defaults.baseURL = process.env.MIX_FRONTEND_URL;

window.Vue = require('vue');
Vue.use(VueAxios, axios);
Vue.use(Vuex);
Vue.use(VueRouter);
Vue.use(VueCookies);
Vue.component('vue-simplemde', VueSimplemde);
Vue.component('input-tag', InputTag);
Vue.component('markdown-it-vue', MarkdownItVue);
Vue.component('paginate', Paginate)


Vue.$cookies.config('1d');

const store = new Vuex.Store(storeData);
// console.log('process.env.AWS_URL', process.env.MIX_AWS_URL)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default)) // this working : find all find .vue and render for component

Vue.component('post-group', require('./components/PostGroup.vue').default);


const router = new VueRouter({
    mode: 'history',
    routes
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    store
});