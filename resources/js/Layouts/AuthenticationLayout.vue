<script setup lang="ts">
import Marketing from '@/Layouts/Partials/Marketing.vue';
</script>

<template>
    <div class="flex">
        <div class="hidden md:flex w-1/2 items-center justify-end h-screen">
            <Marketing :latestMarketing="$page.props.latestMarketing" />
        </div>

        <div class="w-full md:w-1/2">

            <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-950">
                <div>
                    <slot name="logo" />
                </div>

                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <slot />
                </div>
            </div>

        </div>
    </div>

</template>
