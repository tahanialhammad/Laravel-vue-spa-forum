<template>
    <AppLayout title="Dashboard">
        <Container>
            <template #header>
                <h2 class="font-semibold text-xl text-slate-00 leading-tight">
                    admmin Dashboard
                </h2>
            </template>
            <div class="flex">
                <div class="w-2/3 flex flex-col gap-8">
                    <div>
                        <UserTable :users="users.data" />
                        <!-- Pagination Controls -->
                        <Pagination :meta="users.meta" class="mt-2" />
                    </div>
                    <div>
                        <MyPostsList :myPosts="myPosts.data" />
                        <Pagination :meta="myPosts.meta" class="mt-2" />
                    </div>
                </div>
                <div class="w-1/3 ps-12">
                    <TopicsList :topics="topics"/>
                </div>
            </div>
        </Container>
    </AppLayout>
</template>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Container from '@/Components/Container.vue';
import UserTable from './Partials/UserTable.vue';
import Pagination from '@/Components/Pagination.vue';
import TopicsList from './Partials/TopicsList.vue';
import MyPostsList from './Partials/MyPostsList.vue';

const props = defineProps(["users", "topics", "myPosts"]);

</script>
