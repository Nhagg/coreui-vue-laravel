<template>
  <div class="ejs-app">
    <Header />
    <section class="ejs-content">
      <div class="container-fluid home-container">
        <div class="row">
          <div class="col-sm-2">
            <router-link to="/">
              <img src="/img/ejs/logo.png" alt="">
            </router-link>
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
    <modal name="loading" class="loading-modal">
      <img src="../assets/img/loading.svg" alt="">
    </modal>
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
          title: 'レッスン',
          path: '/'
        },
        {
          id: 2,
          title: '試験',
          path: '/exam'
        },
        {
          id: 3,
          title: '報告する',
          path: '/report'
        },
        {
          id: 4,
          title: '設定',
          path: '/settings'
        }
      ]
    }
  }
}
</script>
