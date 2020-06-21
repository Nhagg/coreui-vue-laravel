<template>
  <div class="ejs-app">
    <Header />
    <section class="ejs-content">
      <div class="container home-container">
        <div class="row">
          <div class="col-sm-2">
            <img src="/img/ejs/logo.png" alt="">
            <ul class="side-bar">
              <li v-for="item in menus" :key="item.id" class="sidebar-item" :class="{active: item.path == $route.path}">
                <router-link :to="item.path">{{ item.title }}</router-link>
              </li>
            </ul>
          </div>
          <div class="col-sm-10">
            <router-view></router-view>
          </div>
        </div>
      </div>
    </section>
    <Footer />
  </div>
</template>

<script>
import Header from './Header'
import Footer from './Footer'

export default {
  name: 'MainLayout',
  components: {
    Header,
    Footer
  },
  async mounted() {
      await this.$store.dispatch('GET_LIST_COURSE')
  },
  data() {
    return {
      menus: [
        {
          id: 1,
          title: 'Học bài',
          path: '/'
        },
        {
          id: 2,
          title: 'Thi cử',
          path: '/exam'
        },
        {
          id: 3,
          title: 'Kết quả học tập',
          path: '/report'
        },
        {
          id: 4,
          title: 'Cài đặt',
          path: '/settings'
        }
      ]
    }
  }
}
</script>
