<template>
  <div>
    <CCard>
      <CCardHeader>
        Tạo tin tức
      </CCardHeader>
      <CCardBody>
        <CForm @submit.prevent="onSubmit">
          <div>
            <span>Tiêu đề</span>
            <CInput
              v-model="input.name"
              autocomplete="news_name"
              required
            />
          </div>
          <div>
            <span>Loại</span>
            <CSelect
              :value.sync="input.type"
              :options="CMSTypes"
              required
            />
          </div>
          <div>
            <span>Link ảnh đại diện </span>
            <a v-if="input.image_url" :href="input.image_url" target="_blank">View</a>
            <CInput
              v-model="input.image_url"
              autocomplete="image_url"
              required
            >
            </CInput>
          </div>
          <div>
            <span>Nội dung ngắn gọn</span>
            <CTextarea
              v-model="input.short_name"
              autocomplete="short_name"
              required
            >
            </CTextarea>
          </div>
          <div class="form-group">
            <div>Nội dung đầy đủ</div>
            <vue-editor
              id="editor"
              v-model="input.content"
              :useCustomImageHandler="true"
              @imageAdded="handleImageAdded"
            />
          </div>
          <CButton type="submit" color="success">Lưu CMS</CButton>
        </CForm>
      </CCardBody>
    </CCard>
  </div>
</template>
<script>
  import { VueEditor} from "vue2-editor";
  import NewsService from '../../../services/News'
  import axios from "axios";

  export default {
    name: 'CMSCreate',
    components: {
      VueEditor
    },
    async mounted() {
      const newsId = this.$route.params.id
      if(newsId) {
        const res = await NewsService.getDetail(newsId)
        if(res && res.success) {
          this.input = res.data
        }
      }
    },
    data() {
      const CMSTypes = [
        {
          value: 'news',
          label: 'Tin tức'
        },
        {
          value: 'notification',
          label: 'Thông báo'
        }
      ]
      return {
        CMSTypes,
        showModal: false,
        input: {
          name: '',
          type: 'news',
          short_name: '',
          content: ''
        }
      }
    },
    methods: {
      async onSubmit() {
        const response = await NewsService.save(this.input)
        if (response.success) {
          this.$router.push("/cms-pages")
        }
        return false
      },
      handleImageAdded: function(file, Editor, cursorLocation, resetUploader) {
        // An example of using FormData
        // NOTE: Your key could be different such as:
        // formData.append('file', file)
        console.log('handleImageAdded', file)
        console.log('handleImageAdded', Editor)
        var formData = new FormData();
        formData.append("file", file);
        formData.append("path", "news");
        formData.append("action", "override" );

        axios({
          url: "/api/media/file",
          method: "POST",
          data: formData
        })
          .then(result => {
            console.log(result)
            console.log(result.data)
            const res = result.data
            let url = res.data.url; // Get url from response
            Editor.insertEmbed(cursorLocation, "image", url);
            if(!this.input.image_url) {
              this.input.image_url = url
            }
            resetUploader();
          })
          .catch(err => {
            console.log(err);
          });
      }
    }
  }
</script>
