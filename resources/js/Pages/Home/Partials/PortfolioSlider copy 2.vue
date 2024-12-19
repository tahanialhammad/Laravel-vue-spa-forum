<template>
    <swiper-container
      :slides-per-view="3"
      :space-between="30"
      autoplay="true"
      loop="true"
      navigation="true"
      pagination="true"
      scrollbar="true"
      class="my-swiper"
      :breakpoints="{
        640: { slidesPerView: 1, spaceBetween: 10 },
        768: { slidesPerView: 2, spaceBetween: 20 },
        1024: { slidesPerView: 3, spaceBetween: 30 }
      }"
    >
      <swiper-slide class="bg-green-300 flex justify-center items-center h-60">
        <p>Slide 1</p>
      </swiper-slide>
      <swiper-slide class="bg-red-700 flex justify-center items-center h-60 text-white">
        <p>Slide 2</p>
      </swiper-slide>
      <swiper-slide class="bg-black flex justify-center items-center h-60 text-white">
        <p>Slide 3</p>
      </swiper-slide>
      <swiper-slide class="bg-blue-400 flex justify-center items-center h-60 text-white">
        <p>Slide 4</p>
      </swiper-slide>
      <swiper-slide class="bg-yellow-500 flex justify-center items-center h-60 text-black">
        <p>Slide 5</p>
      </swiper-slide>
      <swiper-slide class="bg-purple-700 flex justify-center items-center h-60 text-white">
        <p>Slide 6</p>
      </swiper-slide>
    </swiper-container>
  </template>
  
  <script>
  export default {
    name: "MySwiperComponent",
  };
  </script>
  
  <style scoped>
  .my-swiper {
    width: 100%;
    height: 100%;
  }
  </style>
  