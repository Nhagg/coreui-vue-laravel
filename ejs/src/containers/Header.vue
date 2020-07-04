<template>
  <header>
    <div class="container">
      <ul class="nav justify-content-end">
        <li v-for="course in listCourse" :key="course.id" class="nav-item">
          <a
            :href="'/course/' + course.id"
            class="nav-link"
            :class="{ active: activeCourse == course.id}"
          >
            {{ course.name }}
          </a>
        </li>
      </ul>
    </div>
  </header>
</template>

<script>
import {mapState} from 'vuex'

export default {
  name: 'Header',
  components: {},
  computed: {
    ...mapState(['listCourse', 'activeCourse'])
  },
  mounted() {
    console.log(this.$route)
  }
}
</script>
