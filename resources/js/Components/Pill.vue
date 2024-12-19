<template>
    <Link
        :href="href"
        class="whitespace-nowrap mb-2 rounded-full border border-rose-500 px-2 py-0.5 text-slate-100 hover:bg-rose-500 hover:text-rose-50"
        :class="{ 'bg-rose-500 !text-rose-50': filled }"
    >
        <slot></slot>
    </Link>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    href: {
        required: true,
    },
    filled: {
        default: false,
    },
});
</script>