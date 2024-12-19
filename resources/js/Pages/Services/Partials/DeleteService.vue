<template>
    <div class="flex items-center">
        <form @submit.prevent="deleteItem">
            <button>
                <TrashIcon class="size-4 inline-block mr-1" />
            </button>
        </form>
    </div>

</template>


<script setup>
import { Head, Link, router, useForm } from "@inertiajs/vue3";
import { TrashIcon } from '@heroicons/vue/20/solid'
import { useConfirm } from "@/Utilities/Composables/useConfirm.js";


const props = defineProps(['serviceItem']);
const { confirmation } = useConfirm();


const deleteItem = async (serviceItem) => {
    if (
        !(await confirmation("Are you sure you want to delete this service?"))
    ) {
        return;
    }

    router.delete(route('services.destroy', props.serviceItem), {
        preserveScroll: true,
    });
};
</script>