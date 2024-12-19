<template>
    <div class="my-40">
        <div class="grid grid-cols-3 gap-4 w-full">
            <div class="relative flex flex-col gap-4 items-start">
                <Square class="absolute -top-5 left-5 z-0" />
                <h3 class="text-rose-500 my-8">Our Team</h3>
                <div class="relative mb-8">
                    <h1 class="relative font-black text-4xl z-10">
                        Best Team Ever
                    </h1>
                    <GradientCircle class="absolute -top-8 -left-10 z-0" />
                    <p class="text-slate-500 my-8">
                        We have assembled a creative team of like-minded people who like to challenge themselves and get
                        better with each new case.
                    </p>
                </div>
            </div>
            <div v-for="(item, index) in teams" :key="index"
                class="relative group bg-slate-900 py-10 px-20 h-80 rounded-3xl flex items-end bg-cover bg-center transition-all duration-300 ease-in-out"
                :style="{ backgroundImage: `url(${item.bgImage})` }">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-800 via-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                    style="background-size: 200% 100%; background-position: right center;"></div>
                <div class="z-10">
                    <h3 class="font-black text-xl">
                        {{ item.name }}
                    </h3>
                    <p>
                        {{ item.job }}
                    </p>
                    <div class="flex flex-row gap-2 mt-2">
                        <a :href="item.facebookUrl" class="hover:text-rose-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                class="w-6 h-6">
                                <path
                                    d="M22.675 0H1.325C.593 0 0 .593 0 1.325v21.351C0 23.407.593 24 1.325 24H12.82v-9.294H9.692v-3.622h3.128V8.41c0-3.1 1.894-4.787 4.659-4.787 1.325 0 2.464.099 2.794.143v3.24h-1.917c-1.506 0-1.796.715-1.796 1.763v2.311h3.591l-.467 3.622h-3.124V24h6.125C23.407 24 24 23.407 24 22.676V1.325C24 .593 23.407 0 22.675 0z" />
                            </svg>


                        </a>
                        <a :href="item.linkedInUrl" class="hover:text-rose-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor"
                                class="w-6 h-6">
                                <path
                                    d="M100.28 448H7.4V148.9h92.88zm-46.44-338.6C24.33 109.4 0 85.07 0 54.84A54.68 54.68 0 0154.41 0c29.86 0 54.55 24.22 54.55 54.84 0 30.23-24.69 54.56-54.55 54.56zM447.83 448h-92.68V302.4c0-34.7-.7-79.25-48.29-79.25-48.3 0-55.7 37.7-55.7 76.65V448h-92.68V148.9h89V184h1.27c12.4-23.45 42.62-48.3 87.7-48.3 93.7 0 111 61.7 111 141.8V448z" />
                            </svg>
                        </a>
                        <a :href="item.instagramUrl" class="hover:text-rose-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                class="w-6 h-6">
                                <path
                                    d="M7.75 2A5.75 5.75 0 0 0 2 7.75v8.5A5.75 5.75 0 0 0 7.75 22h8.5A5.75 5.75 0 0 0 22 16.25v-8.5A5.75 5.75 0 0 0 16.25 2h-8.5zm.5 1.5h7.5c2.35 0 4.25 1.9 4.25 4.25v7.5c0 2.35-1.9 4.25-4.25 4.25h-7.5c-2.35 0-4.25-1.9-4.25-4.25v-7.5C4 5.4 5.9 3.5 8.25 3.5zM12 6.5a5.5 5.5 0 1 0 0 11a5.5 5.5 0 0 0 0-11zm0 1.5a4 4 0 1 1 0 8a4 4 0 0 1 0-8zm5.5-.75a.875.875 0 1 0 0 1.75a.875.875 0 0 0 0-1.75z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center">
                <Link
                    class="w-40 px-4 py-2 text-rose-500 font-bold text-center rounded-full border-2 hover:text-white border-rose-500 hover:bg-gradient-to-r hover:from-rose-500 hover:to-emerald-500 transition duration-300"
                    :href="route('services.index')">
                Contact us
                </Link>

            </div>
        </div>
    </div>
</template>


<script setup>
import GradientCircle from '@/Components/Svg/GradientCircle.vue';
import Square from '@/Components/Svg/Square.vue';
import { Link } from '@inertiajs/vue3';

const teams = [
    {
        name: "Steve Bullack",
        job: "Digiatl Marketer",
        bgImage: "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/Holder.jpg",
        facebookUrl: "#",
        linkedInUrl: "#",
        instagramUrl: "#"
    },
    {
        name: "Steve Bullack",
        job: "Digiatl Marketer",
        bgImage: "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/Holder-1.jpg",
        facebookUrl: "#",
        linkedInUrl: "#",
        instagramUrl: "#"
    },
    {
        name: "Steve Bullack",
        job: "Digiatl Marketer",
        bgImage: "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/Holder-2.jpg",
        facebookUrl: "#",
        linkedInUrl: "#",
        instagramUrl: "#"
    },
    {
        name: "Steve Bullack",
        job: "Digiatl Marketer",
        bgImage: "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/Holder-3.jpg",
        facebookUrl: "#",
        linkedInUrl: "#",
        instagramUrl: "#"
    },
];
</script>