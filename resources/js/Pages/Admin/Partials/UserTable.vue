<template>
        <div class="relative mb-8">
            <h1 class="relative font-black text-4xl z-10 uppercase">
                All Users
            </h1>
            <GradientCircle class="absolute -top-8 -left-10 z-0" />
        </div>

    <div class="h-64 overflow-y-scroll">
        <table class="min-w-full bg-slate-900 text-slate-200 rounded-3xl">
            <thead class=" border-b">
                <tr>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                        ID
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                        Name
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                        Email
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                        Posts
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user.id" class="border-slate-500 border-b hover:bg-slate-800">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        {{ user.id }}
                    </td>
                    <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                        {{ user.name }}
                    </td>
                    <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                        {{ user.email }}
                    </td>
                    <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                        12
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</template>
<script setup>
import GradientCircle from '@/Components/Svg/GradientCircle.vue';

defineProps(["users"]);

</script>