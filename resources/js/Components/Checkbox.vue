<script setup>
import { computed } from "vue";

const model = defineModel('checked');

const props = defineProps({
    value: {
        type: String,
        default: null,
    },
});
</script>

<template>
    <input
        v-model="model"
        type="checkbox"
        :value="value"
        class="rounded border-gray-300 text-rose-600 shadow-sm focus:ring-rose-500"
    />
</template>