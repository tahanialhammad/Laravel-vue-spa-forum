<script setup>
import { Link } from "@inertiajs/vue3";

</script>

<template>
    <Link
        class="rounded-full px-6 py-2 text-white/70 ring-1 ring-rose-500 transition hover:text-white hover:bg-rose-700 focus:outline-none focus-visible:ring-[#FF2D20] dark:hover:text-white/80 dark:focus-visible:ring-white">
    <slot />
    </Link>
</template>
