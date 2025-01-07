<template>
    <AppLayout title="Dashboard">
        <template #header>
                <h2 class="font-semibold text-xl text-slate-00 leading-tight">
                    Admin Dashboard
                </h2>
            </template>
            
        <Container>     
            <div class="md:flex">
                <div class="md:w-2/3 flex flex-col gap-8">
                    <div>
                        <UserTable :users="users.data" />
                        <!-- Pagination Controls -->
                        <Pagination :meta="users.meta" class="mt-2" />
                    </div>
                    <div>
                        <MyPostsList :myPosts="myPosts" />
                    </div>
                </div>
                <div class="mt-8 md:mt-2 md:w-1/3 ps-12">
                    <TopicsList :topics="topics" />
                    <Marketing :marketings="marketings"/>
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
import Marketing from './Partials/Marketing.vue';

const props = defineProps(["users", "topics", "myPosts", "marketings"]);

</script>
