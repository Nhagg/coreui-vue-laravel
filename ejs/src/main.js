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
  console.log(res,'2222')
  res = res.replace(/\(/g, '')
  console.log(res)
  res = res.replace(/\)/g, '')
  console.log(res)
  let arr = res.split('/')
  let s = ''
  arr.forEach((splitText, index) => {
    if(index % 2 == 0) {
      s += splitText
    }
  })
  return s
}
Vue.prototype.$convertNameToHtml = (text) => {
  let res = text.replace(/／/g, '/')
  console.log(res,'2222')
  let arr = res.split('/')
  console.log(arr,'111')
  let s = ''
  arr.forEach((splitText, index) => {
    if(index % 2 == 1) {
      s += '<span>' + splitText + '</span>'
    } else {
      s += splitText
    }
  })
  res = s.replace(/\(/g, '<span>')
  res = s.replace(/（/g, '<span>')
  res = res.replace(/\)/g, '</span>')
  res = res.replace(/）/g, '</span>')
  return res
}
Vue.prototype.$getItemImg = (unit, item, i) => {
  const api = window.DOMAIN_API
  if(unit.type == 'grammar') {
    return api + '/images/grammar/' + item.content['image' + i]
  }
  return api + '/images/new_work/' + item.content['image' + i]
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
