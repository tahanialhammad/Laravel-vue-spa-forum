<template>
    <div class="relative flex flex-col gap-4 items-start  mt-20">
        <div class="relative mb-8 flex justify-between w-full">
            <h1 class="relative font-black text-4xl z-10 uppercase">
                All Marketings
            </h1>
            <GradientCircle class="absolute -top-8 -left-10 z-0" />
            <div v-if="$page.props.auth.user">
                <AddMarketing v-if="$page.props.auth.user.is_admin" />
            </div>
        </div>

        <div class="flex flex-wrap gap-4 w-full max-h-64 overflow-y-scroll ">
            <div v-for="item in marketings" :key="item.id"
                class="relative group bg-slate-900 p-8 h-40 w-full rounded-3xl flex items-center bg-cover bg-center transition-all duration-300 ease-in-out"
                :style="{ backgroundImage: `url(${item.image})` }">

                <div
                    class="absolute inset-0 bg-gradient-to-l from-slate-800 via-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>

                <div class="relative z-10 flex justify-between w-full">
                    <h3 class="relative font-black text-3xl">
                        {{ item.title }}
                    </h3>
                    <div class="flex flex-col gap-1 border-s-2 border-slate-500 h-full ps-2">

                        <div v-if="$page.props.auth.user">
                            <button v-if="$page.props.auth.user.is_admin" method="delete" as="button" type="button"
                                class="text-red-600 hover:text-red-800" @click.prevent="confirmDelete(item)">
                                <TrashIcon class="size-4 inline-block mr-1" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script setup>
import GradientCircle from '@/Components/Svg/GradientCircle.vue';
import AddMarketing from './AddMarketing.vue';
import { TrashIcon } from '@heroicons/vue/20/solid';
import { router } from "@inertiajs/vue3";


// Import SweetAlert2
import Swal from 'sweetalert2';

defineProps(["marketings"]);

const confirmDelete = (item) => {
    // Use SweetAlert2 for the confirmation
    Swal.fire({
        title: 'Are you sure?',
        text: `Do you want to delete this marketing item "${item.title}"?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(route('marketings.destroyMarketing', item), {
                preserveScroll: true,
            });
        } else {
            Swal.fire('Cancelled', 'The marketing item was not deleted.', 'info');
        }
    });
};
</script>