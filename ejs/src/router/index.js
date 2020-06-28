import Vue from 'vue'
import Router from 'vue-router'

// Containers
const MainLayout = () => import('@/containers/MainLayout')
const UnitLayout = () => import('@/containers/UnitLayout')
// Views
const Home = () => import('@/views/Home')
const Lesson = () => import('@/views/Lesson')
const Unit = () => import('@/views/Unit')
const Conversation = () => import('@/views/Conversation')
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
        },
        {
          path: '/lesson/:id',
          name: 'Lesson',
          component: Lesson
        },
        {
          path: '/exam',
          name: 'Exam',
          component: Home
        },
        {
          path: '/report',
          name: 'Exam',
          component: Home
        },
        {
          path: '/settings',
          name: 'Exam',
          component: Home
        },
        {
          path: '/:d',
          name: 'Default',
          component: Home
        },
      ]
    },
    {
      path: '/unit',
      redirect: '/unit',
      name: 'Unit',
      component: UnitLayout,
      children: [
        {
          path: '/lesson/:lessonId/unit/:id',
          name: 'Study',
          component: Unit
        }
      ]
    },
    {
      path: '/conversation',
      redirect: '/conversation',
      name: 'Conversation',
      component: UnitLayout,
      children: [
        {
          path: '/lesson/:lessonId/conversation/:id',
          name: 'Conversation',
          component: Conversation
        }
      ]
    }
  ]
}
