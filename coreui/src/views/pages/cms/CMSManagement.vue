<template>
  <div>
    <div class="row">
      <div class="col">
        <h2>Quản lý Tin tức</h2>
      </div>
      <div class="col text-right">
        <router-link to="/cms-pages/create" class="btn btn-success">
          Tạo tin tức
        </router-link>
      </div>
    </div>
    <div class="mt-4">
      <CDataTable
        :hover="false"
        :striped="false"
        :bordered="false"
        :small="true"
        :fixed="true"
        :items="items"
        :fields="fields"
        :items-per-page="10"
        style="background: white"
      >
        <template #content="{item}">
          <td>
            <div v-html="item.content"></div>
          </td>
        </template>
        <template #actions="{item}">
          <td>
            <CButton block color="light" @click="viewed = item">
              Xem
            </CButton>
            <router-link :to="'/cms-pages/edit/' + item.id" class="btn btn-block btn-primary">Sửa </router-link>
            <CButton block color="danger" @click="confirmDelete(item)">Xóa</CButton>
          </td>
        </template>
      </CDataTable>
    </div>
    <CModal
      title="Modal title"
      size="lg"
      :show.sync="viewed"
    >
      <div class="viewed__content" v-html="viewed.content"></div>
    </CModal>
  </div>
</template>
<script>
  import NewsService from '../../../services/News'
  import {cibEyeem} from '@coreui/icons'

  export default {
    name: 'CMSPages',
    components: {},
    eye: cibEyeem,
    data() {
      return {
        viewed: false,
        items: [],
        fields: ['id', 'name', 'short_name', 'updated_at', 'actions'],
        caption: {
          type: String,
          default: 'Table'
        },
      }
    },
    async mounted() {
      await this.getData()
    },
    methods: {
      async getData() {
        const response = await NewsService.get()
        if (response.success) {
          this.items = response.data
        }
      },
      async confirmDelete(item) {
        const isConfirm = confirm('Bạn chắc chắn muốn xóa CMS :'+item.name+' ?')
        if(isConfirm) {
          const response = await NewsService.deleteNews(item.id)
          if (response && response.success) {
            this.getData()
          }
        }
      }
    }
  }
</script>
<style lang="scss">
  .viewed__content {
    img {
      max-width: 100% !important;
    }
  }
</style>
