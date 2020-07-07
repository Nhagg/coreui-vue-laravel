import Vue from 'vue'
import Vuex from 'vuex'
import axios from "axios"
Vue.use(Vuex)
let loginUser =  window.getCookie('userInfo')
let defaultUser = loginUser ? JSON.parse(loginUser) : {}
if(!loginUser.id && window.location.host.indexOf('localhost') > -1) {
  defaultUser = {
    id: 18,
    name: 'NhaGG'
  }
}
const state = {
  domainAPI: window.DOMAIN_API,
  sidebarShow: 'responsive',
  listCourse: [],
  listLesson: [],
  listLearnUnit: [],
  activeCourse: 2,
  sidebarMinimize: false,
  user: defaultUser
}
const actions = {
  async GET_LIST_COURSE({commit, state}) {
    if (state.listCourse.length) {
      return
    }
    await axios.get(window.DOMAIN_API + '/api/courses').then(
      res => {
        commit('setListCourse', res.data.data)
      }
    )
  },
  async GET_LIST_LESSON({commit, state}) {
    if (state.listLesson.length) {
      return
    }
    await axios.get(window.DOMAIN_API + '/api/lessions').then(
      res => {
        commit('setListLesson', res.data.data)
      }
    )
  },
  async GET_LIST_LEARN_UNIT({commit, state}) {
    if (state.listLearnUnit.length) {
      return
    }
    await axios.get(window.DOMAIN_API + '/api/learn_units').then(
      res => {
        commit('setListLeanUnit', res.data.data)
      }
    )
  },
  async SET_ACTIVE_COURSE({ commit }, data) {
    commit('setActiveCourse', data)
  }
}
const mutations = {
  toggleSidebarDesktop (state) {
    const sidebarOpened = [true, 'responsive'].includes(state.sidebarShow)
    state.sidebarShow = sidebarOpened ? false : 'responsive'
  },
  toggleSidebarMobile (state) {
    const sidebarClosed = [false, 'responsive'].includes(state.sidebarShow)
    state.sidebarShow = sidebarClosed ? true : 'responsive'
  },
  set (state, [variable, value]) {
    state[variable] = value
  },
  setListCourse(state, data) {
    state.listCourse = data
  },
  setActiveCourse(state, data) {
    state.activeCourse = data
  },
  setListLesson(state, data) {
    state.listLesson = data
  },
  setListLeanUnit(state, data) {
    state.listLearnUnit = data
  },
  setUser(state, user) {
    window.setCookie('userInfo', JSON.stringify(user), 1)
    console.log('setUser', user)
    state.user = user
  }
}

export default new Vuex.Store({
  state,
  actions,
  mutations
})
