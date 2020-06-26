<template>
    <div class="container newwork-speak-1">
        <div class="row">
            <div class="col text-center">
                <div class="speak-title">
                    <div class="text-center mr-3">
                        <h2 v-html="$convertNameToHtml(item.content.title1)" class="japan-name"></h2>
                        <h2>{{ item.content.title2 }}</h2>
                    </div>
                    <div class="volume-icon" @click="playVolume">
                        <i class="fa fa-volume-up"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="item-list-answer">
            <div class="row pt-4">
                <div class="col-sm-8 offset-2">
                    <div class="item-answer">
                        <img :src="$getItemImg(unit, item, activeAnswer)" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  export default {
    name: 'NewworkPractice1',
    props: {
      setAnswer: {
        type: Function,
        default: Function
      },
      unit: {
        type: Object,
        default: Object
      },
      item: {
        type: Object,
        default: Object
      }
    },
    mounted() {
      setTimeout(this.playVolume(), 2000)
    },
    data() {
      return {
        activeAnswer: 1
      }
    },
    methods: {
      playVolume() {
        let text = this.$getNativeName(this.item.content.title1)
        console.log('playVolume', text)
        let msg = new SpeechSynthesisUtterance(text);
        msg.lang = 'ja-JP'
        window.speechSynthesis.speak(msg);
      }
    }
  }
</script>