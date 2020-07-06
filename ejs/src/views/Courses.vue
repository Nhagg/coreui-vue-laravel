<template>
    <div class="home-content">
        <h2 class="mt-2">Chương trình học tại JVConnect</h2>
        <div class="mt-4">
            <div class="iframe-parent">
                <iframe
                  src="https://docs.google.com/presentation/d/e/2PACX-1vTfHBPl5_KAZ3BNuMGtE2trs-kY12RjTGRc2OeCr86TltDpWg3OhKZMnFvaMByv7YbHSg5ytbdE6Lgj/embed?start=false&loop=false&delayms=60000"
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