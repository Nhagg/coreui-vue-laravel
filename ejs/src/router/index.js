import Vue from 'vue'
import Router from 'vue-router'

// Containers
const MainLayout = () => import('@/containers/MainLayout')
const StudyLayout = () => import('@/containers/StudyLayout')
// Views
const Home = () => import('@/views/Home')
const Study = () => import('@/views/Study')
Vue.use(Router)

export default new Router({
  mode: 'history',
  linkActiveClass: 'active',
  scrollBehavior: () => ({ y: 0 }),
  routes: configRoutes()
})

function configRoutes () {
  return [
    {
      path: '/',
      redirect: '/',
      name: 'Home',
      component: MainLayout,
      children: [
        {
          path: '/',
          name: 'Home',
          component: Home
        }
      ]
    },
    {
      path: '/study',
      redirect: '/study',
      name: 'Study',
      component: StudyLayout,
      children: [
        {
          path: '/study',
          name: 'Study',
          component: Study
        }
      ]
    }
  ]
}
