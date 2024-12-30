<template>
    <div class="relative flex flex-col gap-4 items-start">
        <h3 class="text-rose-500 mb-4">Our Main Topics</h3>
        <div class="relative mb-8">
            <h1 class="relative font-black text-4xl z-10 uppercase">
                Explore Digital World Areas
            </h1>
            <GradientCircle class="absolute -top-8 -left-10 z-0" />
        </div>


        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 w-full">
            <div v-for="(item, index) in topics" :key="index"
                class="relative group bg-slate-900 py-10 px-20 h-40 rounded-3xl flex items-center bg-cover bg-center transition-all duration-300 ease-in-out"
                :style="{ backgroundImage: `url(${item.image})` }">
                <div
                    class="absolute inset-0 bg-gradient-to-l from-slate-800 via-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                    style="background-size: 200% 100%; background-position: right center;"
                    >
                </div>

                <div
                    class="absolute inset-0 bg-slate-900 rounded-3xl group-hover:bg-transparent transition-all duration-300 ease-in-out">
                </div>
                <h3 class="relative font-black text-3xl z-10">
                    {{ item.name }}
                </h3>
            </div>
        </div>

    </div>

</template>

<script setup>
import GradientCircle from '@/Components/Svg/GradientCircle.vue';

const props = defineProps(["topics"]);

</script>