<template>
  <div class="study-wrap">
    <div class="study-header">
      <img src="/img/ejs/logo.png" alt="">
      <div class="study-header-text">
        Học từ mới
      </div>
    </div>
    <div class="study-content">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {
  name: 'StudyLayout',
  components: {
  }
}
</script>
