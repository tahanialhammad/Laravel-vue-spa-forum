<template>
  <swiper-container
    slides-per-view="1"
    autoplay="true"
    loop="true"
    navigation="true"
    pagination="true"
    scrollbar="true"
    class="my-swiper"
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
