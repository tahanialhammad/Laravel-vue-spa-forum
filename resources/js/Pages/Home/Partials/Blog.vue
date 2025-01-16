<template>
    <div class="relative flex flex-col gap-4 items-start">
        <h3 class="text-rose-500 my-8">Posts</h3>
        <div class="relative mb-8">
            <h1 class="relative font-black text-4xl z-10">
                Latest Forum Posts
            </h1>
            <GradientCircle class="absolute -top-8 -left-10 z-0" />
        </div>

        <div class="grid grid-cols-3 gap-4 w-full">


            <Card v-for="post in posts" :key="post.id"
                :imageUrl="post.image ? `/${post.image}` : 'https://via.placeholder.com/300x200'" :altText="post.title"
                cardType="vertical">
                <template #cardHeader>
                    <Link :href="post.routes.show" class="group block px-2 py-4">
                    <span class="text-lg font-bold group-hover:text-rose-400">
                        {{ post.title }}
                    </span>
                    </Link>
                </template>
            </Card>

        </div>

    </div>
</template>
<script setup>
import Card from '@/Components/Card.vue';
import GradientCircle from '@/Components/Svg/GradientCircle.vue';
import { Link } from "@inertiajs/vue3";

defineProps(["posts"]);

</script>