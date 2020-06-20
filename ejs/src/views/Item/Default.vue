<template>
    <div class="container">
        {{ item }}
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
    data() {
      return {
        userAnswer: null,
        listAnswer: this.$shuffler([1, 2, 3, 4])
      }
    },
    methods: {
      checkAnswer(i) {
        if(this.userAnswer != null) {
          return
        }
        this.userAnswer = i
        this.setAnswer(this.item, i === 1)
      }
    }
  }
</script>