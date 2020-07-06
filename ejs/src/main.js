import Vue from 'vue'
import Cookies from 'vue-cookies'
import App from './App'
import router from './router'
import store from './store'
import VModal from 'vue-js-modal'
import GAuth from 'vue-google-oauth2'

Vue.use(Cookies)
Vue.$cookies.config('70d')
const gauthOption = {
    clientId: '133178251870-39j7b3egprn2ab978id2094r7toq3tjf.apps.googleusercontent.com',
    scope: 'profile email',
    prompt: 'select_account'
}
Vue.use(GAuth, gauthOption)

Vue.config.performance = true
Vue.prototype.$domainAPI = window.DOMAIN_API

Vue.use(VModal, {dynamic: true, dynamicDefaults: {clickToClose: false}})
Vue.prototype.$jquery = window.$
Vue.prototype.$shuffler = (arr) => {
    return arr.sort(() => 0.5 - Math.random())
}
let replaceSpecialText = (text) => {
    text = text.replace(/（/g, '(')
    text = text.replace(/）/g, ')')
    text = text.replace(/／/g, '/')
    return text
}
Vue.prototype.$getNativeName = (text) => {
    if (!text) {
        return ''
    }
    let res = replaceSpecialText(text)
    res = res.replace(/\(/g, '')
    res = res.replace(/\)/g, '')
    let arr = res.split('/')
    let s = ''
    arr.forEach((splitText, index) => {
        if (index % 2 == 0) {
            s += splitText
        }
    })
    return s
}
Vue.prototype.$convertNameToHtml = (text) => {
    if (!text) {
        return ''
    }
    let res = replaceSpecialText(text)
    let arr = res.split('/')
    let s = ''
    arr.forEach((splitText, index) => {
        if (index % 2 == 1) {
            s += '<span>' + splitText + '</span>'
        } else {
            s += splitText
        }
    })
    res = s.replace(/\(/g, '<span>')
    res = res.replace(/\)/g, '</span>')
    return res
}
Vue.prototype.$getItemImg = (unit, item = {}, i = 1) => {
    const api = window.DOMAIN_API
    return api + '/images/' + unit.type + '/' + item.content['image' + i]
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
