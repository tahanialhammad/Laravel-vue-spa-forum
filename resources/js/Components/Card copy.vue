<template>

  <section class="flex max-w-xl flex-col items-start justify-between border-2 p-4 rounded-lg bg-white text-slate-700 hover:border-rose-600">
    <div class="flex justify-between font-bold w-full">
      <slot name="cardHeader" />
    </div>

    <div class="w-full ">
      <slot name="cardBody" />
    </div>

    <div class="flex justify-between w-full text-sm">
      <slot name="cardFooter" />
    </div>


  </section>

</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import Pill from "@/Components/Pill.vue";
import { HeartIcon } from "@heroicons/vue/20/solid/index.js";


</script>