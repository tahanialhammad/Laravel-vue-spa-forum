<template>
    <AppLayout>
        <Container>
            <div>
                <!-- Header Section -->
                <div class="flex flex-col lg:flex-row justify-center items-center mb-8 gap-6">
                    <div
                        class="w-full lg:w-1/2 bg-gradient-to-r from-emerald-500 to-rose-500 rounded-3xl flex flex-col gap-4 p-6 lg:p-10 items-start  lg:-me-11 z-10">
                        <h1 class="font-black text-2xl lg:text-4xl">
                            Your Hub for Freelancing, Design, and Development Discussions
                        </h1>
                        <p class="text-sm lg:text-base">12, September 2024</p>
                        <p class="text-black text-sm lg:text-base">BY Roy Hipper</p>
                    </div>
                    <img class="w-full lg:w-1/2 rounded-3xl h-60 lg:h-80 object-cover"
                        src="assests/images/anime-dragon.jpg" alt="Anime Dragon" />
                </div>

                <!-- Heading and Search -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <PageHeading v-text="selectedTopic ? selectedTopic.name : 'All Posts'" />
                    <SearchForm :query="query" />
                </div>

                <!-- Selected Topic Description -->
                <p v-if="selectedTopic" class="mt-2 text-sm text-gray-600">
                    {{ selectedTopic.description }}
                </p>

                <!-- Topics Menu -->
                <menu class="flex space-x-4 my-8 overflow-x-auto py-1">
                    <li>
                        <Pill :href="route('posts.index', { query: searchForm.query })" :filled="!selectedTopic">
                            All Posts
                        </Pill>
                    </li>
                    <li v-for="topic in topics" :key="topic.id">
                        <Pill :href="route('posts.index', { topic: topic.slug, query: searchForm.query })"
                            :filled="topic.id === selectedTopic?.id">
                            {{ topic.name }}
                        </Pill>
                    </li>
                </menu>
            </div>

            <!-- Main Content -->
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Posts List -->
                <div class="w-full lg:w-3/4">
                    <PostsList :posts="posts.data" :formattedDate="formattedDate" />
                    <Pagination :meta="posts.meta" :only="['posts']" class="mt-4" />
                </div>

                <!-- Sidebar -->
                <div class="w-full lg:w-1/4 flex flex-col gap-5">
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

const props = defineProps(["posts", "topics", "selectedTopic", "query", "recentPosts"]);
const formattedDate = (post) => relativeDate(post.created_at);
const searchForm = useForm({
    query: props.query,
    page: 1,
});
const page = usePage();
</script>
