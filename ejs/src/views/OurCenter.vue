<template>
    <div class="home-content">
        <h2 class="mt-2">Giới thiệu về công ty tư vấn kết nối Việt Nhật JVCONNECT (JVC)</h2>
        <div class="row mt-4">
            <div class="col-sm-10">
                <p>
                    JVC  tự hào là một trong những doanh nghiệp hàng đầu Việt Nam trong lĩnh vực đào tạo và phái cử kỹ sư, thực tập sinh sang Nhật Bản học tập và làm việc. Mỗi năm JVC phái cử khoảng 1500 người đi làm việc, tu nghiệp tại Nhật Bản. Hiện nay, JVC đang quản lý trên 4000 kỹ sư, thực tập sinh đang làm việc, tu nghiệp.
                </p>
                <p>
                    Hơn thế, JVC còn là doanh nghiệp tiên phong sáng tạo và áp dụng phương pháp học tập trực tuyến, áp dụng phần mềm học tiếng nhật vào chương trình học. Giúp học viên có cơ hội tiếp xúc với tiếng nhật chuẩn, ngữ điệu bản ngữ giúp khả năng giao tiếp được tăng vọt.
                </p>
                <p>
                    Trong những năm qua, JVC luôn cung ứng nguồn lao động có chất lượng cho các đối tác và chủ sử dụng lao động đồng thời cam kết đảm bảo mức lương, thu nhập, các quyền và lợi ích hợp pháp cho người lao động làm việc tại Nhật Bản.
                </p>
                <p>
                    JVC liên tục tổ chức tuyển chọn, đào tạo ngoại ngữ, chuyên môn, tay nghề và kiến thức văn hoá cần thiết cho mọi đối tượng từ lao động phổ thông đến lao động kỹ thuật và chuyên gia đáp ứng yêu cầu về nhân lực của các doanh nghiệp cũng như các tập đoàn lớn tại Nhật Bản.
                </p>
                <p>
                    Song song với các dịch vụ, JVC còn có cơ chế hỗ trợ người lao động trong quá trình đào tạo nghề, đào tạo ngoại ngữ và giáo dục định hướng, với mức phí dịch vụ thấp nhất theo quy định của Bộ Lao động – Thương binh và Xã hội. Người lao động luôn được quan tâm, tạo điều kiện và quản lý tốt nhất từ quá trình tuyển dụng cho đến khi làm việc ở nước ngoài.Chúng tôi luôn có các đầu mối liên lạc, kịp thời giúp đỡ và sẵn sàng giải quyết các vấn đề vướng mắc của Du học sinh, tu nghiệp sinh và người lao động trong thời gian học tập và thực hiện hợp đồng lao động ở Nhật Bản. JVC luôn mong muốn được hợp tác với các bạn hàng; các đối tác; các chủ đầu tư; các tổ chức; các nghiệp đoàn của các nước quan tâm mong muốn được giới thiệu việc làm, đi tu nghiệp, xuất khẩu lao động để cùng phát triển.
                </p>
                <p>
                    Lấy sự phục vụ tận tâm làm nền tảng hoạt động, JVC luôn khai thác những đơn hàng đảm bảo nhất với chi phí hợp lý nhất và cung cấp những lao động ưu tú nhất với thời gian nhanh nhất để tạo nên thương hiệu lớn nhất tại Việt Nam. JVC luôn nỗ lực phấn đấu để trở thành cầu nối đáp ứng mọi nhu cầu về việc làm cho người lao động!
                </p>
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