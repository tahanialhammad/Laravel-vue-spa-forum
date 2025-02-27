<template>

    <div class="max-h-64 overflow-y-scroll">
        <table class="min-w-full bg-slate-900 text-slate-200 rounded-3xl">
            <thead class=" border-b">
                <tr>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                        ID
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                        Title
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                        Last update
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="post in myPosts" :key="post.id" class="border-slate-500 border-b hover:bg-slate-800">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        {{ post.id }}
                    </td>
                    <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                        {{ post.title }}
                    </td>
                    <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                        {{ post.updated_at }}
                    </td>
                    <td class="text-center">
                        <Link :href="post.routes.show">
                        <EyeIcon class="size-4 inline-block " />
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</template>
<script setup>
import { Link } from "@inertiajs/vue3";
import { HeartIcon, EyeIcon } from "@heroicons/vue/20/solid/index.js";


defineProps(["myPosts"]);

</script>