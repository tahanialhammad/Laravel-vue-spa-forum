<script setup>
defineProps({
    //   circleClass: {
    //     type: String,
    //     default: "fill-none stroke-orange-500 stroke-2",
    //   },
});
</script>

<template>
    <svg width="100" height="100" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" stop-color="#059669 " />
                <stop offset="100%" stop-color="#D64D3A" />
            </linearGradient>
        </defs>
        <circle cx="50" cy="50" r="40" fill="url(#gradient)" />
    </svg>
</template>
