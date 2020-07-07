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
                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 20%"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            20%
                        </div>
                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 5%"
                             aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">
                            5%
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
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 10%"
                             aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                            10%
                        </div>
                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 4%"
                             aria-valuenow="4" aria-valuemin="0" aria-valuemax="100">
                            4%
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
                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 20%"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            20%
                        </div>
                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 5%"
                             aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">
                            5%
                        </div>
                    </div>
                </div>
                <div class="report-result">
                    {{ listUnit.length + '/' + maxGrammar }}
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
  const maxNewWork = 600
  const maxGrammar = 25
  const maxConversation = 25
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
        let res = await axios.get(window.DOMAIN_API + '/api/tracking?user_id=' + this.user.id)
        if(res.data.success) {
            this.listUnit = res.data.data
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
            let listWork = this.listUnit.filter(u => u.type == wordType)
            if(pointType == 'good') {
                listWork = listWork.filter(u => u.progress >= 80)
            }
            if(pointType == 'bad') {
                listWork = listWork.filter(u => u.progress < 50)
            }
            if(pointType == 'good') {
                listWork = listWork.filter(u => u.progress >= 50 && u.progress < 80)
            }
            if(wordType == 'new_work') {
                return parseInt(listWork.length * 100 / maxNewWork)
            }
            if(wordType == 'grammar') {
                return parseInt(listWork.length * 100 / maxGrammar)
            }
            if(wordType == 'conversation') {
                return parseInt(listWork.length * 100 / maxConversation)
            }
            return 0
        }
    }
  }
</script>