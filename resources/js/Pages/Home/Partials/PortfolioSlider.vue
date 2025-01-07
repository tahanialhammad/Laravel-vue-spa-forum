<template>
  <swiper-container :slides-per-view="3" :space-between="30" autoplay="true" loop="true" class="my-swiper" :breakpoints="{
    640: { slidesPerView: 1, spaceBetween: 10 },
    768: { slidesPerView: 2, spaceBetween: 20 },
    1024: { slidesPerView: 3, spaceBetween: 30 }
  }">
    <swiper-slide v-for="item in marketings" :key="item" :style="{ backgroundImage: `url(${item.image})` }"
      class="relative group bg-cover bg-center flex justify-start items-end h-60 rounded-3xl">
      <!-- Hidden background that appears on hover -->
      <div
        class="absolute inset-0 bg-gradient-to-t from-rose-600 via-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
      </div>

      <!-- Slide content -->
      <h3 class="font-bold text-xl m-4 relative z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
        {{ item.title }}</h3>
    </swiper-slide>

  </swiper-container>
</template>

<script setup>
defineProps(['marketings']);

</script>

<style scoped>
.my-swiper {
  width: 100%;
  height: 100%;
}
</style>