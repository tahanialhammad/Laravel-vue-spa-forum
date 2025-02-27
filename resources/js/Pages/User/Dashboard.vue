<template>
    <AppLayout title="Dashboard">
        <!-- User Dashboard Layout  -->
        <!-- Page Header -->

        <template #header>
            <h2 class="font-semibold text-xl text-slate-00 leading-tight">
                User Dashboard
            </h2>
        </template>
        <Container>
            <!-- Section Title and "Create Post" Button -->

            <div class="relative mb-8 flex justify-between w-full">
                <h1 class="relative font-black text-4xl z-10 uppercase">
                    My Posts
                </h1>
                <GradientCircle class="absolute -top-8 -left-10 z-0" />
                <!-- Link to Create a New Post -->

                <Link :href="route('posts.create')" class="font-black text-3xl rounded-full">+</Link>
            </div>

            <!-- If User Has Posts, Display List -->
            <div v-if="myPosts && myPosts.length > 0">
                <MyPostsList :myPosts="myPosts" />
            </div>
            <!-- If No Posts Exist, Show Message -->
            <div v-else>
                Add your first post
            </div>
        </Container>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Container from '@/Components/Container.vue';
import MyPostsList from './Partials/MyPostsList.vue';
import GradientCircle from "@/Components/Svg/GradientCircle.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    myPosts: {
        type: Array,
        default: () => [],
    }
});
</script>
