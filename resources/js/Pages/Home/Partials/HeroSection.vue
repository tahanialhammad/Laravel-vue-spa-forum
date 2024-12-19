<template>
    <div class="flex mb-10 items-center">
        <!-- Left Section -->
        <div class="w-1/2 flex flex-col gap-8 p-4 relative">
            <!-- Small Circle SVG -->
            <Circle class="absolute top-5 right-5 z-0" />

            <!-- Gradient Circle SVG -->

            <GradientCircle class="absolute -top-8 -left-2 z-0" />

            <!-- Text Content -->
            <h1 class="text-5xl font-black w-2/3 z-10">Award Winning Digital Design Agency</h1>
            <h3 class="text-lg text-gray-300">
                An award-winning digital design agency specializing in creative solutions, innovative branding, and
                cutting-edge web design to elevate your business.
                <!-- Small Circle SVG -->
                <Circle class="absolute right-1/2 z-0" circleClass="fill-rose-500" />

            </h3>

            <Link
                class="w-40 px-4 py-2 text-white font-bold text-center rounded-full bg-gradient-to-r from-emerald-500 to-rose-500 hover:bg-gradient-to-r hover:from-rose-500 hover:to-emerald-500 transition duration-300"
                :href="route('services.index')">
            Contact us
            </Link>
        </div>

        <!-- Right Section with Image -->
        <div class="relative">

            <Square class="absolute top-5 right-5 z-0" />

            <img src="https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/Hero-Image.png"
                alt="Hero Image">
            <img class="absolute top-8 left-0"
                src="https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/Abstract-Shape-2.png"
                alt="Abstract Shape">
        </div>
    </div>
</template>

<script setup>
import Circle from '@/Components/Svg/Circle.vue';
import GradientCircle from '@/Components/Svg/GradientCircle.vue';
import Square from '@/Components/Svg/Square.vue';
import { Link } from '@inertiajs/vue3';
</script>