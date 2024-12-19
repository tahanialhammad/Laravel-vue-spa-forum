<template>
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div
      class="mx-auto mt-10 grid max-w-lg grid-cols-2 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-3 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-6">
      <div v-for="packageItem in packageItems" :key="packageItem.id"
        class="flex items-start bg-slate-900 rounded-md p-4 h-16 w-40">
        <img class="col-span-2 max-h-8 object-containt lg:col-span-1 me-2 "
          :src="`/assests/packages/${packageItem.code.toLowerCase()}.svg`" :alt="packageItem.code" width="50"
          height="50" />

        <Link :href="packageItem.routes.show" class="capitalize font-bold">
        {{ packageItem.code }}
        </Link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  packageItems: {
    type: Array,
    required: true
  }
});
</script>