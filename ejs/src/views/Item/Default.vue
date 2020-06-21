<template>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2>Chúc mừng bạn học được thêm 1 từ mới </h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div
                    class="text-result-point"
                    :class="{
                        'text-red': resultPoint <= 40,
                        'text-yellow': resultPoint > 40 && resultPoint < 80,
                        'text-green': resultPoint > 80,
                    }"
                >
                    <div>
                        <h2 v-html="$convertNameToHtml(unit.name_native_language)" class="japan-name"></h2>
                        <h2>{{ unit.name_forgein_language }}</h2>
                    </div>
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
      },
      item: {
        type: Object,
        default: Object
      },
      resultPoint: {
        type: Number,
        default: 0
      }
    },
    mounted() {
      console.log('default', this.item)
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