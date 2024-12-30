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

            <div class="bg-slate-900 rounded-3xl p-0 my-20 md:flex w-full items-stretch">
            <!-- Card 1 -->
            <div class="w-full md:w-1/3 p-8 md:py-20 md:px-28 hover:bg-slate-950 rounded-s-3xl">
                <img
                    class="w-16 md:w-20 lg:w-24 h-auto mx-auto"
                    src="https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/Chess-Icon.svg"
                    alt=""
                />
                <h3 class="text-2xl md:text-3xl font-black text-cyan-300 my-4 md:my-8 text-center">Expert <br /> Advice</h3>
                <p class="text-slate-500 text-center">
                    Learn from seasoned freelancers who have been there and done that.
                </p>
            </div>
            <!-- Card 2 -->
            <div class="w-full md:w-1/3 p-8 md:py-20 md:px-28 hover:bg-slate-950">
                <img
                    class="w-16 md:w-20 lg:w-24 h-auto mx-auto"
                    src="https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/megaphone.svg"
                    alt=""
                />
                <h3 class="text-2xl md:text-3xl font-black text-rose-500 my-4 md:my-8 text-center">Networking <br /> Opportunities</h3>
                <p class="text-slate-500 text-center">
                    Connect with like-minded freelancers and potential collaborators.
                </p>
            </div>
            <!-- Card 3 -->
            <div class="w-full md:w-1/3 p-8 md:py-20 md:px-28 hover:bg-slate-950 rounded-e-3xl">
                <img
                    class="w-16 md:w-20 lg:w-24 h-auto mx-auto"
                    src="https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/vector.svg"
                    alt=""
                />
                <h3 class="text-2xl md:text-3xl font-black text-fuchsia-400 my-4 md:my-8 text-center">Tools & <br /> Resources</h3>
                <p class="text-slate-500 text-center">
                    Discover tools, platforms, and strategies to enhance your workflow.
                </p>
            </div>
        </div>

    </div>
</template>

<script setup>
import GradientCircle from '@/Components/Svg/GradientCircle.vue';
</script>