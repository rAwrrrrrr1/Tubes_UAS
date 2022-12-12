//import vue router
import { createRouter, createWebHistory } from 'vue-router'
//define a routes
const routes = [
    {
    path: '/',
    name: 'beranda',
    component: () => import('@/components/DashboardLayout.vue'),
        children:[
            {
                path: "/admin",
                name: "admin.index",
                component: () =>
                import('@/views/Admin/adminPage.vue'),
            },
            {
                path: "/barang",
                name: "barang.index",
                component: () =>
                import('@/views/Barang/indexPage.vue'),
            },
            {
                path: "/barang/create",
                name: "barang.create",
                component: () =>
                import('@/views/Barang/createPage.vue'),
            },
            {
                path: "/barang/edit",
                name: "barang.edit",
                component: () =>
                import('@/views/Barang/editPage.vue'),
            },
            {
                path: "/login",
                name: "login.index",
                component: () =>
                import('@/views/Login/indexPage.vue'),
            },
            {
                path: "/login",
                name: "login.register",
                component: () =>
                import('@/views/Login/registerPage.vue'),
            },
        ], 
    },
]
//create router
const router = createRouter({
history: createWebHistory(),
routes // config routes
})
export default router;
