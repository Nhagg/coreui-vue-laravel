// import 'core-js/stable'
import Vue from 'vue'
import App from './App'
import router from './router'
// import { iconsSet as icons } from './assets/icons/icons.js'
import store from './store'

Vue.config.performance = true

new Vue({
  el: '#ejs',
  router,
  store,  
  // icons,
  template: '<App/>',
  components: {
    App
  },
})
