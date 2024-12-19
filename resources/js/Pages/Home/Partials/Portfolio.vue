<script setup lang="ts">
import Circle from '@/Components/Svg/Circle.vue';
import GradientCircle from '@/Components/Svg/GradientCircle.vue';
import Square from '@/Components/Svg/Square.vue';
import PortfolioSlider from './PortfolioSlider.vue';
</script>

<template>
    <div class="relative bg-slate-900 rounded-3xl p-4 m-8 flex flex-col gap-4 items-center">
        <h3 class="text-rose-500">Portfolio</h3>
        <div class="relative">
            <h1 class="relative font-black text-4xl z-10">
                Our Recent Works
            </h1>
            <GradientCircle class="absolute -top-8 -left-10 z-0" />
        </div>

        <Square class="absolute top-20 left-40 z-0" />
        <Circle class="absolute top-40 left-10 z-0" />

        <div class="flex w-full items-center">
            <div class="w-1/3">
                <img src="https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/Girl-Sitting.png"
                    alt="">
            </div>

            <div class="w-2/3 flex flex-row gap-2">
                <PortfolioSlider class="-right-40" />
            </div>

        </div>
    </div>
</template>