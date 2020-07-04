<template>
  <div class="ejs-app">
    <header>
      <div class="container">
        <ul class="nav justify-content-end">
          <li>
            <a href="/" class="nav-link" :class="{ active: $route.path == '/', }">
              Trang chủ
            </a>
          </li>
          <li>
            <a href="/course" class="nav-link" :class="{ active: $route.path == '/login', }">
              Đăng nhập
            </a>
          </li>
        </ul>
      </div>
    </header>
    <section class="ejs-content">
      <div class="container home-container">
        <div class="row">
          <div class="col-sm-3">
            <router-link to="/">
              <img src="/img/ejs/logo.png" alt="">
            </router-link>
            <ul class="side-bar">
              <li v-for="item in menus" :key="item.id" class="sidebar-item" :class="{active: item.path == $route.path}">
                <router-link :to="item.path">{{ item.title }}</router-link>
              </li>
            </ul>
          </div>
          <div class="col-sm-9">
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
import Footer from './Footer'

export default {
  name: 'MainLayout',
  components: {
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
          title: 'Tin tức',
          path: '/'
        },
        {
          id: 2,
          title: 'Thông báo',
          path: '/notifications'
        },
        {
          id: 3,
          title: 'Chương trình học',
          path: '/courses'
        },
        {
          id: 4,
          title: 'Ưu đãi',
          path: '/promotions'
        },
        {
          id: 5,
          title: 'Hỏi đáp(FAQ)',
          path: '/faqs'
        },
        {
          id: 6,
          title: 'Đối tác',
          path: '/Partner'
        },
        {
          id: 7,
          title: 'Giới thiệu trung tâm',
          path: '/our-center'
        },
        {
          id: 8,
          title: 'Danh sách giáo viên',
          path: '/teachers'
        }
      ]
    }
  }
}
</script>
