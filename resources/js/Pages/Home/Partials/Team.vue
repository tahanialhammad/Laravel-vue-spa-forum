<template>
    <div class="my-40">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 w-full">
            <div class="relative flex flex-col gap-4 items-start">
                <Square class="absolute -top-5 left-5 z-0" />
                <h3 class="text-rose-500 my-8">Our Contributors</h3>
                <div class="relative mb-8">
                    <h1 class="relative font-black text-4xl z-10">
                        Meet Our Top Contributors
                    </h1>
                    <GradientCircle class="absolute -top-8 -left-10 z-0" />
                    <p class="text-slate-500 my-8">
                        Discover insights and expertise from our top contributors, shaping the future of freelancing, design, and development.
                    </p>
                </div>
            </div>
            <div
                v-for="(item, index) in teams"
                :key="index"
                class="relative group bg-slate-900 py-10 px-20 h-80 rounded-3xl flex items-end bg-cover bg-top transition-all duration-300 ease-in-out"
                :style="{ backgroundImage: `url(${item.bgImage})` }"
            >
                <div
                    class="absolute inset-0 bg-gradient-to-t from-slate-800 via-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                    style="background-size: 200% 100%; background-position: right center;"
                ></div>
                <div class="z-10">
                    <h3 class="font-black text-xl">{{ item.name }}</h3>
                    <p>{{ item.job }}</p>
                    <div class="flex flex-row gap-2 mt-2">
                        <a :href="item.facebookUrl" class="hover:text-rose-500">
                            <!-- Facebook Icon -->
                        </a>
                        <a :href="item.linkedInUrl" class="hover:text-rose-500">
                            <!-- LinkedIn Icon -->
                        </a>
                        <a :href="item.instagramUrl" class="hover:text-rose-500">
                            <!-- Instagram Icon -->
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center">
                <Link
                    class="w-40 px-4 py-2 text-rose-500 font-bold text-center rounded-full border-2 hover:text-white border-rose-500 hover:bg-gradient-to-r hover:from-rose-500 hover:to-emerald-500 transition duration-300"
                    :href="route('welcome')"
                >
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
        job: "Software Developer",
        bgImage: "/assets/images/team1.jpg",
        facebookUrl: "#",
        linkedInUrl: "#",
        instagramUrl: "#"
    },
    {
        name: "Ethan Carter",
        job: "UI/UX Designer",
        bgImage: "/assets/images/team2.jpg",
        facebookUrl: "#",
        linkedInUrl: "#",
        instagramUrl: "#"
    },
    {
        name: "Emily Harper",
        job: "Digital Marketer",
        bgImage: "/assets/images/team3.jpg",
        facebookUrl: "#",
        linkedInUrl: "#",
        instagramUrl: "#"
    },
    {
        name: "Logan Brooks",
        job: "Photographer",
        bgImage: "/assets/images/team4.jpg",
        facebookUrl: "#",
        linkedInUrl: "#",
        instagramUrl: "#"
    },
];
</script>
