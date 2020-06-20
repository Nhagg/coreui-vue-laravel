<template>
  <div class="study-wrap">
    <div class="study-header">
      <router-link to="/">
        <img src="/img/ejs/logo.png" alt="">
      </router-link>
      <div class="study-header-text">
        Học từ mới
      </div>
    </div>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'StudyLayout',
  components: {
  }
}
</script>
