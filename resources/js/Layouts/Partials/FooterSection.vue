<template>
    <footer class="bg-slate-900 py-10 px-6 text-slate-200">
        <div class="container mx-auto flex flex-wrap gap-4 justify-between">
            <!-- About Company -->
            <div class="flex-1">
                <div class="flex flex-col gap-4 items-start">
                    <Link :href="route('welcome')">
                    <ApplicationLogo class="block h-9 w-auto" />
                    </Link>
                    <p class="text-sm leading-relaxed">
                        We are a community of freelancers, developers, and digital strategists sharing knowledge and
                        support to help you grow and succeed in the digital world
                    </p>
                    <GradientLink :href="route('contact')">Contact us</GradientLink>
                </div>

            </div>

            <!-- Company Links -->
            <div class="w-1/5">
                <h2 class="text-xl font-bold text-rose-500 mb-4">Company Links</h2>
                <ul class="list-disc pl-5 space-y-2 marker:text-rose-500">
                    <template v-for="item in footerMenu1" :key="item.name">
                        <li>
                            <Link :href="item.url" :active="route().current(item.route)" class="hover:text-rose-400">
                            {{ item.name }}
                            </Link>
                        </li>
                    </template>
                </ul>
            </div>

            <!-- Topic Links -->
            <div class="w-1/5">
                <h2 class="text-xl font-bold text-rose-500 mb-4">Popular Topics</h2>
                <ul class="list-disc pl-5 space-y-2 marker:text-rose-500">
                    <li><a href="#" class="hover:text-rose-400">Web Development</a></li>
                    <li><a href="#" class="hover:text-rose-400">UI/UX Design</a></li>
                    <li><a href="#" class="hover:text-rose-400">SEO Optimization</a></li>
                    <li><a href="#" class="hover:text-rose-400">Consulting</a></li>
                </ul>
            </div>

            <!-- Latest Articles -->
            <div class="w-1/5">
                <h2 class="text-xl font-bold text-rose-500 mb-4">More information</h2>
                <ul class="list-disc pl-5 space-y-2 marker:text-rose-500">
                    <li v-for="post in latestPosts" :key="post.id">
                        <Link :href="`/posts/${post.id}/${post.title}`" class="flex items-center hover:text-rose-400">
                        {{ post.title }}
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import GradientLink from '@/Components/GradientLink.vue';
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

defineProps({
    latestPosts: Array, // Ontvang de data als een prop
});

const footerMenu1 = [
    {
        name: "Home",
        url: route('welcome'),
        route: '/',
    },
    {
        name: "Posts",
        url: route('posts.index'),
        route: 'posts.index',
    },
    {
        name: "Contact",
        url: route("contact"),
        route: "contact",
    },
];
</script>