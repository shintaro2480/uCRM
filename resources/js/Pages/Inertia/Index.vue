<script setup>
import { Link } from '@inertiajs/inertia-vue3'; // 古い

defineProps({
    blogs: Array
})

</script>

<template>

<div v-if="$page.props.flash.message" class="bg-blue-300">
    {{ $page.props.flash.message }}
</div>

<ul class="ml-8">
    <li v-for="blog in blogs" :key="blog.id">
        <Link class="text-blue-400" :href="route('inertia.show', { id : blog.id })">
        {{ blog.title }}
    </Link>,
        本文：{{ blog.content }}
    </li>
</ul>

<br>
    <p>Inertiaテストです</p>
</template>