<template>
    <div>
        <button @click="openModal">
            <PencilIcon class="size-4 inline-block mr-1" />
        </button>

        <Modal :show="showModal" @close="closeModal" maxWidth="xl" closeable>
            <template #default>
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-900">Add new topic</h2>

                    <form @submit.prevent="editTopic" class="mt-6">
                        <div>
                            <InputLabel for="name" class="sr-only">Topic name</InputLabel>
                            <TextInput id="name" class="w-full" v-model="form.name"
                                placeholder="Give topic name…" />
                            <InputError :message="form.errors.name" class="mt-1" />
                        </div>

                        <div class="mt-3">
                            <InputLabel for="description" class="sr-only">Topic description</InputLabel>
                            <TextArea v-model="form.description" />
                            <InputError :message="form.errors.description" class="mt-1" />
                        </div>

                        <div class="mt-3 flex space-x-2 justify-end	">
                            <SecondaryButton @click="closeModal">Cancel</SecondaryButton>
                            <PrimaryButton type="submit">Add Topic</PrimaryButton>
                        </div>
                    </form>

                </div>
            </template>
        </Modal>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useForm } from "@inertiajs/vue3";
import Modal from '@/Components/Modal.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import TextArea from "@/Components/TextArea.vue";
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { PencilIcon } from '@heroicons/vue/20/solid';

defineProps(['item']); // Accept the topic as a prop



const showModal = ref(false);

const openModal = () => {
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};


const form = useForm({
    name: "",
    description: "",
});

const editTopic = () => {
    form.post(route('topics.store'), {
        onFinish: (response) => {
            if (Object.keys(form.errors).length === 0) {
                form.reset(); // Reset the form fields
                closeModal();
            }
        },
        onError: () => {
            openModal()
        },
    });
};
</script>
