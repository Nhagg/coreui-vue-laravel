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
                    <div class="unit-type-item" v-for="unit in learnUnits" :key="unit.id">
                        <i class="fa fa-check-circle"></i>
                        <div>
                            {{ unit.name }}
                            <span class="one-line-text">
                                {{ unit.name_trans }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'Lesson',
    components: {},
    data() {
      return {
        learnUnitTypes: [
          {
            type: 'new-work',
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
        learnUnits: [
          {
            id: 1,
            learn_unit_type: 'new-word',
            name: '私',
            name_trans: 'Tôi',
            result: 3
          },
          {
            id: 2,
            learn_unit_type: 'new-word',
            name: 'あなた',
            name_trans: 'Bạn',
            result: 3
          },
          {
            id: 3,
            learn_unit_type: 'new-word',
            name: 'はじめまして',
            name_trans: 'Rất vui khi được làm quen',
            result: 3
          }
        ]
      }
    }
  }
</script>