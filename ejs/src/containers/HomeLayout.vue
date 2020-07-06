<template>
  <div class="ejs-app">
    <header>
      <div class="container" >
        <ul class="nav justify-content-end" v-if="user && user.id" >
          <li>
            <a href="/" class="nav-link" :class="{ active: $route.path == '/', }">
              ホーム
            </a>
          </li>
          <li v-for="course in listCourse" :key="course.id" class="nav-item">
            <a
              :href="'/course/' + course.id"
              class="nav-link"
              :class="{ active: $route.path == '/course/' + course.id}"
            >
              {{ course.name }}
            </a>
          </li>
          <li>
            <a class="nav-link" href="#">
              {{user.name || user.email}}
            </a>
          </li>
        </ul>
        <ul v-else class="nav justify-content-end">
          <li>
            <a href="/" class="nav-link" :class="{ active: $route.path == '/', }">
              ホーム
            </a>
          </li>
          <li>
            <a href="#" type="button" class="nav-link" data-toggle="modal" data-target="#loginModal">
              ログイン
            </a>
          </li>
        </ul>
      </div>
    </header>
    <div class="modal fade" id="loginModal">
      <div class="modal-dialog modal-dialog-centered modal-login" role="document">
        <div class="modal-content">
          <div class="modal-body text-center">
            <h4>
              Sign in by JVConnect Account
            </h4>
            <div class="mt-3">
              <a href="#" class="btn btn-login" @click="handleLoginViaGoogle">
                <i class="fab fa-google-plus-g"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="ejs-content">
      <div class="container-fluid home-container">
        <div class="row">
          <div class="col-sm-3">
            <router-link to="/">
              <img src="/img/ejs/logo.png" alt="">
            </router-link>
            <ul class="side-bar">
              <li
                v-for="(item, index) in menus"
                :key="index" class="sidebar-item"
                :class="{active: item.path == $route.path}"
              >
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
  import AuthService from '../Api/Auth'
  import {mapState} from "vuex";

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
            title: 'ニュース',
            path: '/'
          },
          {
            id: 2,
            title: '弊社について',
            path: '/our-center'
          },
          {
            id: 2,
            title: '教育センター用規則',
            path: '/rules'
          },
          {
            id: 2,
            title: 'お知らせ',
            path: '/notifications'
          },
          {
            id: 3,
            title: 'コース一覧',
            path: '/courses'
          },
          {
            id: 5,
            title: 'よくご質問',
            path: '/faqs'
          }
        ]
      }
    },
    computed: {
      ...mapState(['listCourse', 'activeCourse']),
      user() {
        return this.$store.state.user;
      }
    },
    methods: {
      async handleLoginViaGoogle() {
        const response = await AuthService.authViaGoogle(this.$gAuth)
        this.$jquery('#loginModal').modal('hide')
        if (response.success) {
          this.$cookies.set("LEANING_TOKEN", response.data && response.data.token)
          this.$store.commit("setUser", response.data)
        } else {
          console.log('login failed')
        }
      }
    }
  }
</script>
