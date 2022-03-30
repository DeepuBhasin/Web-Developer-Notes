import {createWebHistory,createRouter} from 'vue-router'
import MainComponent from './components/MainComponent.vue'
import HomeComponent from './components/HomeComponent.vue'
import LoginComponent from './components/LoginComponent.vue'
import ProfileComponent from './components/ProfileComponent.vue'
import PageNotFound from './components/PageNotFound.vue'

const routes = [
    {
        name : 'MainComponent',
        path: '/main/:name',
        component : MainComponent
    },
    {
        name : 'HomeComponent',
        path: '/',
        component : HomeComponent
    },
    {
        name : 'LoginComponent',
        path: '/login/:name',
        component : LoginComponent
    },
    {
        name : 'ProfileComponent',
        path: '/profile/:name',
        component : ProfileComponent
    },
    {
        name : 'NotFound',
        path: '/:pathMatch(.*)*',
        component : PageNotFound
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;