<template>

    <Head>
        <link rel="canonical" :href="service.routes.show" />
    </Head>

    <AppLayout :title="service.title">
        <Container>
            <h1>
                {{ service.title }}
            </h1>
            <pre class="whitespace-pre-wrap font-sans">
                {{ service.description }}
            </pre>

            <div class="flex space-x-1">
                <img v-for="packageItem in service.packages" :key="packageItem.id" class="max-h-4"
                    :src="`/assests/packages/${packageItem.code.toLowerCase()}.svg`" :alt="packageItem.code" />
            </div>
        </Container>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/Container.vue";
import {Head, Link, router, useForm} from "@inertiajs/vue3";

const props = defineProps(['service']);


</script>