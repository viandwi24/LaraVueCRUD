import './bootstrap';
import Vue from 'vue';
import VueRouter from 'vue-router';

import HomeComponent from './components/HomeComponent.vue';
import CreateComponent from './components/CreateComponent.vue';
import UpdateComponent from './components/UpdateComponent.vue';

Vue.use(VueRouter);

const routes = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeComponent
        },
        {
            path: '/create',
            name: 'create',
            component: CreateComponent
        },
        {
            path: '/update/:id',
            name: 'update',
            component: UpdateComponent,
            props: true
        }
    ]
});

export default routes;