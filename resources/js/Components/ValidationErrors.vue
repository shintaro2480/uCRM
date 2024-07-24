<!--以下は旧版から引っ張ってきたコード -->
<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';

//usePageは
//const errors = computed(() => usePage().props.value.errors);

//errorsという名前でオブジェクトを受け取る
const props = defineProps({ errors:Object});

//Object.keys()は、渡されたオブジェクトのプロパティ名（キー）を配列として返す。
//つまりerrors.valueに何かエラーが入っていたら、hasErrors(bool型変数)はtrueを返す
const hasErrors = computed(() => Object.keys(props.errors).length > 0);
</script>

<template>
    <div v-if="hasErrors">
        <div class="font-medium text-red-600">問題が発生しました。</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
        </ul>
    </div>
</template>

<!-- 以下、使用するページ側の使い方 -->
<!-- ①本コンポーネントを読み込み -->
import BreezeValidationErrors from '@/Components/ValidationErrors.vue' 
<!-- ②Controllerからerrorsを受け取る() -->
defineProps({ errors: Object }) 
<!-- ③子コンポーネントにpropsで渡してやる。以下の:はv-bindの省略形-->
<BreezeValidationErrors :errors="errors" />

