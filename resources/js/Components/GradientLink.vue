<script setup>
import { Link } from "@inertiajs/vue3";

</script>

<template>
    <Link class="w-40 px-4 py-2 text-white font-bold text-center rounded-full bg-gradient-to-r from-emerald-500 to-rose-500 hover:bg-gradient-to-r hover:from-rose-500 hover:to-emerald-500 transition duration-300">
    <slot />
    </Link>
</template>
