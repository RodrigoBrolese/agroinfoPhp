/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue";
import Vuetify from 'vuetify';


require('./bootstrap');

Vue.use(Vuetify);

window.Vue = Vue;

// Vue.use(Vuetify, {
//   theme: {
//     primary: '#4caf50',
//     secondary: '#009688',
//     accent: '#2196f3',
//     error: '#f44336',
//     warning: '#ffc107',
//     info: '#607d8b',
//     success: '#8bc34a'
//   }
// });

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const vuetify = new Vuetify({
  theme: {
    themes: {
      light: {
          primary: '#4caf50',
          secondary: '#009688',
          accent: '#2196f3',
          error: '#f44336',
          warning: '#ffc107',
          info: '#607d8b',
          success: '#8bc34a'
      },
    },
  }
});

const app = new Vue({
  vuetify: vuetify
}).$mount('#app');
