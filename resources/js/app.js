import {createApp} from 'vue';
import App from './App.vue';
import {createRouter, createWebHistory} from 'vue-router';
import CreateTransportUnitPage from "./pages/CreateTransportUnitPage.vue";
import TransportUnitsPage from "./pages/TransportUnitsPage.vue";

const routes = [
    {
        path: '/',
        component: TransportUnitsPage,
    },
    {
        path: '/transport-units',
        component: TransportUnitsPage,
    },
    {
        path: '/transport-units/create',
        component: CreateTransportUnitPage
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

createApp(App)
    .use(router)
    .mount('#app');
