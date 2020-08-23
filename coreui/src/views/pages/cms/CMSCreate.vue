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
                    <div>
                        <span>Tên ngắn gọn</span>
                        <CInput
                            v-model="input.short_name"
                            autocomplete="news_name"
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
                        <vue-editor v-model="input.content"></vue-editor>
                    </div>
                </CForm>
            </CCardBody>
            <CCardFooter>
                <CButton @click="save" color="success">Lưu CMS</CButton>
            </CCardFooter>
        </CCard>
    </div>
</template>
<script>
    import {Quill, VueEditor} from "vue2-editor";
    import NewsService from '../../../services/News'

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
            async save() {
                const response = await NewsService.save(this.input)
                if (response.success) {
                    this.$router.push("/cms-pages")
                }
            }
        }
    }
</script>
