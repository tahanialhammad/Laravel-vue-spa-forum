<template>
    <div>
        <button @click="openModal"  class="font-black text-3xl rounded-full">+</button>

        <Modal :show="showModal" @close="closeModal" maxWidth="xl" closeable>
            <template #default>
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-900">Add new marketing item</h2>

                    <form @submit.prevent="createMarketing" class="mt-6">
                        <div>
                            <InputLabel for="title" class="sr-only">Marketing title</InputLabel>
                            <TextInput id="title" class="w-full" v-model="form.title"
                                placeholder="Give Marketing title…" />
                            <InputError :message="form.errors.title" class="mt-1" />
                        </div>

                        <div class="mt-3">
                        <InputLabel for="image">Upload Image</InputLabel>
                        <input type="file" id="image" @change="handleFileUpload"
                            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500" />
                        <InputError :message="form.errors.image" class="mt-1" />              
                    </div>

                        <div class="mt-3 flex space-x-2 justify-end	">
                            <SecondaryButton @click="closeModal">Cancel</SecondaryButton>
                            <PrimaryButton type="submit">Add Marketing</PrimaryButton>
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
import SecondaryButton from '@/Components/SecondaryButton.vue';


const showModal = ref(false);

const openModal = () => {
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
    form.reset(); // Reset form on close
};


const form = useForm({
    title: "",
    image: null,
});

const handleFileUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.value = e.target.result;
        };
        reader.readAsDataURL(file);
        form.image = file;
    }
};

const createMarketing = () => {
    form.post(route('marketings.storeMarketing'), {
        onFinish: (response) => {
            if (Object.keys(form.errors).length === 0) {
                closeModal();
            }
        },
        onError: () => {
            openModal()
        },
    });
};
</script>
