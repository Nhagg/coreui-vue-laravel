<template>
    <div class="home-content">
        <h2 class="mt-2">Chương trình học tại JVConnect</h2>
        <div class="mt-4">
            <iframe
              src="https://docs.google.com/presentation/d/e/2PACX-1vRfatBrfBLuR3DHE0bxiW7HRP8QVzjqQjAGRu5Ni_0-zi-ApJUVhkryf2SxQKUqXz61YC4Lt5xPwDJA/embed?start=false&loop=false&delayms=60000"
              frameborder="0"
              width="960"
              height="569"
              allowfullscreen="true"
              mozallowfullscreen="true"
              webkitallowfullscreen="true">
            </iframe>
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