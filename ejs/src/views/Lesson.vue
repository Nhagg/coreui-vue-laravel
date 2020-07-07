<template>
    <div class="detail-lesson">
        <div class="detail-lesson-header">
            <div class="lesson-name">
                <h2>
                    Bài {{ lesson.lessonIndex }}:
                    <span class="japan-name"
                          v-html="$convertNameToHtml(lesson.name_native_language )"></span>
                </h2>
                <h2 class="lesson-title-trans">
                    {{ lesson.name_second_language }}
                </h2>
            </div>
            <div class="progress-circle" data-progress="10"></div>
        </div>
        <div class="row custom-row mt-3" v-if="lesson.learn_units">
            <div class="col-md-8">
                <div class="unit-type-header">
                    <img src="/img/new-word.png" alt="unitType">
                    <div class="">
                        {{ 'Học từ mới' }}
                        <!--                        <span class="">8/23</span>-->
                    </div>
                </div>
                <div class="row custom-row list-unit">
                    <div
                        v-for="unit in lesson.learn_units.filter(u => u.type == 'new_word')"
                        :key="unit.id"
                        class="col-md-4"
                    >
                        <div class="unit-type-item">
                            <i class="fa fa-check-circle"></i>
                            <router-link
                                :to="'/lesson/' + lesson.id + '/unit/' + unit.id"
                                :title="unit.name_forgein_language"
                            >
                                <div v-html="$convertNameToHtml(unit.name_native_language)" class="japan-name"></div>
                                <span class="one-line-text">
                                {{ unit.name_forgein_language }}
                            </span>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div v-for="unitType in learnUnitTypes" :key="unitType.type">
                    <div class="unit-type-header">
                        <img :src="unitType.imgUrl" alt="unitType">
                        <div class="">
                            {{ unitType.name }}
                            <!--                        <span class="">8/23</span>-->
                        </div>
                    </div>
                    <div class="list-unit">
                        <div
                            v-for="unit in lesson.learn_units.filter(u => u.type == unitType.type)"
                            :key="unit.id"
                            class="unit-type-item"
                        >
                            <i class="fa fa-check-circle"></i>
                            <router-link
                                :to="getUnitLink(unit, unitType)"
                                :title="unit.name_forgein_language"
                            >
                                <div v-html="$convertNameToHtml(unit.name_native_language)" class="japan-name"></div>
                                <span class="one-line-text">
                                {{ unit.name_forgein_language }}
                            </span>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import { mapState } from 'vuex'
  import axios from "axios";
  export default {
    name: 'Lesson',
    components: {},
    computed: {
      ...mapState(['listLesson', 'listLearnUnit'])
    },
    async mounted() {
      this.$modal.show('loading');
      await this.$store.dispatch('GET_LIST_LESSON')
      await this.$store.dispatch('GET_LIST_LEARN_UNIT')
      this.$modal.hide('loading');
      await axios.get(window.DOMAIN_API + '/api/lessions/' + this.$route.params.id).then(
        res => {
          this.lesson = res.data.data
          console.log('lesson', this.lesson)
        }
      ).catch(e => {
        console.log(e)
        alert(e.message)
      })
    },
    data() {
      return {
        learnUnitTypes: [
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
         lesson: {},
        learnUnits: []
      }
    },
    methods: {
      getUnitLink(unit, unitType) {
        if(unitType.type == 'conversation') {
          return '/lesson/' + this.lesson.id + '/conversation/' + unit.id;
        }
        return '/lesson/' + this.lesson.id + '/unit/' + unit.id;
      }
    }
  }
</script>