<template>
    <div class="relative flex flex-col gap-4 items-start">
        <div class="relative mb-8 flex justify-between w-full">
            <h1 class="relative font-black text-4xl z-10 uppercase">
                All Topics
            </h1>
            <GradientCircle class="absolute -top-8 -left-10 z-0" />
            <div v-if="$page.props.auth.user">
                <AddTopic v-if="$page.props.auth.user.is_admin" />
            </div>
        </div>


        <div class="flex flex-wrap gap-4 w-full h-lvh overflow-y-scroll ">
            <div v-for="(item, index) in topics" :key="index"
                class="relative group bg-slate-900 p-8 h-40 w-full rounded-3xl flex items-center bg-cover bg-center transition-all duration-300 ease-in-out">
                <div
                    class="absolute inset-0 bg-gradient-to-l from-slate-800 via-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>

                <div class="relative z-10 flex justify-between w-full">
                    <h3 class="relative font-black text-3xl">
                        {{ item.name }}
                    </h3>
                    <div class="flex flex-col gap-1 border-s-2 border-slate-500 h-full ps-2">
                        <!-- <Link preserve-scroll :href="route('topics.destroy', ['item', item.id])" method="delete">
                        x
                        </Link> -->
                        <div v-if="$page.props.auth.user">

                            <button v-if="$page.props.auth.user.is_admin" method="delete" as="button" type="button"
                                class="text-red-600 hover:text-red-800" @click.prevent="confirmDelete(item)">
                                <TrashIcon class="size-4 inline-block mr-1" />
                            </button>


                            <EditTopic v-if="$page.props.auth.user.is_admin" :item="item" />
                        </div>


                        <div class="font-black text-3xl">
                            {{ item.post_count }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script setup>
import GradientCircle from '@/Components/Svg/GradientCircle.vue';
import { TrashIcon, PencilIcon } from '@heroicons/vue/20/solid'
import { router } from "@inertiajs/vue3";
// Import SweetAlert2
import Swal from 'sweetalert2';
import AddTopic from './AddTopic.vue';
import EditTopic from './EditTopic.vue';

defineProps(["topics"]);

const confirmDelete = (item) => {
    // Use SweetAlert2 for the confirmation
    Swal.fire({
        title: 'Are you sure?',
        text: `Do you want to delete the topic "${item.name}"?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(route('topics.destroy', item), {
                preserveScroll: true,
            });

            // Swal.fire('Deleted!', 'The topic has been deleted.', 'success');
        } else {
            Swal.fire('Cancelled', 'The topic was not deleted.', 'info');
        }
    });
};
</script>