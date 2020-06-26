<template>
    <div class="container-fluid">
        <span class="d-none">
            {{ resetStatus }}
        </span>
        <div class="study-header">
            <router-link :to="'/lesson/' + lessonID">
                <img src="/img/ejs/logo.png" alt="">
            </router-link>
            <div class="study-header-text">
                {{ unit.type == 'grammar' ? 'Học ngữ pháp' : 'Học từ mới' }}
            </div>
        </div>
        <div class="study-content" v-if="unit.id">
            <NewwordPractice1
                v-if="activeItem.type == 'newword_practice_1' || activeItem.type == 'grammar_practice_1'"
                :key="activeItem.id"
                :setAnswer="setAnswer"
                :unit="unit"
                :item="activeItem"
            />
            <NewwordPractice2
                v-else-if="activeItem.type == 'newword_practice_2' || activeItem.type == 'grammar_practice_2'"
                :key="activeItem.id"
                :setAnswer="setAnswer"
                :unit="unit"
                :item="activeItem"
            />
            <NewwordSpeak1
                v-else-if="activeItem.type == 'newword_speak_1' || activeItem.type == 'grammar_speak_1'"
                :key="activeItem.id"
                :setAnswer="setAnswer"
                :unit="unit"
                :item="activeItem"
            />
            <NewwordPronunciation1
                v-else-if="
                    activeItem.type == 'newword_pronounciation_1'
                    || activeItem.type == 'grammar_pronounciation_1'
                "
                :key="activeItem.id"
                :setAnswer="setAnswer"
                :unit="unit"
                :item="activeItem"
            />
            <GrammarInformation2
                v-else-if="
                    activeItem.type == 'grammar_information_1'
                    || activeItem.type == 'grammar_information_2'
                "
                :key="activeItem.id + activeItem.showText"
                :setAnswer="setAnswer"
                :unit="unit"
                :item="activeItem"
            />
            <GrammarSpeak2
                v-else-if="activeItem.type == 'grammar_speak_2'"
                :key="activeItem.id + activeItem.showText"
                :setAnswer="setAnswer"
                :unit="unit"
                :item="activeItem"
            />
            <Default
                v-else
                :key="activeItem.id"
                :setAnswer="setAnswer"
                :result-point="resultPoint()"
                :unit="unit"
                :item="activeItem"
            />
        </div>
        <div
            v-if="unit.id"
            :class="'study-footer ' + getFooterClass()"
        >
            <div class="study-footer-left" v-if="!showResult">
                <i class="fa fa-check-circle"></i>
                <div v-if="isCorrect()">
                    Đáp án chính xác
                </div>
                <div v-else-if="!isCorrect()">
                    <span v-if="userAnswer">
                        Phát âm của bạn: {{ userAnswer }}
                    </span>
                    <span v-else>
                        Đáp án không chính xác
                    </span>
                </div>
            </div>
            <div v-else class="study-footer-left">
                <i class="fa fa-check-circle"></i>
                {{
                    this.resultPoint() >= 80 ?
                        'Rất tốt. Bạn có thể thọc từ tiếp theo'
                        : 'Bạn nên học lại để có kết quả tốt hơn '
                }}
            </div>
            <div>
                <button class="btn" @click="nextPage" v-if="activeItem.id">
                    Tiếp theo
                    <i class="fa fa-arrow-right"></i>
                </button>
               <div v-else>
                   <button @click="leanAgain" class="btn">
                       Học lại
                       <i class="fa fa-redo"></i>
                   </button>
                   <a
                       v-if="nextUnit.id"
                       :href="'/lesson/' + lessonID + '/unit/' + nextUnit.id"
                        class="btn ml-3"
                   >
                       Học tiếp
                       <i class="fa fa-arrow-right"></i>
                   </a>
               </div>
            </div>
        </div>
    </div>
</template>
<script>
  import { mapState } from 'vuex'
  import axios from "axios"
  import NewwordPractice1 from "./Item/NewwordPractice1";
  import NewwordPractice2 from "./Item/NewwordPractice2";
  import NewwordSpeak1 from "./Item/NewwordSpeak1";
  import NewwordPronunciation1 from "./Item/NewwordPronunciation1";
  import GrammarInformation2 from "./Item/GrammarInformation2";
  import GrammarSpeak2 from "./Item/GrammarSpeak2";
  import Default from "./Item/Default";
  const FREE_TYPE = ['newword_speak_1', 'grammar_speak_1', 'grammar_speak_2']
  export default {
    name: 'Unit',
    components: {
      NewwordPractice1,
      NewwordPractice2,
      NewwordSpeak1,
      NewwordPronunciation1,
      GrammarInformation2,
      GrammarSpeak2,
      Default
    },
    async mounted() {
      let unitId = this.$route.params.id
      await this.$store.dispatch('GET_LIST_LESSON')
      await this.$store.dispatch('GET_LIST_LEARN_UNIT')
      if( !unitId) {
        alert('Không tìm thấy bài học')
        return
      }
      await axios.get(window.DOMAIN_API + '/api/learn_units/' + unitId).then(
        res => {
          this.unit = res.data.data
          console.log('unit', this.unit)
        }
      ).catch(e => {
        console.log(e)
        alert(e.message)
      })
    },
    computed: {
      ...mapState(['listLesson', 'listLearnUnit']),
      listActiveLearnUnit(){
        return this.listLearnUnit.filter(u => u.lession.id == this.lessonID)
      },
      nextUnit(){
        const { unit, listActiveLearnUnit } = this
        let unitIndex = listActiveLearnUnit.findIndex(u => u.id == unit.id)
        if(unitIndex == -1 || unitIndex == listActiveLearnUnit.length - 1) {
          return {}
        }
        return listActiveLearnUnit[unitIndex + 1]
      },
      activeItem() {
        let { unit, activeItemIndex } = this
        if(unit && unit.learn_items && unit.learn_items[activeItemIndex]) {
          console.log('activeItem', unit.learn_items[activeItemIndex])
          return unit.learn_items[activeItemIndex]
        }
        return {}
      }
    },
    data() {
      return {
        lessonID: this.$route.params.lessonId,
        userAnswer: '',
        resetStatus: false,
        showResult: false,
        unit: {},
        activeItemIndex: 4
      }
    },
    methods: {
      isCorrect() {
        const activeItem = this.activeItem
        return activeItem.point != undefined && activeItem.point == activeItem.score
      },
      nextPage() {
        this.userAnswer = ''
        if(this.activeItem.type == 'grammar_information_2' && this.activeItem.showText != true) {
          this.activeItem.showText = true
          this.resetPage()
          return
        }
        this.activeItemIndex ++
        if(this.activeItemIndex == this.unit.learn_items.length) {
          this.showResult = true
        }
      },
      resetPage() {
        this.resetStatus = !this.resetStatus
      },
      leanAgain() {
        this.unit.learn_items.forEach(item => {
          item.point = undefined
          if(item.type == 'grammar_information_2') {
            item.showText = undefined
          }
        })
        this.showResult = false
        this.activeItemIndex = 0
      },
      setAnswer(item, point, userAnswer = '') {
        console.log('setAns', point, userAnswer)
        item.point = parseInt(point) ? parseInt(point) : 0
        this.activeItemIndex = this.activeItemIndex
        this.userAnswer = userAnswer
        this.resetPage()
      },
      getFooterClass() {
        if(this.activeItem.point != undefined) {
          return this.isCorrect() ? 'correct' : 'incorrect'
        }
        if(this.showResult) {
          return this.resultPoint() >= 80 ? 'correct' : 'incorrect'
        }
        return ''
      },
      resultPoint() {
        console.log('resultPoint')
        let totalPoint = 0
        const listItem = this.unit.learn_items
        let totalScore = 0
        listItem.forEach(
          item => {
            totalScore += parseInt(item.score)
            if(item.point) {
              totalPoint += parseInt(item.point)
            }
            if(FREE_TYPE.find( t => t == item.type)) {
              totalPoint += parseInt(item.score)
            }
          }
        )
        return parseInt((totalPoint * 100)/totalScore)
      }
    }
  }
</script>