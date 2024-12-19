<template>
  <swiper-container :slides-per-view="3" :space-between="30" autoplay="true" loop="true" 
     class="my-swiper" :breakpoints="{
      640: { slidesPerView: 1, spaceBetween: 10 },
      768: { slidesPerView: 2, spaceBetween: 20 },
      1024: { slidesPerView: 3, spaceBetween: 30 }
    }">
 <swiper-slide
  v-for="(item, index) in slideItems"
  :key="index"
  :style="{ backgroundImage: `url(${item.bgImage})` }"
  class="relative group bg-cover bg-center flex justify-start items-end h-60 rounded-3xl"
>
  <!-- Hidden background that appears on hover -->
  <div class="absolute inset-0 bg-gradient-to-t from-rose-600 via-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

  <!-- Slide content -->
  <h3 class="font-bold text-xl m-4 relative z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">{{ item.name }}</h3>
</swiper-slide>

  </swiper-container>
</template>

<script setup>

const slideItems = [
  {
    name: "Avignon Quartet",
    bgImage:
      "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/06/Post-Image-714x714.jpg",
  },
  {
    name: "Developing Your website",
    bgImage:
      "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/bda3b088052063.5dcac9a768acd.png",
  },
  {
    name: "Advertisement Projects One",
    bgImage:
      "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/09/1.jpg",
  },
  {
    name: "Fashion Photoshoot",
    bgImage:
      "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/dd885b68787147.5b698dd50ad6b.jpg",
  },
  {
    name: "Basket of Flower on table",
    bgImage:
      "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/efc04552544229.5914324967a5e.jpg",
  },
  {
    name: "Developing Your Critical Thinking Skills",
    bgImage:
      "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/26998059405697.5a20a1c574260.jpg",
  },
];
</script>

<style scoped>
.my-swiper {
  width: 100%;
  height: 100%;
}
</style>