// require('./bootstrap');
// window.Vue = require('vue');
import './bootstrap';
import Vue from 'vue';
import VueRouter from 'vue-router';

import router from './router';

Vue.use(VueRouter);

Vue.component('app', require('./components/AppComponent.vue').default);

const app = new Vue({
    el: '#app',
    router,
    render: h => h('app')
});
