<template>
    <form @submit.prevent="createPost" class="mt-6 flex flex-col gap-4">
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
            <PrimaryButton>Send</PrimaryButton>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/Container.vue";
import MarkdownEditor from "@/Components/MarkdownEditor.vue";
import PageHeading from "@/Components/PageHeading.vue";
import { ref } from "vue";
import TextArea from "@/Components/TextArea.vue";

const form = useForm({
    name: "",
    subject: "",
    email: "",
    message: "",
});
</script>