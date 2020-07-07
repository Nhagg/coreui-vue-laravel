<template>
    <div class="home-content pt-5">
        <div class="news">
            <div class="row">
                <div class="col-sm-9">
                    <router-link to="/news/1">
                        <h3>QUY ĐỊNH MỚI KHI NHẬP CẢNH VÀO NHẬT BẢN TỪ 01/10/2018</h3>
                    </router-link>
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
        <div class="news mt-5">
            <div class="row">
                <div class="col-sm-9">
                    <router-link to="/news/2">
                        <h3>MƯA LỚN TIẾP TỤC ĐE DỌA VÙNG KYUSHU, NHẬT BẢN</h3>
                    </router-link>
                </div>
                <div class="col-sm-3 text-right fw-500">
                    Thứ sáu, 3/7/2020, 09:00
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-4">
                    <img src="../assets/img/news/2_1.jpg" alt="">
                </div>
                <div class="col-sm-8">
                    <div>
                        Theo phóng viên TTXVN tại Tokyo, Cơ quan Khí tượng Nhật Bản (JMA) ngày 6/7 cho biết các đám mây tạo mưa đã hình thành và đang di chuyển về vùng Kyushu.
                    </div>
                </div>
            </div>
        </div>
        <div class="news mt-5">
            <div class="row">
                <div class="col-sm-9">
                    <router-link to="/news/3">
                        <h3>
                            Đưa công dân Việt Nam từ Nhật Bản về nước
                        </h3>
                    </router-link>
                </div>
                <div class="col-sm-3 text-right fw-500">
                    Thứ ba, 30/6/2020, 13:00
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-4">
                    <img src="../assets/img/news/3_1.jpg" alt="">
                </div>
                <div class="col-sm-8">
                    <div>
                        Ngày 30/6, các cơ quan chức năng Việt Nam, Đại sứ quán Việt Nam tại Nhật Bản và hãng Hàng không VietJet đã phối hợp với các cơ quan chức năng Nhật Bản đưa trên 225 công dân Việt Nam từ Nhật Bản về nước an toàn.
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