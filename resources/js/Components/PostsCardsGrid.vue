<template>
  <div class="mx-auto max-w-7xl px-6 lg:px-8 py-6 my-6">

    <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-2">
      <article v-for="post in posts" :key="post.id"
        class="flex max-w-xl flex-col items-start justify-between border-2 p-4 rounded-lg bg-white text-black">


        <div class="flex justify-between text-xs w-full">
          <div class="flex items-center gap-x-4">
            <time :datetime="formattedDate(post)" class="text-gray-500">{{ formattedDate(post) }}</time>
            <Pill :href="route('posts.index', { topic: post.topic.slug })">
              {{ post.topic.name }}
            </Pill>
          </div>

          <div class="text-rose
          
          -500 font-bold">{{ post.likes_count }}
            <HeartIcon class="size-4 inline-block" />
          </div>

        </div>

        <Link :href="post.routes.show" class="group block px-2 py-4">
        <span class="text-lg font-bold group-hover:text-rose-500">{{ post.title }}</span>
        <span class="block pt-1 text-sm text-gray-600 first-letter:uppercase">{{ formattedDate(post) }} by
          {{ post.user.name }}</span>
        </Link>
        <div>
          <p v-html="post.html" class="max-w-lg max-h-24 text-ellipsis overflow-hidden"></p>
        </div>
        <div class="relative mt-8 flex items-center gap-x-4">
          <img :src="post.user.profile_photo_url" :alt="post.user.nam" class="h-10 w-10 rounded-full bg-gray-50" />
          <div class="text-sm leading-6">
            <p class="font-semibold text-gray-900">
              {{ post.user.name }}
            </p>
            <p class="text-gray-600">
              {{ post.user.is_admin ? "Admin" : "User" }} role
            </p>
          </div>
        <!-- Post Image need style  -->
  <div class="">
    <img :src="post.image" class="object-cover w-full h-full" />

    <div class="text-red-300"> hhhhh {{ post.image }}</div>
  
  </div>
        </div>

        
      </article>
    </div>

  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import Pill from "@/Components/Pill.vue";
import { HeartIcon } from "@heroicons/vue/20/solid/index.js";

defineProps(["posts", "formattedDate"]);
</script>