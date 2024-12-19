<template>
    <!-- good for SEO pushed url wiht slug into html head, rel is relationalship -->

    <Head>
        <link rel="canonical" :href="post.routes.show" />
    </Head>

    <AppLayout :title="post.title">
        <Container>


            <div class="flex">
                <div class="w-3/4">
                    <!-- <img :src="post.image" :alt="post.title" class="w-full rounded-lg shadow-md" /> -->

                    <img v-if="post.image" :src="post.image ? `/${post.image}` : ''" :alt="post.title"
                        class="w-full max-h-80 object-cover rounded-3xl shadow-md mb-8" />


                    <Pill :href="route('posts.index', { topic: post.topic.slug })">{{ post.topic.name }}</Pill>

                    <!-- <h1 class="text-2xl font-bold">{{ post.title }}</h1> -->
                    <PageHeading class="mt-2">{{ post.title }}</PageHeading>

                    <span class="block mt-1 text-sm text-slate-300">{{ formattedDate }} by {{ post.user.name }}</span>

                    <div class="mt-4">
                        <span class="text-rose-500 font-bold">{{ post.likes_count }} likes</span>
                    </div>

                    <div class="mt-4">
                        <span class="text-rose-500 font-bold">{{ post.likes_count }} likes</span>

                        <!-- only login user can see that btn -->
                        <div v-if="$page.props.auth.user" class="mt-2">
                            <Link v-if="post.can.like" :href="route('likes.store', ['post', post.id])" method="post"
                                class="inline-block bg-rose-600 hover:bg-rose-500 transition-colors text-white py-1.5 px-3 rounded-full">
                            <HandThumbUpIcon class="size-4 inline-block mr-1" />
                            Like Post
                            </Link>
                            <Link v-else :href="route('likes.destroy', ['post', post.id])" method="delete"
                                class="inline-block bg-rose-600 hover:bg-rose-500 transition-colors text-white py-1.5 px-3 rounded-full">
                            <HandThumbDownIcon class="size-4 inline-block mr-1" />
                            Unlike Post
                            </Link>
                        </div>
                    </div>

                    <!-- <article class="mt-6">
                <pre class="whitespace-pre-wrap font-sans">{{ post.body }}</pre>
            </article> -->
                    <article class="mt-6 prose prose-sm max-w-none text-slate-100" v-html="post.html">
                    </article>

                    <div class="mt-12">
                        <h2 class="text-xl font-semibold">Comments</h2>

                        <form v-if="$page.props.auth.user"
                            @submit.prevent="() => commentIdBeingEdited ? updateComment() : addComment()" class="mt-4">
                            <div>
                                <InputLabel for="body" class="sr-only">Comment</InputLabel>
                                <!-- <TextArea ref="commentTextAreaRef" id="body" v-model="commentForm.body" rows="4" placeholder="Speak your mind Spock…"/> -->
                                <MarkdownEditor ref="commentTextAreaRef" id="body" v-model="commentForm.body"
                                    placeholder="Speak your mind Spock…" editorClass="!min-h-[100px]" />
                                <InputError :message="commentForm.errors.body" class="mt-1" />
                            </div>

                            <PrimaryButton type="submit" class="mt-3" :disabled="commentForm.processing"
                                v-text="commentIdBeingEdited ? 'Update Comment' : 'Add Comment'"></PrimaryButton>
                            <SecondaryButton v-if="commentIdBeingEdited" @click="cancelEditComment" class="ml-2">Cancel
                            </SecondaryButton>
                        </form>

                        <ul class="divide-y divide-slate-500 mt-4">
                            <li v-for="comment in comments.data" :key="comment.id" class="px-2 py-4">
                                <Comment @edit="editComment" @delete="deleteComment" :comment="comment" />
                            </li>
                        </ul>

                        <Pagination :meta="comments.meta" :only="['comments']" />
                        <!-- fix pagination with flash message bug , we do that in compoponent  -->
                        <!-- <Pagination :meta="comments.meta" :only="['comments', 'jetstream']"/> -->

                    </div>
                </div>
                <div class="w-1/4 ms-8 flex flex-col gap-5">
                    <SideBaar :recentPosts="recentPosts" />
                </div>
            </div>

        </Container>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { computed, ref } from "vue";
import Container from "@/Components/Container.vue";
import Pagination from "@/Components/Pagination.vue";
import { relativeDate } from "@/Utilities/date.js";
import Comment from "@/Components/Comment.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, router, useForm } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { useConfirm } from "@/Utilities/Composables/useConfirm.js";
import MarkdownEditor from "@/Components/MarkdownEditor.vue";
import PageHeading from "@/Components/PageHeading.vue";
import Pill from "@/Components/Pill.vue";
import { HandThumbUpIcon, HandThumbDownIcon } from "@heroicons/vue/20/solid/index.js";
import SideBaar from "./Partials/SideBaar.vue";


const props = defineProps(['post', 'comments', 'recentPosts']);

const formattedDate = computed(() => relativeDate(props.post.created_at));

const commentForm = useForm({
    body: '',
});

const commentTextAreaRef = ref(null);
const commentIdBeingEdited = ref(null);
const commentBeingEdited = computed(() => props.comments.data.find(comment => comment.id === commentIdBeingEdited.value));

const editComment = (commentId) => {
    commentIdBeingEdited.value = commentId;
    commentForm.body = commentBeingEdited.value?.body;
    commentTextAreaRef.value?.focus();
};

const cancelEditComment = () => {
    commentIdBeingEdited.value = null;
    commentForm.reset();
};

const addComment = () => commentForm.post(route('posts.comments.store', props.post.id), {
    preserveScroll: true,
    onSuccess: () => commentForm.reset(),
});

const { confirmation } = useConfirm();

const updateComment = async () => {
    if (! await confirmation('Are you sure you want to update this comment?')) {
        commentTextAreaRef.value?.focus();
        return;
    }

    commentForm.put(route('comments.update', {
        comment: commentIdBeingEdited.value,
        page: props.comments.meta.current_page,
    }), {
        preserveScroll: true,
        onSuccess: cancelEditComment,
    });
};

// const deleteComment = async (commentId) => {
//     if (! await confirmation('Are you sure you want to delete this comment?')) {
//         return;
//     }

//     router.delete(route('comments.destroy', {comment: commentId, page: props.comments.meta.current_page}), {
//         preserveScroll: true,
//     });
// };

//fix bug whene delete last commnts on paginathion 
const deleteComment = async (commentId) => {
    if (
        !(await confirmation("Are you sure you want to delete this comment?"))
    ) {
        return;
    }

    router.delete(
        route("comments.destroy", {
            comment: commentId,
            page: props.comments.data.length > 1
                ? props.comments.meta.current_page
                : Math.max(props.comments.meta.current_page - 1, 1) //or privoice page or page 1 if there are only 1 page
        }),
        {
            preserveScroll: true,
        },
    );
};
</script>