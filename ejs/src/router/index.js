import Vue from 'vue'
import Router from 'vue-router'

// Containers
const TheContainer = () => import('@/containers/TheContainer')
// Views
const Home = () => import('@/views/Home')
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
      component: TheContainer,
      children: [
        {
          path: '/',
          name: 'Home',
          component: Home
        }
      ]
    }
  ]
}
