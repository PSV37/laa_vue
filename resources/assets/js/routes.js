import VueRouter from 'vue-router';
import home from './view/home.vue';
import about from './view/about.vue';

let routes=[
    {
        path:'/',
        component: home 
    },
    {
        path:'/about',
        component:  about
    }  
];

export default new VueRouter({
    routes
})