<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
    href: {
        type: String,
        default: null, // Default to null, so it can render a button if no href is provided
    },
});
</script>

<template>
    <a v-if="href" :href="href"
        class="inline-flex items-center px-4 py-2 bg-rose-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-rose-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150">
        <slot />
    </a>
    <button v-else :type="type"
        class="inline-flex items-center px-4 py-2 bg-rose-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-rose-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150">
        <slot />
    </button>
</template>
