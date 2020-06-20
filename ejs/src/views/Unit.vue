<template>
    <div class="container-fluid">
        <div class="study-content" v-if="unit.id">
            <NewwordPractice1
                v-if="activeItem.type == 'newword_practice_1'"
                :setAnswer="setAnswer"
                :unit="unit"
                :item="unit.learn_items[activeItemIndex]"
            />
            <Default
                v-else
                :setAnswer="setAnswer"
                :unit="unit"
                :item="unit.learn_items[activeItemIndex]"
            />
        </div>
        <div
                class="study-footer"
                :class="{ incorrect: activeItem.correct === false, correct: activeItem.correct === true}"
        >
            <span class="d-none">
                {{ resetStatus }}
            </span>
            <div v-if="activeItem.correct === true">
                <i class="fa fa-check-circle"></i>
                Đáp án chính xác
            </div>
            <div v-else-if="activeItem.correct === false">
                <i class="fa fa-check-circle"></i>
                Đáp án không chính xác
            </div>
            <div v-else></div>
            <button class="btn" @click="activeItemIndex ++">
                Tiếp theo
                <i class="fa fa-arrow-right"></i>
            </button>
        </div>
    </div>
</template>
<script>
  import axios from "axios"
  import NewwordPractice1 from "./Item/NewwordPractice1";
  import Default from "./Item/Default";
  export default {
    name: 'Unit',
    components: { NewwordPractice1, Default },
    async mounted() {
      let unitId = this.$route.params.id
      if( !unitId) {
        alert('Không tìm thấy bài học')
        return
      }
      await axios.get(window.DOMAIN_API + '/api/learn_units/' + unitId).then(
        res => {
          this.unit = res.data.data
          console.log(this.unit)
        }
      ).catch(e => {
        console.log(e)
        alert(e.message)
      })
    },
    computed: {
      activeItem() {
        if(this.unit && this.unit.learn_items) {
          return this.unit.learn_items[this.activeItemIndex]
        }
        return {}
      }
    },
    data() {
      return {
        resetStatus: false,
        unit: {},
        activeItemIndex: 0
      }
    },
    methods: {
      resetPage() {
        this.resetStatus = !this.resetStatus
      },
      setAnswer(item, status) {
        item.correct = status ? true : false
        this.resetPage()
      }
    }
  }
</script>