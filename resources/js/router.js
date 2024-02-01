import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        path: '/',
        redirect: '/customers',
    },
    {
        path: '/customers',
        name: 'customers',
        component: () => import('./Pages/CustomersRoute.vue'),
    },
    {
        path: '/customers/:id/accounts',
        name: 'accounts',
        component: () => import('./Pages/CreateAccountRoute.vue'),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
