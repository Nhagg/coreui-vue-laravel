<template>
    <div class="container newwork-speak-1">
        <div class="item-list-answer">
            <div class="row">
                <div class="col col-sm-12">
                    <div class="speak-title">
                        <div class="text-center mr-4">
                            <h3>Hãy đọc to theo tôi</h3>
                            <h3 v-html="$convertNameToHtml(unit.name_native_language)" class="japan-name"></h3>
                        </div>
                        <div class="volume-icon mr-3" @click="playVolume">
                            <i class="fa fa-volume-up"></i>
                        </div>
                        <div class="volume-icon" :class="{ 'text-red': microStatus }" @click="toggleMicro">
                            <i class="fa fa-microphone-alt"></i>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h4 v-if="userAnswer">
                        Đáp án của bạn:
                        <div v-html="$convertNameToHtml(userAnswer)" class="japan-name d-inline-block"></div>
                    </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 offset-2">
                    <div class="item-answer">
                        <div class="ratio-4-4">
                            <img :src="$domainAPI + '/images/new_work/' + item.content['image' + activeAnswer]" alt="">
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
      setTimeout(this.playVolume(), 3000)
      recognition = new webkitSpeechRecognition();
      recognition.continuous = true;
      recognition.lang='ja-JP'
      recognition.onresult = (event) => {
        this.userAnswer = event.results[0][0].transcript
        this.checkAnswer()
      }
    },
    data() {
      return {
        microStatus: false,
        userAnswer: '',
        activeAnswer: 1
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
        this.setAnswer(this.item, this.userAnswer == this.$getNativeName(this.unit.name_native_language))
      }
    }
  }
</script>