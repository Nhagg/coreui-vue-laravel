<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col">

            </div>
        </div>
        <div class="study-footer">
            <div>
                <i class="fa fa-check-circle"></i>
                Đáp án chính xác
            </div>
            <button class="btn">
                Tiếp theo
                <i class="fa fa-arrow-right"></i>
            </button>
        </div>
    </div>
</template>
<script>
import axios from "axios"
export default {
    name: 'Unit',
    components: {},
    async mounted() {
      let unitId = this.$route.params.id
      if( !unitId) {
        alert('Không tìm thấy bài học')
        return
      }
      await axios.get(window.DOMAIN_API + '/api/learn_units/' + unitId).then(
        res => {
          console.log(res)
        }
      ).catch(e => {
        console.log(e)
        alert(e.message)
      })
    },
    data() {
      return {
        unit: {}
      }
    }
}
</script>