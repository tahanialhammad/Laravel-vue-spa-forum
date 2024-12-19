<template>
    <Hero :features="features">
                <template #heroTitle>
                    "Beheer, plan, klaar..."
                                </template>
                <template #heroTitle2>
                    Welkom bij Evenatora – Jouw hub voor evenementen!
                </template>
                <template #heroDescription>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit
                    eaque, iste dolor cupiditate blanditiis ratione.
                </template>
                <template #heroImage>
                    <img src="assests/hero.jpg"
                        alt="Product screenshot"
                        class="w-[48rem] max-w-none rounded-xl shadow-xl ring-1 ring-gray-100/10 sm:w-[57rem] md:-ml-4 lg:-ml-0"
                        width="2432" height="1442" />
                </template>
            </Hero>
</template>

<script setup>
import Hero from '@/Components/Hero.vue';

</script>