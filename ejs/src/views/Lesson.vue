<template>
    <div class="detail-lesson">
        <div class="detail-lesson-header">
            <div class="lesson-title">
                <div class="lesson-title-native">
                    Bài 1: はじめまして
                </div>
                <div class="lesson-title-trans">
                    Làm quen lần đầu gặp gỡ
                </div>
            </div>
            <div class="lesson-result">
                {{ 30 }}%
            </div>
        </div>
        <div class="row">
            <div class="col-md-3" v-for="unitType in learnUnitTypes" :key="unitType.type">
                <div class="unit-type-header">
                    <img :src="unitType.imgUrl" alt="unitType">
                    {{ unitType.name }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Lesson',
        components: {},
        data() {
            return {
                learnUnitTypes: [
                    {
                        type: 'new-work',
                        imgUrl: '/img/new-word.png',
                        name: 'Học từ mới'
                    },
                    {
                        type: 'grammar',
                        imgUrl: '/img/grammar.png',
                        name: 'Ngữ pháp'
                    },
                    {
                        type: 'conversation',
                        imgUrl: '/img/conversation.png',
                        name: 'Hội thoại'
                    },
                    {
                        type: 'practice',
                        imgUrl: '/img/practice.png',
                        name: 'Làm bài tập'
                    }
                ],
                learnUnits: [
                    {
                        learn_unit_type: 'new-word',
                        name: 'Học từ mới',
                        result: 3,
                        items: [
                            {}
                        ]
                    }
                ]
            }
        }
    }
</script>