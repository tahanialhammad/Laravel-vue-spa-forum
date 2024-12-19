<template>
    <AppLayout>
        <Container>

            <AboutService />
<ServicesList :services="services.data" />

            <div>
                <!-- Sub Menu -->
                <nav class="w-1/2 mx-auto border-b border-slate-800">
                    <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <template v-for="item in menu" :key="item.name">
                            <NavLink class="pb-2" v-if="item.when ? item.when() : true" :href="item.url"
                                :active="route().current(item.route)">
                                {{ item.name }}
                            </NavLink>
                        </template>
                        <div v-if="$page.props.auth.user">
                            <AddPackage v-if="$page.props.auth.user.is_admin" />
                        </div>
                    </div>
                </nav>
            </div>
            <PackagesList :packageItems="packageItems" />

            <div>
                <form v-if="$page.props.auth.user" @submit.prevent="addServiceForm" class="mt-4">
                    <div>
                        <InputLabel for="title">Package name</InputLabel>
                        <TextInput id="title" v-model="serviceForm.title" class="w-full"
                            placeholder="Give package name code" />
                    </div>
                    <div>
                        <InputLabel for="description">Package info</InputLabel>
                        <TextArea id="description" v-model="serviceForm.description" />
                    </div>
                    <PrimaryButton type="submit" :disabled="serviceForm.processing" class="mt-3">Add New Service
                    </PrimaryButton>
                </form>
            </div>


            <div class="mx-auto max-w-7xl px-6 lg:px-8 py-6 my-6">
                <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">

                    <Card v-for="service in services.data" :key="service.id" class="group ">
                        <template #cardHeader>
                            <!-- <Link :href="route('services.show', service.id)" class="block group px-2 py-4"> -->
                            <div class="flex justify-between items-center w-full">
                                <Link :href="service.routes.show" class="block group px-2 py-4">
                                <span class="font-bold text-lg group-hover:text-rose-500">{{ service.title }}</span>
                                </Link>

                                <div>

                                    <PencilSquareIcon class="size-4 inline-block mr-1" />
                                    <EyeIcon class="size-4 inline-block mr-1" />
                                    <DeleteService :serviceItem="service.id" />

                                </div>
                            </div>

                        </template>
                        <template #cardBody>
                            <p>
                                {{ service.description }}
                            </p>
                            <div class="flex space-x-1">
                                <img v-for="packageItem in service.packages" :key="packageItem.id" class="max-h-4"
                                    :src="`/assests/packages/${packageItem.code.toLowerCase()}.svg`"
                                    :alt="packageItem.code" />
                            </div>

                        </template>
                        <template #cardFooter>
                            Last upade at :
                            {{ formattedDate(service) }}
                        </template>
                    </Card>

                </div>
            </div>
            <Pagination v-if="services.meta" :meta="services.meta" class="mt-2" />
        </Container>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/Container.vue";
import Pagination from "@/Components/Pagination.vue";
import { formatDistance, parseISO } from "date-fns";
import { relativeDate } from "@/Utilities/date.js";
import { defineProps } from "vue";
import Card from "@/Components/Card.vue";
import PackagesList from "@/Pages/Services/Partials/PackagesList.vue";
import AddPackage from "@/Pages/Services/Partials/AddPackage.vue";
import { Link } from "@inertiajs/vue3";
import { PencilSquareIcon, EyeIcon, TrashIcon } from '@heroicons/vue/20/solid'
import { useForm } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import TextArea from "@/Components/TextArea.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DeleteService from "./Partials/DeleteService.vue";
import NavLink from "@/Components/NavLink.vue";
import ServicesList from "./Partials/ServicesList.vue";
import AboutService from "./Partials/AboutService.vue";



defineProps(['services', 'packageItems']);
const formattedDate = (service) => relativeDate(service.updated_at);


const serviceForm = useForm({
    title: '',
    description: ''
});

const addServiceForm = () => serviceForm.post(route('services.store'), {
    onSuccess: () => serviceForm.reset(),
});


const menu = [
    {
        name: "All Packages",
        url: route('packages.index'),
        route: 'packages.index',
    },
]
</script>
