<script setup>
import { computed } from 'vue';

const props = defineProps({
  cardType: {
    type: String,
    default: 'horizontal', // Default card type
  },
  imageUrl: {
    type: String,
    default: null,
  },
  altText: {
    type: String,
    default: 'Card image', // Default alt text
  },
});

const containerClasses = computed(() => {
  return props.cardType === 'horizontal'
    ? 'flex max-w-4xl max-h-96 bg-slate-900 text-slate-100 shadow-md rounded-lg overflow-hidden'
    : 'flex flex-col max-w-sm bg-slate-900 text-slate-100 shadow-md rounded-lg overflow-hidden';
});

const imageClasses = computed(() => {
  return props.cardType === 'horizontal'
    ? 'w-2/5 relative overflow-hidden'
    : 'w-full h-48 relative overflow-hidden';
});
</script>

<template>
  <section :class="containerClasses">
    <!-- Dynamic Image Section -->
    <div v-if="imageUrl" :class="imageClasses">
      <img
        :src="imageUrl"
        :alt="altText"
        class="object-cover w-full h-full"
      />
    </div>

    <!-- Content Section -->
    <div class="p-6 flex-1">
      <div>
        <slot name="cardHeader" />
      </div>
      <div class="mt-2 text-slate-300">
        <slot name="cardBody" />
      </div>
      <div class="mt-4 text-sm text-slate-400">
        <slot name="cardFooter" />
      </div>
    </div>
  </section>
</template>
