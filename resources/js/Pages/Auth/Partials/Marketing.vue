<template>
    <div class="flex flex-col gap-4">
        <template v-for="item in menu" :key="item.name">
            <AuthLink v-if="item.when ? item.when() : true" :href="item.url" :active="route().current(item.route)">
                {{ item.name }}
            </AuthLink>
        </template>

    </div>
</template>

<script setup>

import AuthLink from "@/Components/AuthLink.vue";

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