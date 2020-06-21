<template>
    <div class="container newwork-practice-2">
        <div class="row">
            <div class="col text-center">
                <h2>Chọn đúng nghĩa của</h2>
                <h2 v-html="$convertNameToHtml(unit.name_native_language)" class="japan-name"></h2>
            </div>
        </div>
        <div class="item-list-answer mt-5">
            <div class="row">
                <div v-for="i in listAnswer" :key="i" class="col-sm-12">
                    <div
                        @click="() => checkAnswer(i)"
                        class="item-choice"
                        :class="{
                          incorrect: userAnswer === i && userAnswer !== 1,
                          correct: userAnswer !== null && i === 1
                        }"
                    >
                        <div class="item-icon">
                            <i
                                v-if="userAnswer !== null && i === 1"
                                class="far fa-check-circle text-success"
                            />
                        </div>
                        <div>
                            {{ item.content['image_text' + i] }}
                        </div>
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
        this.setAnswer(this.item, i === 1 ? this.item.scrore : 0)
      }
    }
  }
</script>