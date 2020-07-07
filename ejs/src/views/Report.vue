<template>
    <div class="report-content pt-5">
        <div class="list-report">
            <div class="report-item">
                <div class="report-label">
                    Từ mới
                </div>
                <div class="report-progress">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 30%"
                             aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                            30%
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
                    (600/1500)
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
                    (14/100)
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
                    (7/25)
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
  export default {
    name: 'Home',
    components: {},
    computed: {
      ...mapState(['domainAPI']),
    },
    watch: {
      activeCourse(val) {
        console.log(val)
      }
    },
    async mounted() {
    },
    data() {
      return {
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
          ]
      }
    },
    methods: {
    }
  }
</script>