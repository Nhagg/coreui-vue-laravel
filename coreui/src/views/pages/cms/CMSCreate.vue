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
                <CForm @submit.prevent="onSubmit">
                    <div>
                        <span>Tên ngắn gọn</span>
                        <CInput
                            v-model="input.short_name"
                            autocomplete="news_name"
                            required
                        >
                        </CInput>
                    </div>
                    <div>
                        <span>Tên đầy đủ</span>
                        <CTextarea
                            v-model="input.name"
                            autocomplete="news_subtitle"
                        >
                        </CTextarea>
                    </div>
                    <div>
                        <div>Nội dung</div>
                        <vue-editor
                          v-model="input.content"
                          useCustomImageHandler
                          @imageAdded="handleImageAdded"
                        />
                    </div>
                    <CButton type="submit" color="success">Lưu CMS</CButton>
                </CForm>
            </CCardBody>
            <CCardFooter>
            </CCardFooter>
        </CCard>
    </div>
</template>
<script>
    import {Quill, VueEditor} from "vue2-editor";
    import NewsService from '../../../services/News'
    import axios from "axios";

    export default {
        name: 'CMSCreate',
        components: {
            VueEditor, Quill
        },
        data() {
            return {
                showModal: false,
                input: {
                    short_name: '',
                    name: '',
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

                var formData = new FormData();
                formData.append("image", file);

                axios({
                    url: "https://fakeapi.yoursite.com/images",
                    method: "POST",
                    data: formData
                })
                  .then(result => {
                      let url = result.data.url; // Get url from response
                      Editor.insertEmbed(cursorLocation, "image", url);
                      resetUploader();
                  })
                  .catch(err => {
                      console.log(err);
                  });
            }
        }
    }
</script>
