<template>
    <div class="home-content pt-5">
        <div class="news">
            <div class="row">
                <div class="col-sm-8">
                    <h2>JVConnect chính thức hoạt động từ ngày 10/7</h2>
                </div>
                <div class="col-sm-3 text-right fw-500">
                    <small>Thứ bảy, 1/7/2020, 07:00</small>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-8">
                    <div>Cuộc tập trận của tàu sân bay USS Ronald Reagan và USS Nimitz ngày 4/7 là một trong những lần tập trận lớn nhất của hải quân Mỹ trong những năm gần đây tại Biển Đông. Các quan chức Mỹ cho biết họ muốn thách thức yêu sách lãnh thổ phi pháp của Trung Quốc, trong bối cảnh căng thẳng giữa hai nước gia tăng vì vấn đề thương mại, đại dịch Covid-19 và luật an ninh Hong Kong.</div>
                </div>
                <div class="col-sm-3">
                    <img src="../assets/img/news.png" alt="">
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