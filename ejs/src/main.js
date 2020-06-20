// import 'core-js/stable'
import Vue from 'vue'
import App from './App'
import router from './router'
// import { iconsSet as icons } from './assets/icons/icons.js'
import store from './store'

Vue.config.performance = true
Vue.prototype.$domainAPI = window.DOMAIN_API
Vue.prototype.$shuffler = (arr) => {
  return arr.sort(() => 0.5 - Math.random())
}
Vue.prototype.$getNativeName = (text) => {
  let res = text
  res = res.replace(/\(/g, '')
  res = res.replace(/\)/g, '')
  let arr = res.split('/')
  let s = ''
  arr.forEach((splitText, index) => {
    if(index % 2 == 0) {
      s += splitText
    }
  })
  console.log(s)
  return s
}
Vue.prototype.$convertNameToHtml = (text) => {
  let res = text
  let arr = res.split('/')
  let s = ''
  arr.forEach((splitText, index) => {
    if(index % 2 == 1) {
      s += '<span>' + splitText + '</span>'
    } else {
      s += splitText
    }
  })
  res = s.replace(/\(/g, '<span>')
  res = res.replace(/\)/g, '</span>')
  console.log(s)
  return res
}
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
