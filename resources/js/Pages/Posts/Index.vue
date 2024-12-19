<template>
    <AppLayout>
        <Container>
            <div>
                <div class="flex justify-center items-center mb-8">
                    <div
                        class="w-1/2 bg-gradient-to-r from-emerald-500 to-rose-500 rounded-3xl flex flex-col gap-4 p-10 items-start -me-11 z-10">
                        <h1 class="font-black text-4xl">
                            Crisis is making online education economy go mainstream
                        </h1>
                        <p>September 12, 2021</p>
                        <p class="text-black"> BY Roy Hipper</p>
                    </div>
                    <img class="w-1/2 rounded-3xl"
                        src="https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/Featured-Image-1970x1044.jpg"
                        alt="">
                </div>
                <div class="flex justify-between items-center">
                    <PageHeading v-text="selectedTopic ? selectedTopic.name : 'All Posts'" />
                    <SearchForm :query="query" />
                </div>


                <p v-if="selectedTopic" class="mt-1 text-sm text-gray-600">
                    {{ selectedTopic.description }}
                </p>

                <menu class="flex space-x-4 my-8 overflow-x-auto py-1">
                    <li>
                        <!-- to seve search by topic -->
                        <Pill :href="route('posts.index', { query: searchForm.query })" :filled="!selectedTopic">All
                            Posts
                        </Pill>
                    </li>
                    <li v-for="topic in topics" :key="topic.id">
                        <!-- to seve search by topic -->
                        <Pill :href="route('posts.index', { topic: topic.slug, query: searchForm.query })"
                            :filled="topic.id === selectedTopic?.id">
                            {{ topic.name }}
                        </Pill>
                    </li>
                </menu>

            </div>

            <!-- <Card cardType="vertical">
                <template #cardHeader>
                    <h6
                    class="block mb-4 font-sans text-base antialiased font-semibold leading-relaxed tracking-normal text-gray-700 uppercase">
                    startups
                </h6>
                <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                    Lyft launching cross-platform service this week
                </h4>
                </template>
<template #cardBody>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni illo omnis laboriosam nobis culpa mollitia voluptatibus veniam eos tenetur ut adipisci magnam, id dolorum pariatur repudiandae, sint ullam. Quod, distinctio.</p>
                </template>
<template #cardFooter>
                    <a href="#" class="inline-block">
                    <button
                        class="flex items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none hover:bg-gray-900/10 active:bg-gray-900/20"
                        type="button">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"></path>
                        </svg>
                    </button>
                </a>
                    </template>
</Card> -->


            <!-- <PostsCardsGrid :posts="posts.data" :formattedDate="formattedDate" /> -->
            <div class="flex">
                <div class="w-3/4">
                    <PostsList class="" :posts="posts.data" :formattedDate="formattedDate" />
                    <Pagination :meta="posts.meta" :only="['posts']" class="mt-2" />
                </div>
                <div class="w-1/4 ms-8 flex flex-col gap-5">
                    <SideBaar :recentPosts="recentPosts" />
                </div>
            </div>

        </Container>
    </AppLayout>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/Container.vue";
import Pagination from "@/Components/Pagination.vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";
import { relativeDate } from "@/Utilities/date.js";
import PageHeading from "@/Components/PageHeading.vue";
import Pill from "@/Components/Pill.vue";
import SearchForm from "./Partials/SearchForm.vue";
import PostsList from "./Partials/PostsList.vue";
import SideBaar from "./Partials/SideBaar.vue";

//from controller, to detect what is in query
const props = defineProps(["posts", "topics", "selectedTopic", "query", "recentPosts"]);

const formattedDate = (post) => relativeDate(post.created_at);

//to search within all posts or within topic
const searchForm = useForm({
    query: props.query,
    page: 1, //reset pagination when new search to search from page 1
});

const page = usePage(); //to get curent url index or topic
</script>