<template>
  <div class="py-5">
    <div>
      <div @click="toggle" class="flex justify-between items-center font-medium cursor-pointer list-none">
        <span>
          <slot name="accordionHeader" />
        </span>
        <span class="transition" :class="{ 'rotate-180': isOpen }">
          <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round"
            stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24">
            <path d="M6 9l6 6 6-6"></path>
          </svg>
        </span>
      </div>
      <!-- <div
        v-show="isOpen"
        class="text-neutral-300 mt-3 transition-all duration-300 ease-in-out"
      >
        <slot name="accordionBody" />
      </div> -->


      <transition enter-active-class="transform transition ease-out duration-500"
        enter-from-class="translate-y-4 opacity-0" enter-to-class="translate-y-0 opacity-100"
        leave-active-class="transform transition ease-in duration-500" leave-from-class="translate-y-0 opacity-100"
        leave-to-class="translate-y-4 opacity-0">
        <div v-show="isOpen" class="text-neutral-300 mt-3 transition-all duration-300 ease-in-out">
          <slot name="accordionBody" />
        </div>
      </transition>


    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps();
const isOpen = ref(false);

const toggle = () => {
  isOpen.value = !isOpen.value;
};
</script>

<style scoped>
.rotate-180 {
  transform: rotate(180deg);
}
</style>
