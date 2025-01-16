<template>
    <form @submit.prevent="sendContact" class="mt-6 flex flex-col gap-4">
        <div>
            <InputLabel for="title" class="sr-only">Title</InputLabel>
            <TextInput id="name" class="w-full" v-model="form.name" placeholder="Your name" />
            <InputError :message="form.errors.name" class="mt-1" />
        </div>

        <div>
            <InputLabel for="subject" class="sr-only">Title</InputLabel>
            <TextInput id="subject" class="w-full" v-model="form.subject" placeholder="Subject" />
            <InputError :message="form.errors.subject" class="mt-1" />
        </div>

        <div>
            <InputLabel for="email" class="sr-only">Title</InputLabel>
            <TextInput id="email" class="w-full" v-model="form.email" placeholder="Your email" />
            <InputError :message="form.errors.email" class="mt-1" />
        </div>

        <div>
            <InputLabel for="message" class="sr-only">Message</InputLabel>
            <TextArea id="message" v-model="form.message" rows="4" placeholder="Message" />
            <InputError :message="form.errors.message" class="mt-1" />
        </div>

        <div>
            <PrimaryButton type="submit">Send</PrimaryButton>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import TextArea from "@/Components/TextArea.vue";

const form = useForm({
    name: "",
    subject: "",
    email: "",
    message: "",
});

//const sendContact = () => form.post(route('contact.store'));
const sendContact = () => {
    form.post(route('contact.store'), {
        onSuccess: () => {
            form.reset(); // Reset the form fields
        },
        onError: (errors) => {
            console.error("Validation errors:", errors); // Log validation errors if needed
        },
    });
};
</script>
