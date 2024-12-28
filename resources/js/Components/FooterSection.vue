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
                    <Link
                        class="w-40 px-4 py-2 text-white font-bold text-center rounded-full bg-gradient-to-r from-emerald-500 to-rose-500 hover:bg-gradient-to-r hover:from-rose-500 hover:to-emerald-500 transition duration-300"
                        :href="route('welcome')">
                    Contact us
                    </Link>
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

            <!-- Services Links -->
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
                <!-- You can add article links here in the future -->
            </div>
        </div>
    </footer>

</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import ApplicationMark from './ApplicationMark.vue';
import ApplicationLogo from './ApplicationLogo.vue';

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

];
</script>