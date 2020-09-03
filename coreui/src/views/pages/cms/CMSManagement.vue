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
                            View
                        </CButton>
                        <CButton block color="light">Edit</CButton>
                        <CButton block color="light">Delete</CButton>
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
    import StandardButtons from "../../buttons/StandardButtons";
    import {cibEyeem} from '@coreui/icons'

    export default {
        name: 'CMSPages',
        components: {StandardButtons},
        eye: cibEyeem,
        data() {
            return {
                viewed: false,
                items: [],
                fields: ['id', 'short_name', 'name', 'updated_at', 'actions'],
                caption: {
                    type: String,
                    default: 'Table'
                },
            }
        },
        created() {
            this.getData()
        },
        methods: {
            async getData() {
                const response = await NewsService.get()
                if (response.success) {
                    this.items = response.data
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
