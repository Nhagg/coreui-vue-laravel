<template>
    <div class="container newwork-speak-1">
        <div class="row">
            <div class="col col-sm-12 text-center">
                <div class="speak-title">
                    <div class="text-center mr-4">
                        <h2>Hãy đọc to theo tôi</h2>
                        <h2 v-if="!compareHTML"
                            v-html="$convertNameToHtml(unit.name_native_language)"
                            class="japan-name"
                        >
                        </h2>
                        <h2 v-else v-html="compareHTML" class="japan-name"></h2>
                    </div>
                    <div class="volume-icon mr-3" @click="playVolume">
                        <i class="fa fa-volume-up"></i>
                    </div>
                    <div class="volume-icon" :class="{ 'text-red': microStatus }" @click="toggleMicro">
                        <i class="fa fa-microphone-alt"></i>
                    </div>
                </div>
            </div>
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
        compareHTML: '',
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
        this.compareHTML = ''
        let msg = new SpeechSynthesisUtterance(this.$getNativeName(this.unit.name_native_language));
        msg.lang = 'ja-JP'
        window.speechSynthesis.speak(msg);
      },
      compareResult(userAnswer, correctAnswer) {
        let ans = correctAnswer.replace(/./g, '')
        if(userAnswer == ans) {
          return this.item.score
        }
        let compareHTML = ''
        let correctArr = correctAnswer.split('')
        let userArr = userAnswer.split('')
        const lengthUserArr = userArr.length
        const lengthCorrectArr = correctAnswer.length
        let point = 0
        correctArr.forEach((text, index) => {
          const compareIndex = parseInt((index + 1) * lengthUserArr / lengthCorrectArr)
          let acceptedArr = [
            userArr[index],
            userArr[index + 1],
            userArr[index -1],
            userArr[compareIndex],
            userArr[compareIndex - 1],
            userArr[compareIndex + 1]
          ]
          console.log(text, acceptedArr)
          if(acceptedArr.indexOf(text) > -1) {
            point ++
            compareHTML += '<span class="text-green">'+ text +'</span>'
          } else {
            compareHTML += '<span class="text-red">' + text +'</span>'
          }
        })
        this.compareHTML = compareHTML
        return parseInt(point * this.item.score / lengthCorrectArr)
      },
      checkAnswer() {
        let nativeName = this.$getNativeName(this.unit.name_native_language)
        this.setAnswer(
          this.item, this.compareResult(this.userAnswer, nativeName), this.userAnswer
        )
      }
    }
  }
</script>