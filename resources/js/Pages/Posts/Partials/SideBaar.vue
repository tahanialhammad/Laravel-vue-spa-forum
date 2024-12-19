<template>
  <img class="rounded-3xl"
    src="https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/336-x-280-ad.jpg" alt="">
  <h1 class="font-black text-4xl">Recent Posts</h1>

  <Card v-for="recentPost in recentPosts" :key="recentPost.id"
    :imageUrl="recentPost.image ? `/${recentPost.image}` : 'https://via.placeholder.com/300x200'" 

    :altText="recentPost.title"
    cardType="vertical">
    <template #cardHeader>
      <Link :href="recentPost.routes.show" class="group block px-2 py-4">
      <span class="text-lg font-bold group-hover:text-rose-400">
        {{ recentPost.title }}
      </span>
      </Link>
    </template>

    <template #cardFooter>
      <div class="text-slate-500">
        {{ recentPost.created_at }}
      </div>

    </template>
  </Card>

</template>
<script setup>
import Card from '@/Components/Card.vue';
import { Link } from '@inertiajs/vue3';
defineProps(["recentPosts"]);


</script>