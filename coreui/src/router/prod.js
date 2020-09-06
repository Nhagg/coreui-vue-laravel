// Containers
const TheContainer = () => import('@/containers/TheContainer')
// Views
const Dashboard = () => import('@/views/Dashboard')
const CMSManagement = () => import('@/views/pages/cms/CMSManagement')
const CMSCreate = () => import('@/views/pages/cms/CMSCreate')
const UserManagement = () => import('@/views/pages/user/UserManagement')
const ImageManagement = () => import('@/views/pages/image/ImageManagement')
const ImageCreate = () => import('@/views/pages/image/ImageCreate')

export default [
    {
        path: '/',
        redirect: '/cms-pages',
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
            {
                path: '/cms-pages/create',
                name: 'cms-pages-create',
                component: CMSCreate
            },
            {
                path: '/user',
                name: 'User',
                component: UserManagement
            },
            {
                path: '/image',
                name: 'ImageManagement',
                component: ImageManagement
            },
            {
                path: '/image/create',
                name: 'ImageCreate',
                component: ImageCreate
            },
        ]
    },
]