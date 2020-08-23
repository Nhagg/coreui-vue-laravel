import VueRouter from "vue-router";
import Vue from 'vue'
import Cookies from "js-cookie";
import Dev from '@/router/dev'
import Prod from '@/router/prod'

Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    routes: process.env.NODE_ENV === 'development' ? Dev : Dev
});

router.beforeEach((to, from, next) => {
    const token = Cookies.get('token')
    if (to.path !== '/login' && !token) {
        next('/login');
    } else if (to.path === '/login' && token) {
        next("/");
    } else {
        next()
    }
});

export default router
