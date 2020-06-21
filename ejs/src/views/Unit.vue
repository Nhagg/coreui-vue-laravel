<template>
    <div class="container-fluid">
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
                v-else-if="
                    activeItem.type == 'newword_speak_1'
                    || activeItem.type == 'grammar_speak_1'
                    || activeItem.type == 'grammar_speak_2'
                "
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
                :key="activeItem.id"
                :setAnswer="setAnswer"
                :unit="unit"
                :item="activeItem"
            />
            <Default
                v-else
                :key="activeItem.id"
                :setAnswer="setAnswer"
                :unit="unit"
                :item="activeItem"
            />
        </div>
        <div
            class="study-footer"
            :class="{
              incorrect: activeItem.point != undefined && !isCorrect(),
              correct: activeItem.point != undefined  && isCorrect()
            }"
        >
            <span class="d-none">
                {{ resetStatus }}
            </span>
            <div v-if="isCorrect()">
                <i class="fa fa-check-circle"></i>
                Đáp án chính xác
            </div>
            <div v-else-if="!isCorrect()">
                <i class="fa fa-check-circle"></i>
                <span v-if="userAnswer">
                    Phát âm của bạn:
                    {{ userAnswer }}
                </span>
                <span v-else>
                    Đáp án không chính xác
                </span>
            </div>
            <div v-else></div>
            <button class="btn" @click="nextPage" v-if="activeItem.id">
                Tiếp theo
                <i class="fa fa-arrow-right"></i>
            </button>
            <a href="/" v-else class="btn">
                Quay lại trang chủ
            </a>
        </div>
    </div>
</template>
<script>
  import axios from "axios"
  import NewwordPractice1 from "./Item/NewwordPractice1";
  import NewwordPractice2 from "./Item/NewwordPractice2";
  import NewwordSpeak1 from "./Item/NewwordSpeak1";
  import NewwordPronunciation1 from "./Item/NewwordPronunciation1";
  import GrammarInformation2 from "./Item/GrammarInformation2";
  import Default from "./Item/Default";
  export default {
    name: 'Unit',
    components: {
      NewwordPractice1,
      NewwordPractice2,
      NewwordSpeak1,
      NewwordPronunciation1,
      GrammarInformation2,
      Default
    },
    async mounted() {
      let unitId = this.$route.params.id
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
      activeItem() {
        let { unit, activeItemIndex } = this
        if(unit && unit.learn_items && unit.learn_items[activeItemIndex]) {
          return unit.learn_items[activeItemIndex]
        }
        return {}
      }
    },
    data() {
      return {
        userAnswer: '',
        resetStatus: false,
        unit: {},
        activeItemIndex: 0
      }
    },
    methods: {
      isCorrect() {
        const activeItem = this.activeItem
        console.log('isCorrect', activeItem)
        return activeItem.point != undefined && activeItem.point == activeItem.score
      },
      nextPage() {
        this.userAnswer = ''
        this.activeItemIndex ++
      },
      resetPage() {
        this.resetStatus = !this.resetStatus
      },
      setAnswer(item, point, userAnswer = '') {
        item.point = parseInt(point) ? parseInt(point) : 0
        this.activeItemIndex = this.activeItemIndex
        this.userAnswer = userAnswer
        this.resetPage()
      }
    }
  }
</script>