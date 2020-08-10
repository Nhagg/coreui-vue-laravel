<template>
  <div>
    <CCard>
      <CCardHeader>
        Tạo trang CMS
        <CButton color="primary" class="float-right">
          Upload Images
        </CButton>
      </CCardHeader>
      <CCardBody>
        <CForm>
          <CInput
            horizontal
            autocomplete="news_name"
          >
            <template #label>
              <div class="col-2">Tên tin tức:&nbsp;</div>
            </template>
          </CInput>
          <CTextarea
            horizontal
            autocomplete="news_subtitle"
          >
            <template #label>
              <div class="col-2">Subtitle:</div>
            </template>
          </CTextarea>
          <div></div>
        </CForm>
      </CCardBody>
      <CCardFooter>
        <CButton color="success">Lưu CMS</CButton>
      </CCardFooter>
    </CCard>
  </div>
</template>
<script>
  export default {
    name: 'CMSCreate',
    data() {
      return {
        showModal: false
      }
    },
    methods: {}
  }
</script>