<template>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h3>Chúc mừng bạn học được thêm 1 từ mới </h3>
                <h3>{{ unit.name_forgein_language }}</h3>
                <h3 v-html="$convertNameToHtml(unit.name_native_language)" class="japan-name"></h3>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="text-result-point">
                    {{ resultPoint + ' %' }}
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
      }
    },
    computed: {
      resultPoint() {
        let res = 0
        const listItem = this.unit.learn_items
        let totalPoint = 0
        listItem.forEach(
          item => {
            totalPoint += parseInt(item.score)
            if(item.correct || item.type == 'newword_speak_1') {
              res += parseInt(item.score)
            }
          }
        )
        return parseInt(res * 100/totalPoint)
      }
    },
    data() {
      return {
        userAnswer: null,
        listAnswer: this.$shuffler([1, 2, 3, 4])
      }
    },
    methods: {
    }
  }
</script>