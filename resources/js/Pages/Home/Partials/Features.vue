<template>
    <div class="relative m-8 flex flex-col gap-4 items-center">
        <h3 class="text-rose-500">In our Forum</h3>
        <div class="relative">
            <h1 class="relative font-black text-4xl z-10">
                What We Offer
            </h1>
            <GradientCircle class="absolute -top-8 -left-10 z-0" />
        </div>
        <img class="absolute top-20 -left-24 z-0"
            src="https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/09/3D_Shape-1.svg" alt="">


        <div class="bg-slate-900 rounded-3xl p-0 my-20 flex w-full items-stretch">
            <div class="w-1/3 py-20 px-28 hover:bg-slate-950 rounded-s-3xl">
                <img src="https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/Chess-Icon.svg"
                    alt="">
                <h3 class="text-3xl font-black text-cyan-300 my-8">Expert <br /> Advice</h3>
                <p class="text-slate-500">
                    Learn from seasoned freelancers who have been there and done that.
                </p>
            </div>
            <div class="w-1/3 py-20 px-28 m-0 hover:bg-slate-950 ">
                <img src="https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/megaphone.svg"
                    alt="">
                <h3 class="text-3xl font-black text-rose-500 my-8">Networking <br /> Opportunities</h3>
                <p class="text-slate-500">
                    Connect with like-minded freelancers and potential collaborators. </p>
            </div>
            <div class="w-1/3 py-20 px-28 m-0 hover:bg-slate-950 rounded-e-3xl">
                <img src="https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/vector.svg" alt="">
                <h3 class="text-3xl font-black text-fuchsia-400 my-8">Tools & <br /> Resources</h3>
                <p class="text-slate-500">
                    Discover tools, platforms, and strategies to enhance your workflow.
                </p>
            </div>
        </div>
    </div>
</template>

<script setup>
import GradientCircle from '@/Components/Svg/GradientCircle.vue';
</script>