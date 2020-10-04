// Containers
const TheContainer = () => import('@/containers/TheContainer')
// Views
const Dashboard = () => import('@/views/Dashboard')
const CMSManagement = () => import('@/views/pages/cms/CMSManagement')
const CMSCreate = () => import('@/views/pages/cms/CMSCreate')
const UserManagement = () => import('@/views/pages/user/UserManagement')
const ImageManagement = () => import('@/views/pages/image/ImageManagement')
const ImageCreate = () => import('@/views/pages/image/ImageCreate')
const Class = () => import('@/views/pages/class/Class')
const Exam = () => import('@/views/pages/exam/Exam')

const Page404 = () => import('@/views/pages/Page404')
const Login = () => import('@/views/pages/Login')
const Register = () => import('@/views/pages/Register')

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
                name: 'Create CMS',
                component: CMSCreate
            },
            {
                path: '/cms-pages/edit/:id',
                name: 'Edit CMS',
                component: CMSCreate
            },
            {
                path: '/user',
                name: 'User',
                component: UserManagement
            },
            {
                path: '/image',
                name: 'Image',
                component: ImageManagement
            },
            {
                path: '/image/create',
                name: 'ImageCreate',
                component: ImageCreate
            },
            {
                path: '/class',
                name: 'Class',
                component: Class
            },
            {
                path: '/exam',
                name: 'Exam',
                component: Exam
            },
        ]
    },
    {
        path: '/',
        redirect: '/login',
        name: 'Auth',
        component: {
            render(c) {
                return c('router-view')
            }
        },
        children: [
            {
                path: 'login',
                name: 'Login',
                component: Login
            },
            {
                path: 'register',
                name: 'Register',
                component: Register
            },
        ]
    },
    {
        path: '*',
        name: '404',
        component: Page404
    }
]
