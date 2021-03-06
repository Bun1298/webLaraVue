/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 
//  import App from './App.vue';
import navigation from './Navigation.vue';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import axios from 'axios';
import { routes } from './routes';
import Vue from 'vue';
// import Vuetify from './vuetify';

 require('./bootstrap');
 window.Vue = Vue;
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */

 Vue.use(VueRouter);
 Vue.use(VueAxios, axios);
 import Vuetify from 'vuetify';
 import 'vuetify/dist/vuetify.min.css'
 Vue.use(Vuetify);
 
 const router = new VueRouter({
     mode: 'history',
     routes: routes
 });
  
 const app = new Vue({
     el: '#app',
     router: router,
     render: h => h(navigation),
 });