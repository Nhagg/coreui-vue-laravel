<template>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2>{{ listTitle[0] }}</h2>
                <h2 v-html="$convertNameToHtml(unit.name_native_language)" class="japan-name"></h2>
            </div>
        </div>
        <div class="item-list-answer">
            <div class="row">
                <div v-for="i in listAnswer" :key="i" class="col-sm-6">
                    <div class="item-answer" @click="() => checkAnswer(i)">
                        <div class="item-img ratio-4-3">
                            <img :src="$getItemImg(unit, item, i)" alt="">
                            <i
                                v-if="userAnswer !== null && i === 1"
                                class="fas fa-check-circle text-success"
                            />
                            <i
                                v-if="userAnswer === i && i !== 1"
                                class="fas fa-check-circle text-danger"
                            />
                        </div>
                        <div class="item-text">
                            {{ item.content['image_text' + i] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    let listTitle = [
      'Bạn hãy thử đoán nghĩa của từ sau nhé!',
      'Hãy thử nhìn các bức tranh và tìm ra nghĩa của từ dưới đây:',
      'Chúng ta thử chơi trò chơi đoán nghĩa của từ sau nhé ?',
      'Theo bạn bức tranh nào mô tả đúng nghĩa của từ này ?',
    ]
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
        listTitle: this.$shuffler(listTitle),
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
        this.setAnswer(this.item, i === 1 ? this.item.score : 0)
      }
    }
  }
</script>