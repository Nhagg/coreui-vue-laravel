<template>
  <div>
    <div class="row">
      <div class="col">
        <h2>Quản lý kỳ thi</h2>
      </div>
      <div class="col text-right">
        <button @click="viewed = true" class="btn btn-success">
          Thêm kỳ thi
        </button>
      </div>
    </div>
    <div class="mt-4">
      <CDataTable
        :tableFilter="true"
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
            <a :href="'/report?user_id=' + item.id" target="_blank">
              View Class
            </a>
          </td>
        </template>
      </CDataTable>
    </div>
    <CModal
      title="Thêm lớp học"
      size="lg"
      :show.sync="viewed"
    >
      <CForm @submit.prevent="onSubmit">
        <div>
          <span>Tên kỳ thi</span>
          <CInput
            v-model="input.name"
            required
          >
          </CInput>
        </div>
        <div class="row">
          <div class="col">
            <span>Lớp học</span>
            <CSelect
              :value.sync="input.course_id"
              :options="listCourse"
              required
            >
            </CSelect>
          </div>
          <div class="col">
            <span>Thời gian thi(phút)</span>
            <CInput
              v-model="input.duration"
              type="number"
              required
            >
            </CInput>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <span>Ngày bắt đầu</span>
            <CInput
              v-model="input.start_date"
              type="date"
              required
            />
          </div>
          <div class="col">
            <div>Giờ bắt đầu</div>
            <CInput
              v-model="input.start_time"
              type="time"
              required
            />
          </div>
        </div>
        <div class="row">
          <div class="col">
            <span>Ngày kết thúc</span>
            <CInput
              v-model="input.end_date"
              type="date"
              required
            />
          </div>
          <div class="col">
            <div>Giờ kết thúc</div>
            <CInput
              v-model="input.end_time"
              type="time"
              required
            />
          </div>
        </div>
        <div class="text-right">
          <CButton type="submit" color="success">Thêm kỳ thi</CButton>
        </div>
      </CForm>
      <div slot="footer"></div>
    </CModal>
  </div>
</template>
<script>
  import ExamService from '../../../services/Exam'
  const listCourse = [
    {
      value: 1,
      label: 'Học nhập môn'
    },
    {
      value: 2,
      label: 'Khóa N5'
    },
    {
      value: 3,
      label: 'Khóa N4'
    },
    {
      value: 4,
      label: 'Học chuyên nghành'
    },
    {
      value: 5,
      label: 'Học định hướng'
    }
  ]
  export default {
    name: 'CMSPages',
    // components: {StandardButtons},
    data() {
      return {
        viewed: false,
        listCourse,
        items: [],
        input: {
          name: '',
          course_id: 2,
          start_date: '',
          end_date: '',
        },
        fields: ['id', 'name', 'class_id', 'duration', 'start_date', 'end_date', 'actions'],
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
        const response = await ExamService.get()
        if (response.success) {
          this.items = response.data
        }
      },
      async onSubmit() {
        const response = await ExamService.create(this.input)
        if (response.success) {
          this.getData()
          this.viewed = false
        }
        return false
      },
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
