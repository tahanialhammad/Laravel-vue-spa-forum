<template>
    <div class="flex">
        <div class="flex-1">
            <div class="relative flex flex-col gap-8 items-start">
                <h3 class="text-rose-500 my-8">About Us</h3>
                <div class="relative mb-8">
                    <h1 class="relative font-black text-4xl z-10">
                        We Are Who Will Grow Your Business
                    </h1>
                    <GradientCircle class="absolute -top-8 -left-10 z-0" />
                    <p class="text-slate-500 my-8 pe-40">
                        About Us We Are Who Will Grow Your Business
                        Over the years, we have worked with Fortune 500s and brand-new startups. We help ambitious
                        businesses like yours generate more profits by building awareness, driving web traffic,
                        connecting with customers, and growing overall sales. Give us a call.
                    </p>
                </div>
            </div>

        </div>
        <div class="w-1/4 relative">
            <img class="absolute -top-10 -left-10 z-10" src="https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/Group-37.png" alt="">
       <img src="https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/About-image-1.png" alt="" class="absolute top-10">
        </div>
        <div class="w-1/4">
            <img src="https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/About-image-2.png"
                alt="" class="">
        </div>
    </div>

</template>

<script setup>
import GradientCircle from '@/Components/Svg/GradientCircle.vue';


</script>