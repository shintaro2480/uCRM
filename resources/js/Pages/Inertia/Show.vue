<script setup>
import { Link } from '@inertiajs/inertia-vue3'; // 古い
import { Inertia } from '@inertiajs/inertia';

defineProps({
    id: String,
    blog: Object
    })

const deleteConfirm = id => {
    console.log(id);
    Inertia.delete(`/inertia/${id}`, {
        onBefore: () => confirm('本当に削除しますか？')
    })
}

</script>

<template>
    <p>以下に、definePropsで呼び込んだルートパラメーター表示されます。変数の渡し方
        テスト
    </p>
    <p>{{ id }}</p>
    <p>{{ blog.title }}</p>
    <p>{{ blog.content }}</p>
    <button class="bg-gray-200" @click="deleteConfirm(blog.id)">この投稿を削除</button>
</template>