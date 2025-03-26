<template>
    <div class="relative bg-slate-900 rounded-3xl p-4 sm:p-6 lg:p-8 m-4 sm:m-6 lg:m-8 flex flex-col gap-4 items-center">
        <h3 class="text-rose-500 text-lg sm:text-xl lg:text-2xl">Events</h3>
        <div class="relative text-center">
            <h1 class="relative font-black text-2xl sm:text-3xl lg:text-4xl z-10">
                Latest events on our forum
            </h1>
            <GradientCircle class="absolute -top-4 sm:-top-6 lg:-top-8 -left-4 sm:-left-6 lg:-left-10 z-0" />
        </div>

        <Square class="absolute top-10 sm:top-16 lg:top-20 left-20 sm:left-30 lg:left-40 z-0" />
        <Circle class="absolute top-20 sm:top-30 lg:top-40 left-4 sm:left-8 lg:left-10 z-0" />

        <div class="flex flex-col lg:flex-row w-full items-center gap-4 lg:gap-0">
            <div class="w-full lg:w-1/3">
                <img class="scale-x-[-1] w-full lg:w-auto" src="assets/images/image1.png" alt="">
            </div>

            <div class="w-full lg:w-2/3 flex flex-row gap-2">
                <PortfolioSlider :marketings="marketings" class="relative lg:-right-40" />
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import Circle from '@/Components/Svg/Circle.vue';
import GradientCircle from '@/Components/Svg/GradientCircle.vue';
import Square from '@/Components/Svg/Square.vue';
import PortfolioSlider from './PortfolioSlider.vue';
defineProps(['marketings']);
</script>
