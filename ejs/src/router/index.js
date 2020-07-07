import Vue from 'vue'
import Router from 'vue-router'

// Containers
const HomeLayout = () => import('@/containers/HomeLayout')
const CourseLayout = () => import('@/containers/CourseLayout')
const UnitLayout = () => import('@/containers/UnitLayout')
// Views
const Home = () => import('@/views/Home')
const Rules = () => import('@/views/Rules')
const Notifications = () => import('@/views/Notifications')
const News = () => import('@/views/News')
const DetailNews = () => import('@/views/DetailNews')
const Courses = () => import('@/views/Courses')
const OurCenter = () => import('@/views/OurCenter')
//Course
const Course = () => import('@/views/Course')
const Lesson = () => import('@/views/Lesson')
const Unit = () => import('@/views/Unit')
const Conversation = () => import('@/views/Conversation')
const Report = () => import('@/views/Report')
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
      name: 'HomeLayout',
      component: HomeLayout,
      children: [
        {
          path: '/',
          name: 'Home',
          component: OurCenter
        },
        {
          path: '/rules',
          name: 'Rules',
          component: Rules
        },
        {
          path: '/news',
          name: 'News',
          component: News
        },
        {
          path: '/news/:id',
          name: 'DetailNews',
          component: DetailNews
        },
        {
          path: '/notifications',
          name: 'Notifications',
          component: Notifications
        },
        {
          path: '/courses',
          name: 'Courses',
          component: Courses
        }
      ]
    },
    {
      path: '/course',
      redirect: '/course',
      name: 'CourseLayout',
      component: CourseLayout,
      children: [
        {
          path: '/course/:course_id',
          name: 'CourseDetail',
          component: Course
        },
        {
          path: '/lesson/:id',
          name: 'Lesson',
          component: Lesson
        },
        {
          path: '/exam',
          name: 'Exam',
          component: Course
        },
        {
          path: '/report',
          name: 'report',
          component: Report
        },
        {
          path: '/settings',
          name: 'settings',
          component: Course
        },
        {
          path: '/course',
          name: 'course',
          component: Course
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
      name: 'conversation',
      component: UnitLayout,
      children: [
        {
          path: '/lesson/:lessonId/conversation/:id',
          name: 'ConversationDetail',
          component: Conversation
        }
      ]
    },
    {
      path: '/:id',
      redirect: '/',
      name: 'HomeLayoutDefault',
      component: HomeLayout,
      children: [
        {
          path: '/:id',
          name: 'Default',
          component: Home
        }
      ]
    }
  ]
}
