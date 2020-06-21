<template>
    <div class="container newwork-speak-1">
        <div class="row">
            <div class="col col-sm-12 text-center">
                <div class="speak-title">
                    <div class="text-center mr-4">
                        <h2>Hãy đọc to theo tôi</h2>
                        <h2 v-html="$convertNameToHtml(unit.name_native_language)" class="japan-name"></h2>
                    </div>
                    <div class="volume-icon mr-3" @click="playVolume">
                        <i class="fa fa-volume-up"></i>
                    </div>
                    <div class="volume-icon" :class="{ 'text-red': microStatus }" @click="toggleMicro">
                        <i class="fa fa-microphone-alt"></i>
                    </div>
                </div>
            </div>
<!--            <div class="col">-->
<!--                <h4 v-if="userAnswer">-->
<!--                    Phát âm của bạn:-->
<!--                    <div v-html="$convertNameToHtml(userAnswer)" class="japan-name d-inline-block"></div>-->
<!--                </h4>-->
<!--            </div>-->
        </div>
        <div class="item-list-answer">
            <div class="row">
                <div class="col-sm-8 offset-2">
                    <div class="item-answer">
                        <div class="ratio-4-4">
                            <img :src="$getItemImg(unit, item, 1)" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
let recognition
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
      recognition = new webkitSpeechRecognition();
      recognition.continuous = true;
      recognition.lang='ja-JP'
      recognition.onresult = (event) => {
        console.log('onresult')
        this.userAnswer = event.results[0][0].transcript
        console.log(this.userAnswer)
        this.checkAnswer()
        recognition.stop()
        this.microStatus = false
      }
    },
    data() {
      return {
        microStatus: false,
        userAnswer: ''
      }
    },
    methods: {
      toggleMicro() {
        if(this.microStatus) {
          recognition.stop()
        } else {
          recognition.start()
        }
        this.microStatus = !this.microStatus
      },
      playVolume() {
        console.log('playVolume', this.$getNativeName(this.unit.name_native_language))
        let msg = new SpeechSynthesisUtterance(this.$getNativeName(this.unit.name_native_language));
        msg.lang = 'ja-JP'
        window.speechSynthesis.speak(msg);
      },
      checkAnswer() {
        let isCorrect = this.userAnswer == this.$getNativeName(this.unit.name_native_language)
        console.log('st', this.userAnswer)
        console.log('st', this.$getNativeName(this.unit.name_native_language))
        console.log('st', isCorrect, this.item.score)
        this.setAnswer(
          this.item, isCorrect ? this.item.score : 0, this.userAnswer
        )
      }
    }
  }
</script>