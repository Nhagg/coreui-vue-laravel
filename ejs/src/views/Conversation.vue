<template>
    <div class="container-fluid page-conversation">
        <span class="d-none">
            {{ resetStatus }}
        </span>
        <div class="study-header">
            <router-link :to="'/lesson/' + lessonID">
                <img src="/img/ejs/logo.png" alt="">
            </router-link>
            <div class="study-header-text">
                {{ 'Học hội thoại' }}
            </div>
        </div>
        <div class="study-content" v-if="unit.id">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 border-right left-content">
                        <h2 v-html="$convertNameToHtml(unit.name_native_language)" class="japan-name"></h2>
                        <h2>
                            {{ unit.name_forgein_language }}
                        </h2>
                        <div class="context-content" v-if="activeContext.id">
                            <img :src="$getItemImg(unit, activeContext, 1)" alt="">
                            <div>
                                {{ activeContext.content.image_text1 }}
                            </div>
                        </div>
                        <div class="list-person">
                            Bạn sẽ là:
                            <div v-for="i in [1, 2, 3]" class="d-inline-block" :key="i">
                                <span
                                    v-html="$convertNameToHtml(itemConfig.content['image_text' + i])"
                                    class="japan-name"
                                    :class="{ active: activePersonIndex == i }"
                                >
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 right-content">
                        <div v-if="activeItem.id == activeContext.id">
                            <button class="btn btn-green" @click="nextPage">
                                Bắt đầu hội thoại
                                <i class="fa fa-arrow-right"></i>
                            </button>
                        </div>
                        <div v-if="activeItem.type == 'conversation_sentence_1'" class="list-sentence">
                            <div
                                v-for="(item, index) in listSentence"
                                :key="item.id"
                                class="conversation-item"
                            >
                                <div class="conversation-item-name">
                                    {{ itemConfig.content['image_text' + (index + 1)] }}
                                </div>
                                <div class="conversation-item-text">
                                    <div>
                                        <div
                                            v-html="$convertNameToHtml(getSentenceText(item.content['title2'], 0))"
                                            class="japan-name"
                                        />
                                        <div>
                                            {{ getSentenceText(item.content['title2'], 1) }}
                                        </div>
                                    </div>
                                    <div class="volume-icon" @click="playVolume(getSentenceText(item.content['title2'], 0))">
                                        <i class="fa fa-volume-up"></i>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-green btn-continue" @click="nextPage">
                                Tiếp theo
                                <i class="fa fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  import { mapState } from 'vuex'
  import axios from "axios"
  const FREE_TYPE = ['newword_speak_1', 'grammar_speak_1', 'grammar_speak_2']
  export default {
    name: 'Unit',
    components: {
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
      },
      itemConfig() {
        let { unit } = this
        if(unit && unit.learn_items) {
          let item = unit.learn_items.find((i) => i.type == 'conversation_config')
          console.log('itemConfig', item)
          return item ? item : {}
        }
        return {}
      },
      activeContext() {
        let { unit, activeContextIndex } = this
        if(unit && unit.learn_items) {
          let context = unit.learn_items.filter((i) => i.type == 'conversation_context')[activeContextIndex]
          console.log('context', context)
          return context ? context : {}
        }
        return {}
      },
      listSentence() {
        let { unit, activeContext } = this
        if(unit.id && activeContext.id) {
          console.log('activeContextIndex', activeContext)
          const activeContextIndex = unit.learn_items.findIndex((i) => i.id == activeContext.id)
          let nextContext = unit.learn_items.findIndex((i, index) => i.type == 'conversation_context' && index >
            activeContextIndex)
          console.log('nextContext', nextContext)
          if(nextContext == -1) {
            nextContext = 10000
          }
          let res = unit.learn_items.filter((i, index) => i.type == 'conversation_sentence_1' && index <
            nextContext)
          console.log('listSentence', res)
          return res ? res : []
        }
        return []
      }
    },
    data() {
      return {
        lessonID: this.$route.params.lessonId,
        userAnswer: '',
        resetStatus: false,
        showResult: false,
        unit: {},
        activePersonIndex: 1,
        activeItemIndex: 2,
        activeContextIndex: 0
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
      },
      playVolume(text) {
        console.log('playVolume', this.$getNativeName(text))
        let msg = new SpeechSynthesisUtterance(this.$getNativeName(text));
        msg.lang = 'ja-JP'
        window.speechSynthesis.speak(msg);
      },
      getSentenceText(text = '', index = 0) {
        return text.split('--')[index]
      }
    }
  }
</script>