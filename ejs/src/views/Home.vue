<template>
    <div class="home-content">
        <h2>{{ course.name }}</h2>
        <div class="row lesson-list custom-row">
            <div
                v-for="lesson in listLesson.filter(s => s.course && s.course.id == activeCourse)"
                :key="lesson.id"
                class="col-sm-3"
            >
                <router-link :to="'/lesson/' + lesson.id" class="lesson-content">
                    <div class="lesson-card">
                        <div class="lesson-img ratio-4-3">
                            <img
                                :src="domainAPI + '/images/lesson/' + lesson.image"
                                alt="lesson-img"
                                @error="onErrorImg"
                            >
                        </div>
                        <div class="lesson-body">
                            <div class="lesson-title">
                                <div
                                    v-html="$convertNameToHtml(lesson.name_native_language)"
                                     class="lesson-title-native japan-name one-line-text"
                                />
                                <div class="lesson-result">
                                    {{ 0 }}%
                                </div>
                            </div>
                            <div class="lesson-title-trans one-line-text" :title="lesson.name_second_language">
                                {{ lesson.name_second_language }}
                            </div>
                        </div>
                    </div>
                </router-link>
            </div>
        </div>
    </div>
</template>
<script>
  import axios from 'axios'
  import { mapState } from "vuex";
  export default {
    name: 'Home',
    components: {},
    computed: {
      ...mapState(['domainAPI', 'activeCourse', 'listCourse']),
      course() {
        let res = this.listCourse.find(c => c.id == this.activeCourse)
        return res ? res : {}
      },
    },
    watch: {
      activeCourse(val) {
        console.log(val)
      }
    },
    async mounted() {
      this.$modal.show('loading');
      await this.$store.dispatch('GET_LIST_COURSE')
      const course_id = this.$route.query.course_id
      if(course_id) {
        this.$store.dispatch('SET_ACTIVE_COURSE', course_id)
      }
      const { listCourse } = this.$store.state
      let res = await axios.get(window.DOMAIN_API + '/api/lessions')
      if(listCourse && res && res.data && res.data.data) {
        this.listLesson = res.data.data
      }
      console.log(this.listLesson)
      this.$modal.hide('loading');
    },
    data() {
      return {
        listLesson: []
      }
    },
    methods: {
      onErrorImg(event) {
        event.target.src = require('../../public/img/lesson/default.png')
      }
    }
  }
</script>