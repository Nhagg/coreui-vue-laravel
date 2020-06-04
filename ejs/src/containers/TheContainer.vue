<template>
  <div class="c-app">
    header
    <router-view></router-view>
    footer
  </div>
</template>

<script>
// import TheSidebar from './TheSidebar'
// import TheHeader from './TheHeader'
// import TheFooter from './TheFooter'

export default {
  name: 'TheContainer',
  components: {
    // TheSidebar,
    // TheHeader,
    // TheFooter
  }
}
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>
