<template>
    <AppLayout title="Edit a Post">
        <Container>
            <PageHeading>Edit a Post {{ form.title }}</PageHeading>

            <form @submit.prevent="updatePost" class="mt-6 md:flex">
                <div class="w-full md:w-3/4">
                    <div>
                        <InputLabel for="title" class="sr-only">Title</InputLabel>
                        <TextInput id="title" class="w-full" v-model="form.title"
                            placeholder="Give it a great title…" />
                        <InputError :message="form.errors.title" class="mt-1" />
                    </div>

                    <div class="mt-3">
                        <InputLabel for="body" class="sr-only">Body</InputLabel>
                        <MarkdownEditor v-model="form.body">
                            <template #toolbar="{ editor }">
                                <li>
                                    <button @click="() => editor.chain().focus().toggleHeading({ level: 5 }).run()"
                                        type="button" class="px-3 py-2"
                                        :class="[editor.isActive('heading', { level: 5 }) ? 'bg-rose-500 text-white' : 'hover:bg-gray-200']"
                                        title="Heading 4">
                                        <i class="ri-h-4"></i>
                                    </button>
                                </li>
                            </template>
                        </MarkdownEditor>
                        <InputError :message="form.errors.body" class="mt-1" />
                    </div>
                </div>

                <div class="w-full md:w-1/4 mt-8 md:mt-0 ms-8">
                    <div class="">
                        <PrimaryButton type="submit">Update Post</PrimaryButton>
                    </div>

                    <div class="mt-3">
                        <InputLabel for="topic_id">Select a Topic</InputLabel>
                        <select v-model="form.topic_id" id="topic_id"
                            class="mt-1 w-full rounded-md text-black border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500">
                            <option v-for="topic in topics" :key="topic.id" :value="topic.id">
                                {{ topic.name }}
                            </option>
                        </select>
                        <InputError :message="form.errors.topic_id" class="mt-1" />
                    </div>

                    <div class="mt-3">
                        <InputLabel for="image">Upload Image</InputLabel>
                        <input type="file" id="image" @change="handleFileUpload"
                            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500" />
                        <InputError :message="form.errors.image" class="mt-1" />
                        <!-- Show the current image if there is one -->
                        <div v-if="!imagePreview && props.post.image" class="mt-2">
                            <img :src="`/storage/${props.post.image}`" alt="Current Image" class="w-full rounded-md" />
                            <p class="text-sm text-gray-500 mt-2">Current Image</p>
                        </div>
                        <!-- New Image Preview -->
                        <img v-if="imagePreview" :src="imagePreview" alt="Image preview"
                            class="mt-2 w-full rounded-md" />
                    </div>
                </div>
            </form>
        </Container>
    </AppLayout>
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

const props = defineProps({
    post: Object,
    topics: Array,
});

const imagePreview = ref(null);

// Handle file upload
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

// Initialize the form with the post data from props
const form = useForm({
    title: props.post.title || '',
    topic_id: props.post.topic_id || props.topics[0]?.id || null,
    body: props.post.body || '',
    image: null,
});

// Set an existing image as default
if (props.post.image) {
    imagePreview.value = `/storage/${props.post.image}`;
}

const updatePost = () => {
    form.post(route('posts.update', props.post.id), {
        forceFormData: true,  // Force Inertia to send data as FormData, useful for file uploads
        onSuccess: () => {
            console.log('Post updated');
        },
        onError: (errors) => {
            console.error('Error updating the post:', errors);
        }
    });
};
</script>

<style scoped>
/* Add your styles here */
</style>
