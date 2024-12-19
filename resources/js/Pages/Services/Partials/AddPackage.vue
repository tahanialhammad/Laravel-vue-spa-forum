<template>
    <div>
        <PrimaryButton @click="openModal">Add Package</PrimaryButton>

        <Modal :show="showModal" @close="closeModal" maxWidth="xl" closeable>
            <template #default>
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-900">Modal Title</h2>

                    <form @submit.prevent="createPackage" class="mt-6">
                        <div>
                            <InputLabel for="code" class="sr-only">Code</InputLabel>
                            <TextInput id="code" class="w-full" v-model="form.code"
                                placeholder="Give it a great title…" />
                            <InputError :message="form.errors.code" class="mt-1" />
                        </div>

                        <div class="mt-3">
                            <InputLabel for="info" class="sr-only">Info</InputLabel>
                            <MarkdownEditor v-model="form.info" editor-class="!min-h-[120px]" />
                            <InputError :message="form.errors.info" class="mt-1" />
                        </div>

                        <div class="mt-3 flex space-x-2 justify-end	">
                            <SecondaryButton @click="closeModal">Close</SecondaryButton>
                            <PrimaryButton type="submit">Create package</PrimaryButton>
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
import MarkdownEditor from "@/Components/MarkdownEditor.vue";
import SecondaryButton from '@/Components/SecondaryButton.vue';




const showModal = ref(false);

const openModal = () => {
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};


const form = useForm({
    code: "",
    info: "",
});

const createPackage = () => {
    form.post(route('packages.store'), {
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
