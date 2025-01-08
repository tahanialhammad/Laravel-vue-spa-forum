<template>
    <AppLayout>
        <Container>
            <div>
                <div class="flex justify-center items-center mb-8">
                    <div
                        class="w-1/2 bg-gradient-to-r from-emerald-500 to-rose-500 rounded-3xl flex flex-col gap-4 p-10 items-start -me-11 z-10">
                        <h1 class="font-black text-4xl">
                            Your Hub for Freelancing, Design, and Development Discussions
                        </h1>
                        <p>12, September 2024</p>
                        <p class="text-black"> BY Roy Hipper</p>
                    </div>
                    <img class="w-1/2 rounded-3xl h-80"
                        src="assests/images/anime-dragon.jpg"
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
                        <!-- to save search by topic -->
                        <Pill :href="route('posts.index', { topic: topic.slug, query: searchForm.query })"
                            :filled="topic.id === selectedTopic?.id">
                            {{ topic.name }}
                        </Pill>
                    </li>
                </menu>

            </div>
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