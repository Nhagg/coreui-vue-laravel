<template>
    <div class="home-content">
        <h2>Minano Nihongo N5</h2>
        <div class="row lesson-list">
            <div
                v-for="lessson in listLesson"
                :key="lessson"
                class="col-sm-4"
            >
                <router-link to="/" class="lesson-content">
                    <div class="lesson-card">
                        <div class="lesson-img">
                            <img src="/img/lesson/default.png" alt="lesson-img">
                        </div>
                        <div class="lesson-body">
                            <div class="lesson-title">
                                <div class="lesson-title-native">
                                    Bài 1: はじめまして
                                </div>
                                <div class="lesson-title-trans">
                                    Làm quen lần đầu gặp gỡ
                                </div>
                            </div>
                            <div class="lesson-result">
                                100%
                            </div>
                        </div>
                    </div>
                </router-link>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'Home',
    components: {},
    data() {
        return {
            listLesson: [1,2,3,4,5]
        }
    }
}
</script>