<template>
    <div>
        <div class="row">
            <div class="col">
                <h2>Quản lý người dùng</h2>
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
                :itemsPerPage="10"
                pagination
                style="background: white"
            >
                <template #content="{item}">
                    <td>
                        <div v-html="item.content"></div>
                    </td>
                </template>
                <template #actions="{item}">
                    <td>
                        <a :href="'https://jp-learn.toprate.io/report?user_id=' + item.id" target="_blank">
                            View Report
                        </a>
                    </td>
                </template>
            </CDataTable>
        </div>
        <CModal
            title="Modal title"
            size="lg"
            :show="viewed ? true : false"
        >
            <div class="viewed__content" v-html="viewed.content"></div>
        </CModal>
    </div>
</template>
<script>
    import UserService from '../../../services/User'
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
                fields: ['id', 'email', 'name', 'status', 'actions'],
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
                const response = await UserService.get()
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
