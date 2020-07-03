<template>
  <div class="study-wrap">
    <router-view></router-view>
    <modal name="loading" class="loading-modal">
      <img src="../assets/img/loading.svg">
    </modal>
  </div>
</template>

<script>
export default {
  name: 'StudyLayout',
  components: {
  }
}
</script>
