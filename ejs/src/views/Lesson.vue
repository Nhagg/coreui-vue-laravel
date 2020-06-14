<template>
    <div class="detail-lesson">
        <div class="detail-lesson-header">
            <div class="lesson-title">
                <div class="lesson-title-native">
                    Bài 1: はじめまして
                </div>
                <div class="lesson-title-trans">
                    Làm quen lần đầu gặp gỡ
                </div>
            </div>
            <div class="progress-circle" data-progress="10"></div>
        </div>
        <div class="row mt-4">
            <div class="col-md-3" v-for="unitType in learnUnitTypes" :key="unitType.type">
                <div class="unit-type-header">
                    <img :src="unitType.imgUrl" alt="unitType">
                    <div class="">
                        {{ unitType.name }}
                        <span class="">8/23</span>
                    </div>
                </div>
                <div class="list-unit">
                    <div class="unit-type-item" v-for="unit in learnUnits.filter(u => u.type == unitType.type)"
                         :key="unit.id">
                        <i class="fa fa-check-circle"></i>
                        <router-link :to="'/study?item_id=' + unit.id">
                            {{ unit.name_native_language }}
                            <span class="one-line-text">
                                {{ unit.name_forgein_language }}
                            </span>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import axios from 'axios'
  export default {
    name: 'Lesson',
    components: {},
    async mounted() {
      let res = await axios.get('http://118.70.161.155:8880/api/learn_units')
      if(res && res.data && res.data.data) {
        this.learnUnits = res.data.data
      }
    },
    data() {
      return {
        learnUnitTypes: [
          {
            type: 'vocaburary',
            imgUrl: '/img/new-word.png',
            name: 'Học từ mới'
          },
          {
            type: 'grammar',
            imgUrl: '/img/grammar.png',
            name: 'Ngữ pháp'
          },
          {
            type: 'conversation',
            imgUrl: '/img/conversation.png',
            name: 'Hội thoại'
          },
          {
            type: 'practice',
            imgUrl: '/img/practice.png',
            name: 'Làm bài tập'
          }
        ],
        learnUnits: []
      }
    }
  }
</script>