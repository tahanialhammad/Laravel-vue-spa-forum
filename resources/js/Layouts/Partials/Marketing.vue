<template>
    <div v-for="marketing in latestMarketing" :key="marketing.id" class="w-full h-screen bg-cover bg-center relative"
        :style="{ backgroundImage: `url(${marketing.image ? marketing.image : 'https://img.freepik.com/free-photo/3d-rendering-modern-luxury-hotel-office-reception-lounge-hall_105762-1977.jpg'})` }"
>
        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-rose-200 via-transparent to-slate-950 opacity-50"></div>

        <!-- Menu -->
        <div class="absolute top-1/2 right-0 transform -translate-y-1/2 flex flex-col gap-4 items-end">
            <template v-for="item in menu" :key="item.name">
                <AuthLink v-if="item.when ? item.when() : true" :href="item.url" :active="route().current(item.route)">
                    {{ item.name }}
                </AuthLink>
            </template>
        </div>

    </div>
</template>

<script setup>

import AuthLink from "@/Components/AuthLink.vue";
defineProps(['latestMarketing']);

const menu = [
    {
        name: "Login",
        url: route('login'),
        route: 'login',
    },
    {
        name: "Register",
        url: route('register'),
        route: 'register',
    },
]
</script>