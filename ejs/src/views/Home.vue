<template>
    <div class="home-content">
        <h2>Minano Nihongo N5</h2>
        <div class="row lesson-list">
            <div
                    v-for="lessson in listLesson"
                    :key="lessson"
                    class="col-sm-4"
            >
                <router-link to="/lesson" class="lesson-content">
                    <div class="lesson-card">
                        <div class="lesson-img ratio-4-3">
                            <img :src="lessson.image" alt="lesson-img">
                        </div>
                        <div class="lesson-body">
                            <div class="lesson-title">
                                <div class="lesson-title-native">
                                    {{ lessson.name_native_language }}
                                </div>
                                <div class="lesson-title-trans">
                                    {{ lessson.name_second_language }}
                                </div>
                            </div>
                            <div class="lesson-result">
                                {{ 20 }}%
                            </div>
                        </div>
                    </div>
                </router-link>
            </div>
        </div>
    </div>
</template>
<script>
  import axios from 'axios'
  export default {
    name: 'Home',
    components: {},
    async mounted() {
      let res = await axios.get('http://118.70.161.155:8880/api/lessions')
      if(res && res.data && res.data.data) {
        this.listLesson = res.data.data
      }
      console.log(res)
    },
    data() {
      return {
        listLesson: []
      }
    }
  }
</script>