<script setup>
import { onMounted } from 'vue'
const props = defineProps({
  orders: Object
})

onMounted(() => {
  console.log(props.orders.data);
})

</script>

<template>


</template>
