<script setup>
defineProps({
  circleClass: {
    type: String,
    default: "fill-none stroke-rose-500 stroke-2",
  },
});
</script>

<template>
  <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg">
    <circle cx="25" cy="25" r="5" :class="circleClass" />
  </svg>
</template>
