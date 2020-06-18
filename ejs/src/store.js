import Vue from 'vue'
import Vuex from 'vuex'
import axios from "axios";
Vue.use(Vuex)

const state = {
  sidebarShow: 'responsive',
  listCourse: [],
  activeCourse: 2,
  sidebarMinimize: false
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
  }
}

export default new Vuex.Store({
  state,
  actions,
  mutations
})