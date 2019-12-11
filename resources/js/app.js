/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import 'material-design-icons-iconfont/dist/material-design-icons.css';
import Vue from "vue";
import Vuetify from 'vuetify';


require('./bootstrap');

Vue.use(Vuetify);

window.Vue = Vue;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    'nav-bar',
  () => import(/* webpackChunkName: "nav-bar" */ './components/Nav/Nav.vue')
);

Vue.component(
    'footer-app',
  () => import(/* webpackChunkName: "footer-app" */ './components/Footer/Footer.vue')
);

Vue.component(
    'side-nav',
  () => import(/* webpackChunkName: "side-nav" */ './components/SideNav/SideNav.vue')
);

// Vue.component('nav-bar', require('./components/Nav/Nav.vue').default);
// Vue.component('footer-app', require('./components/Footer/Footer.vue').default);
// Vue.component('side-nav', require('./components/SideNav/SideNav.vue').default);

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
  },
  icons: {
    iconfont: 'md',
  }
});

const app = new Vue({
  vuetify: vuetify
}).$mount('#app');
