<template>
    <div class="detail-lesson">
        <div class="detail-lesson-header">
            <div class="lesson-title">
                <div class="lesson-title-native">
                    Bài {{ lesson.lessonIndex }}: {{ lesson.name_native_language }}
                </div>
                <div class="lesson-title-trans">
                    {{ lesson.name_second_language }}
                </div>
            </div>
            <div class="progress-circle" data-progress="10"></div>
        </div>
        <div class="row mt-4">
            <div class="col-md-3" v-for="unitType in learnUnitTypes" :key="unitType.type">
                <div class="unit-type-header">
                    <img :src="unitType.imgUrl" alt="unitType">
                    <div class="">
                        {{ unitType.name }}
<!--                        <span class="">8/23</span>-->
                    </div>
                </div>
                <div class="list-unit">
                    <div
                        v-for="unit in listActiveLearnUnit.filter(u => u.type == unitType.type)"
                        :key="unit.id"
                        class="unit-type-item"
                    >
                        <i class="fa fa-check-circle"></i>
                        <router-link :to="'/unit/' + unit.id">
                            {{ unit.name_native_language }}
                            <span class="one-line-text">
                                {{ unit.name_forgein_language }}
                            </span>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState } from 'vuex'
  export default {
    name: 'Lesson',
    components: {},
    computed: {
      ...mapState(['listLesson', 'listLearnUnit']),
      lesson() {
        let res = {}
        const listLesson = this.listLesson
        const lessonId = this.$route.params.id
        if(!listLesson || listLesson.length == 0 || !lessonId) {
          return res
        }
        let lessonIndex = listLesson.findIndex(s => s.id == lessonId)
        if(lessonIndex === -1) {
          alert('Không tìm thấy bài học')
          return {}
        }
        return {
          ...listLesson[lessonIndex],
          lessonIndex: lessonIndex + 1
        }
      },
      listActiveLearnUnit(){
        console.log(this.listLearnUnit)
        return this.listLearnUnit.filter(u => u.lession.id === this.lesson.id)
      }
    },
    async mounted() {
      await this.$store.dispatch('GET_LIST_LESSON')
      await this.$store.dispatch('GET_LIST_LEARN_UNIT')
    },
    data() {
      return {
        learnUnitTypes: [
          {
            type: 'new_word',
            imgUrl: '/img/new-word.png',
            name: 'Học từ mới'
          },
          {
            type: 'grammar',
            imgUrl: '/img/grammar.png',
            name: 'Ngữ pháp'
          },
          {
            type: 'conversation',
            imgUrl: '/img/conversation.png',
            name: 'Hội thoại'
          },
          {
            type: 'practice',
            imgUrl: '/img/practice.png',
            name: 'Làm bài tập'
          }
        ],
        learnUnits: []
      }
    }
  }
</script>