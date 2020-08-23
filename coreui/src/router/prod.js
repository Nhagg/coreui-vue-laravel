// Containers
const TheContainer = () => import('@/containers/TheContainer')
// Views
const Dashboard = () => import('@/views/Dashboard')
const CMSManagement = () => import('@/views/pages/cms/CMSManagement')
const CMSCreate = () => import('@/views/pages/cms/CMSCreate')

export default [
    {
        path: '/',
        redirect: '/dashboard',
        name: 'Home',
        component: TheContainer,
        children: [
            {
                path: 'dashboard',
                name: 'Dashboard',
                component: Dashboard
            },
            {
                path: '/cms-pages',
                name: 'cms-pages',
                component: CMSManagement
            },
            {
                path: '/cms-pages/create',
                name: 'cms-pages-create',
                component: CMSCreate
            },
        ]
    },
]
