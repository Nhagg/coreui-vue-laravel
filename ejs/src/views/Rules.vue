<template>
    <div class="home-content">
        <h2 class="mt-2">Nội quy trung tâm</h2>
        <div class="mt-4">
            <div class="iframe-parent">
                <iframe
                  src="https://docs.google.com/presentation/d/e/2PACX-1vSyy1lHvs4VOVOjv1fHi8UmLlpOszCRlUUHaIY1MyMMLq2rKCfHn0qGdo92uI90Aujc_HXlkLa3I22J/embed?start=false&loop=false&delayms=60000"
                  frameborder="0"
                  width="960"
                  height="569"
                  allowfullscreen="true"
                  mozallowfullscreen="true"
                  webkitallowfullscreen="true">
                </iframe>
            </div>
        </div>
        <h2 class="mt-5">Nội quy ký túc xá</h2>
        <div class="mt-4">
            <div class="iframe-parent">
                <iframe
                  src="https://docs.google.com/presentation/d/e/2PACX-1vTSEuCSBeRHTrWkWiq89atdHtFttQuDStMHQp-upxbIX5hYH50FTwRRxgSlUlYOaaOrSqnZBdS19GSw/embed?start=false&loop=false&delayms=60000"
                  frameborder="0"
                  width="960"
                  height="569"
                  allowfullscreen="true"
                  mozallowfullscreen="true"
                  webkitallowfullscreen="true">
                </iframe>
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
        listLesson: []
      }
    },
    methods: {
      onErrorImg(event) {
        event.target.src = require('../../public/img/lesson/default.png')
      }
    }
  }
</script>