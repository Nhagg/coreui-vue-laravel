<template>
    <div class="report-content pt-5">
        <div class="list-report">
            <div class="report-item">
                <div class="report-label">
                    Từ mới
                </div>
                <div class="report-progress">
                    <div class="progress">
                        <div
                          v-if="getPoint('new_word', 'good')"
                          class="progress-bar progress-bar-striped bg-success"
                          role="progressbar"
                          :style="`width: ${getPoint('new_word', 'good')}%`"
                          :aria-valuenow="getPoint('new_word', 'good')"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        >
                            {{ getPoint('new_word', 'good') + '%' }}
                        </div>
                        <div
                          v-if="getPoint('new_word', 'middle')"
                          class="progress-bar progress-bar-striped bg-warning"
                          role="progressbar"
                          :style="`width: ${getPoint('new_word', 'middle')}%`"
                          :aria-valuenow="getPoint('new_word', 'middle')"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        >
                            {{ getPoint('new_word', 'middle') + '%' }}
                        </div>
                        <div
                          v-if="getPoint('new_word', 'bad')"
                          class="progress-bar progress-bar-striped bg-danger"
                          role="progressbar"
                          :style="`width: ${getPoint('new_word', 'bad')}%`"
                          :aria-valuenow="getPoint('new_word', 'bad')"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        >
                            {{ getPoint('new_word', 'bad') + '%' }}
                        </div>
                    </div>
                </div>
                <div class="report-result">
                    {{ listUnit.length + '/' + maxNewWork }}
                </div>
            </div>
            <div class="report-item">
                <div class="report-label">
                    Ngữ pháp
                </div>
                <div class="report-progress">
                    <div class="progress">
                        <div
                          v-if="getPoint('grammar', 'good')"
                          class="progress-bar progress-bar-striped bg-success"
                          role="progressbar"
                          :style="`width: ${getPoint('grammar', 'good')}%`"
                          :aria-valuenow="getPoint('grammar', 'good')"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        >
                            {{ getPoint('grammar', 'good') + '%' }}
                        </div>
                        <div
                          v-if="getPoint('grammar', 'middle')"
                          class="progress-bar progress-bar-striped bg-warning"
                          role="progressbar"
                          :style="`width: ${getPoint('grammar', 'middle')}%`"
                          :aria-valuenow="getPoint('grammar', 'middle')"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        >
                            {{ getPoint('grammar', 'middle') + '%' }}
                        </div>
                        <div
                          v-if="getPoint('grammar', 'bad')"
                          class="progress-bar progress-bar-striped bg-danger"
                          role="progressbar"
                          :style="`width: ${getPoint('grammar', 'bad')}%`"
                          :aria-valuenow="getPoint('grammar', 'bad')"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        >
                            {{ getPoint('grammar', 'bad') + '%' }}
                        </div>
                    </div>
                </div>
                <div class="report-result">
                    {{ listUnit.length + '/' + maxGrammar }}
                </div>
            </div>
            <div class="report-item">
                <div class="report-label">
                    Phát âm
                </div>
                <div class="report-progress">

                    <div class="progress">
                        <div
                          v-if="getPoint('conversation', 'good')"
                          class="progress-bar progress-bar-striped bg-success"
                          role="progressbar"
                          :style="`width: ${getPoint('conversation', 'good')}%`"
                          :aria-valuenow="getPoint('conversation', 'good')"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        >
                            {{ getPoint('conversation', 'good') + '%' }}
                        </div>
                        <div
                          v-if="getPoint('conversation', 'middle')"
                          class="progress-bar progress-bar-striped bg-warning"
                          role="progressbar"
                          :style="`width: ${getPoint('conversation', 'middle')}%`"
                          :aria-valuenow="getPoint('conversation', 'middle')"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        >
                            {{ getPoint('conversation', 'middle') + '%' }}
                        </div>
                        <div
                          v-if="getPoint('conversation', 'bad')"
                          class="progress-bar progress-bar-striped bg-danger"
                          role="progressbar"
                          :style="`width: ${getPoint('conversation', 'bad')}%`"
                          :aria-valuenow="getPoint('conversation', 'bad')"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        >
                            {{ getPoint('conversation', 'bad') + '%' }}
                        </div>
                    </div>
                </div>
                <div class="report-result">
                    {{ listUnit.length + '/' + maxConversation }}
                </div>
            </div>
        </div>
        <div class="work-report mt-4">
            <div class="row">
                <div
                  v-for="unitType in learnUnitTypes"
                  :key="unitType.type"
                  class="col-sm-4"
                >
                    <div class="unit-type-header">
                        <img :src="unitType.imgUrl" alt="unitType">
                        <div class="">
                            {{ unitType.name }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  // import axios from 'axios'
  import { mapState } from "vuex";
  import axios from "axios";
  const maxNewWork = 200
  const maxGrammar = 25
  const maxConversation = 10
  export default {
    name: 'Home',
    components: {},
    computed: {
      ...mapState(['domainAPI', 'user']),
    },
    watch: {
      activeCourse(val) {
        console.log(val)
      }
    },
    async mounted() {
        let userId = this.user.id ? this.user.id : 18
        let res = await axios.get(window.DOMAIN_API + '/api/tracking?user_id=' + userId +'&type=learn_unit')
        console.log(res)
        if(res.data.success) {
            this.listUnit = res.data.data
            console.log('listUnit', this.listUnit)
        }
    },
    data() {
      return {
          maxNewWork,
          maxGrammar,
          maxConversation,
          learnUnitTypes: [
              {
                  type: 'new_word',
                  imgUrl: '/img/new-word.png',
                  name: 'Từ mới'
              },
              {
                  type: 'grammar',
                  imgUrl: '/img/grammar.png',
                  name: 'Ngữ pháp'
              },
              {
                  type: 'conversation',
                  imgUrl: '/img/conversation.png',
                  name: 'Phát âm'
              }
          ],
          listUnit: []
      }
    },
    methods: {
        getPoint(wordType, pointType) {
            let listWork = this.listUnit.filter(u => u.learn_unit.type == wordType)
            console.log('getPoint', this.listUnit, wordType, pointType)
            if(pointType == 'good') {
                listWork = listWork.filter(u => u.progress >= 80)
            }
            if(pointType == 'bad') {
                listWork = listWork.filter(u => u.progress < 50)
            }
            if(pointType == 'middle') {
                listWork = listWork.filter(u => u.progress >= 50 && u.progress < 80)
            }
            console.log('getPoint', listWork.length)
            if(wordType == 'new_word') {
                return Math.ceil(listWork.length * 100 / maxNewWork)
            }
            if(wordType == 'grammar') {
                return Math.ceil(listWork.length * 100 / maxGrammar)
            }
            if(wordType == 'conversation') {
                return Math.ceil(listWork.length * 100 / maxConversation)
            }
            return 0
        }
    }
  }
</script>