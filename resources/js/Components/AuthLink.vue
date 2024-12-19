<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'relative z-10 font-black text-slate-100 hover:text-rose-500'
        : 'relative z-10 hover:text-rose-500';
});
</script>

<template>
    <div :class="['relative text-slate-800 min-w-24 p-4 rounded-full rounded-e-none', props.active ? 'bg-slate-950' : '']">
        <Link :href="href" :class="classes">
        <slot />
        </Link>

        <!-- Circle before -->
        <div
            :class="['absolute right-0 -top-12 w-12 h-12 bg-transparent rounded-full  shadow-[31px_35px_0_10px_rgba(2,6,23,1)] pointer-events-none', props.active ? '' : 'hidden']">
        </div>
        <!-- Circle after -->
        <div
            :class="['absolute right-0 -bottom-12 w-12 h-12 bg-transparent rounded-full shadow-[31px_-35px_0_10px_rgba(2,6,23,1)] pointer-events-none', props.active ? '' : 'hidden']">
        </div>
    </div>
</template>
