<template>
    <div class="flex mb-10 items-center">
        <!-- Left Section -->
        <div class="w-1/2 flex flex-col gap-8 p-4 relative">
            <!-- Small Circle SVG -->
            <Circle class="absolute top-5 right-5 z-0" />

            <!-- Gradient Circle SVG -->

            <GradientCircle class="absolute -top-8 -left-2 z-0" />

            <!-- Text Content -->
            <h1 class="text-5xl font-black w-2/3 z-10">Your Freelancing Community Hub!</h1>
            <h3 class="text-lg text-gray-300">
                Are you a freelancer looking for guidance, support, and a place to share your journey? Whether you’re just starting or an experienced pro, our forum is the perfect space for you to connect, learn, and grow your freelancing career.
                <!-- Small Circle SVG -->
                <Circle class="absolute right-1/2 z-0" circleClass="fill-rose-500" />
            </h3>

            <GradientLink  :href="route('contact')">Contact us</GradientLink>
        </div>

        <!-- Right Section with Image -->
        <div class="relative w-1/2">

            <Square class="absolute top-5 right-5 z-0" />

            <img src="assets/images/hero-image1.png"
                alt="Hero Image">
            <img class="absolute top-8 left-0 w-1/2"
                src="assets/images/3dimage.png"
                alt="3d Shape">
        </div>
    </div>
</template>

<script setup>
import Circle from '@/Components/Svg/Circle.vue';
import GradientCircle from '@/Components/Svg/GradientCircle.vue';
import Square from '@/Components/Svg/Square.vue';
import { Link } from '@inertiajs/vue3';
import GradientLink from '@/Components/GradientLink.vue';

</script>