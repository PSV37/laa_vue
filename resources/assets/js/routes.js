import VueRouter from 'vue-router';
import home from './view/home.vue';
import about from './view/about.vue';
import user from './view/user.vue';
import login from './components/Auth/login/login.vue';

let routes = [{
        path: '/',
        component: home
    },
    {
        path: '/about',
        component: about
    },
    {
        path: '/user',
        component: user
    },
    {
        path: '/login',
        component: login
    }
];

export default new VueRouter({
    routes
})