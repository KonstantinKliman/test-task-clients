import {createRouter, createWebHistory} from 'vue-router'
import ClientsPage from "@/views/ClientsPage.vue";
import LoginPage from "@/views/LoginPage.vue";
import RegisterPage from "@/views/RegisterPage.vue";
import HomePage from "@/views/HomePage.vue";
import CreateClientsPage from "@/views/CreateClientsPage.vue";

const router = createRouter({
    linkActiveClass: 'header__link-active',
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomePage,
        },
        {
            path: '/register',
            name: 'register',
            component: RegisterPage
        },
        {
            path: '/login',
            name: 'login',
            component: LoginPage
        },
        {
            path: '/clients',
            name: 'clients',
            component: ClientsPage,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/clients/create',
            name: 'createClients',
            component: CreateClientsPage,
            meta: {
                requiresAuth: true
            }
        }
    ]
})

router.beforeEach((to, from, next) => {
    const isAuth = !!localStorage.getItem('token');
    const requiresAuth = to.matched.some(record => record.meta.requiresAuth);

    if (isAuth && (to.name === 'login' || to.name === 'register')) {
        next('/');
        return;
    }

    if (requiresAuth && !isAuth) {
        next('/login');
        return;
    }

    next();
});


export default router
