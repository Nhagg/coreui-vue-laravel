<template>
    <div class="container newwork-speak-1">
        <div class="item-list-answer">
            <div class="row">
                <div class="col">
                    <div class="speak-title">
                        <div class="text-center mr-3">
                            <h3>{{ unit.name_forgein_language }}</h3>
                            <h3 v-html="$convertNameToHtml(unit.name_native_language)" class="japan-name"></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 offset-1">
                    <h4>Bạn hãy dành thời gian để hiểu cấu trúc ngữ pháp này</h4>
                    <div class="item-answer">
                        <div class="ratio-4-4">
                            <img :src="$getItemImg(unit, item, 1)" alt="gramar-i-2">
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