<template>
    <div>
        <CCard>
            <CCardHeader>
                Tải ảnh
            </CCardHeader>
            <CCardBody>
                <CForm ref="form" @submit.prevent="onSubmit">
                    <div>
                        <span>Tên ảnh</span>
                        <CInput
                          name="image_name"
                          required
                          autocomplete="image_name"
                        >
                        </CInput>
                    </div>
                    <div>
                        <span>Tên thư mục</span>
                        <CInput
                          name="path"
                          autocomplete="path"
                        >
                        </CInput>
                    </div>
                    <div class="form-group">
                        <div>File</div>
                        <input
                          id="uploadImage"
                          type="file"
                          name="file"
                          required
                        />

                    </div>
                    <CButton type="submit" color="success">Tải ảnh</CButton>
                </CForm>
            </CCardBody>
        </CCard>
    </div>
</template>
<script>
    import FolderService from '../../../services/Folder'

    export default {
        name: 'CMSCreate',
        data() {
            return {
                showModal: false,
                input: {
                    name: '',
                }
            }
        },
        methods: {
            async onSubmit(e) {
                var formData = new FormData();
                formData.append("name", e.target.image_name.value);
                formData.append("path", e.target.path.value);
                formData.append("action", "override" );
                // var reader = new FileReader();
                var file = document.getElementById('uploadImage');
                formData.append("file", file.files[0]);
                const response = await FolderService.uploadImage(formData)
                console.log(response, 'response')
                if (response.success) {
                    this.$router.push("/image")
                }
                return false
                // reader.onload = async function(e)
                // {
                //     console.log(e, 'onload')
                //
                // };
                // reader.readAsBinaryString(file.files[0]);
            }
        }
    }
</script>
