<!-- 通常の投稿フォームのためのvue -->
<script setup>
//今回必要なのは以下2つのimport
import { reactive } from 'vue' 
import { Inertia } from '@inertiajs/inertia'

defineProps({
    errors: Object
})


//titleとcontentという変数をリアクティブにしておく
const form = reactive({
    title: null,
    content: null
});

const submitFunction = ()=> {
    Inertia.post('/inertia', form)
 };

</script>

<template>
    <form @submit.prevent="submitFunction">
        <input type="text" name="title" v-model="form.title">
        <!-- エラー。v-ifによって、errors.titleが真なら、送信時にdivが表示され、その中にエラーメッセージが出力される -->
         <div v-if="errors.title">{{ errors.title }}</div>
        <br>
        <input type="text" name="content" v-model="form.content">
                <!-- エラー。v-ifによって、errors.titleが真なら、送信時にdivが表示され、その中にエラーメッセージが出力される -->
                <div v-if="errors.content">{{ errors.content }}</div>
        <br>
        <button>送信</button>
    </form>
</template>