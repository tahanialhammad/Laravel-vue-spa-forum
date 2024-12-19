<template>
    <div class="py-5">
      <div>
        <div
          @click="toggle"
          class="flex justify-between items-center font-medium cursor-pointer list-none"
        >
          <span>
            <slot name="accordionHeader" />
          </span>
          <span class="transition" :class="{ 'rotate-180': isOpen }">
            <svg
              fill="none"
              height="24"
              shape-rendering="geometricPrecision"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="1.5"
              viewBox="0 0 24 24"
              width="24"
            >
              <path d="M6 9l6 6 6-6"></path>
            </svg>
          </span>
        </div>
        <div
          v-show="isOpen"
          class="text-neutral-600 mt-3 transition-all duration-300 ease-in-out"
        >
          <slot name="accordionBody" />
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  const props = defineProps({
    isOpen: Boolean,
    toggle: Function,
  });
  </script>
  
  <style scoped>
  .rotate-180 {
    transform: rotate(180deg);
  }
  </style>
  