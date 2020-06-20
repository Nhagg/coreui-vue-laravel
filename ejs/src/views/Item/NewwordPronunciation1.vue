<template>
    <div class="container newwork-speak-1">
        <div class="item-list-answer">
            <div class="row">
                <div class="col">
                    <div class="speak-title">
                        <div class="text-center mr-3">
                            <h3>Hãy đọc to theo tôi</h3>
                            <h3 v-html="$convertNameToHtml(unit.name_native_language)" class="japan-name"></h3>
                        </div>
                        <div class="volume-icon" @click="playVolume">
                            <i class="fa fa-volume-up"></i>
                        </div>
                    </div>
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
let playTimeout1, playTimeout2
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
      playTimeout1 = setTimeout(() => {
        this.activeAnswer = 2
        this.playVolume()
      }, 6000)
      playTimeout2 = setTimeout(() => {
        this.activeAnswer = 3
        this.playVolume()
      }, 9000)
    },
    beforeDestroy() {
      clearTimeout(playTimeout1)
      clearTimeout(playTimeout2)
    },
    data() {
      return {
        activeAnswer: 1
      }
    },
    methods: {
      playVolume() {
        console.log('playVolume', this.$getNativeName(this.unit.name_native_language))
        let msg = new SpeechSynthesisUtterance(this.$getNativeName(this.unit.name_native_language));
        msg.lang = 'ja-JP'
        window.speechSynthesis.speak(msg);
      }
    }
  }
</script>