<template>
    <div class="home-content pt-5">
        <div class="news">
            <div class="row">
                <div class="col-sm-9">
                    <h2>QUY ĐỊNH MỚI KHI NHẬP CẢNH VÀO NHẬT BẢN TỪ 01/10/2018</h2>
                </div>
                <div class="col-sm-3 text-right fw-500">
                    Thứ bảy, 4/7/2020, 07:00
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-4">
                    <img src="../assets/img/news/1_2.jpg" alt="">
                </div>
                <div class="col-sm-8">
                    <div>
                        Viện bảo vệ thực vật Nhật Bản vừa ra thông báo, bắt đầu áp dụng việc CẤM mang các sản phẩm THỰC VẬT không có GIẤY XÁC NHẬN KIỂM DỊCH VỆ SINH vào lãnh  thổ Nhật Bản từ ngày 1/10/2018.
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