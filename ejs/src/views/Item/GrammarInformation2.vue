<template>
    <div class="container grammar-info-1 text-center">
        <div class="mt-5" v-if="!item.showText">
            <div class="row">
                <div class="col-sm-10 offset-1">
                    <h3>Bạn hãy dành thời gian để hiểu cấu trúc ngữ pháp này</h3>
                    <div class="mt-4">
                        <img :src="$getItemImg(unit, item, 1)" alt="grammar0img" class="w-100">
                    </div>
                </div>
            </div>
        </div>
        <div v-else class="text-large">
            Một số mẫu câu tương tự
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
    mounted() {
    },
    beforeDestroy() {
    },
    data() {
      return {
        activeAnswer: 1
      }
    },
    methods: {
    }
  }
</script>