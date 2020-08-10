<template>
  <div>
    <div class="row">
      <div class="col">
        <h2>Quản lý CMS Pages</h2>
      </div>
      <div class="col text-right">
        <router-link to="/cms-pages/create" class="btn btn-success">
          Tạo CMS pages
        </router-link>
      </div>
    </div>
    <div class="mt-4">
    </div>
  </div>
</template>
<script>
  export default {
    name: 'CMSPages',
    data() {
      return {
        showModal: false
      }
    },
    methods: {}
  }
</script>