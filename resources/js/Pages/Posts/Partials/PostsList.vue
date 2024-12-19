
<template>
  <div class="w-full">
    <Card
      v-for="post in posts"
      :key="post.id"
      :imageUrl="post.image ? post.image : 'https://via.placeholder.com/300x200'"
      :altText="post.title"
     
      class="mb-4"
    >
    <!--  cardType="vertical" -->
      <!-- Card Header -->
      <template #cardHeader>
        <div class="flex justify-between text-xs w-full">
          <div class="flex items-center gap-x-4">
            <time :datetime="formattedDate(post)" class="text-rose-500">
              {{ formattedDate(post) }}
            </time>
            <Pill :href="route('posts.index', { topic: post.topic.slug })">
              {{ post.topic.name }}
            </Pill>
          </div>
          <div class="text-rose-500 font-bold">
            {{ post.likes_count }}
            <HeartIcon class="w-4 h-4 inline-block" />
          </div>
        </div>
        <Link :href="post.routes.show" class="group block px-2 py-4">
          <span class="text-lg font-bold group-hover:text-rose-400">
            {{ post.title }}
          </span>
          <span class="block pt-1 text-sm text-slate-500">
            {{ formattedDate(post) }} by {{ post.user.name }}
          </span>
        </Link>
      </template>

      <!-- Card Body -->
      <template #cardBody>
        <p v-html="post.html" class="max-w-lg max-h-24 text-ellipsis overflow-hidden"></p>
      </template>

      <!-- Card Footer -->
      <template #cardFooter>
        <div class="relative mt-8 flex items-center gap-x-4">
          <img
            :src="post.user.profile_photo_url"
            :alt="post.user.name"
            class="h-10 w-10 rounded-full bg-gray-50"
          />
          <div class="text-sm leading-6">
            <p class="font-semibold text-gray-900">
              {{ post.user.name }}
            </p>
            <p class="text-gray-600">
              {{ post.user.is_admin ? "Admin" : "User" }} role
            </p>
          </div>
        </div>
        <a href="#" class="inline-block">
          <button
            class="flex items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg hover:bg-gray-900/10 active:bg-gray-900/20"
            type="button"
          >
            Learn More
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
              class="w-4 h-4"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"
              ></path>
            </svg>
          </button>
        </a>
      </template>
    </Card>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import Pill from "@/Components/Pill.vue";
import { HeartIcon } from "@heroicons/vue/20/solid/index.js";
import Card from "@/Components/Card.vue";

defineProps(["posts", "formattedDate"]);
</script>
