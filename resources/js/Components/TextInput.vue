<script setup>
import { onMounted, ref } from "vue";

const model = defineModel();

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute("autofocus")) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        ref="input"
        class="rounded-md text-black border-gray-300 shadow-sm focus:border-slate-500 focus:ring-slate-500"
        v-model="model"
    />
</template>