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
                        <TopicsList :topics="topics"/>
                    </div>
                </div>
                <div class="w-1/3">
                    new topic
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

const props = defineProps(["users", "topics"]);

</script>
