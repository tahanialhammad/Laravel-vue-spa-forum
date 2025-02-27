<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue';
import LogoutOtherBrowserSessionsForm from '@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import TwoFactorAuthenticationForm from '@/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue';
import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue';
import Container from '@/Components/Container.vue';

defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
});
</script>

<template>
    <!-- Profile Page Layout -->
    <AppLayout title="Profile">
        <!-- Page Header -->

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800tt leading-tight">
                Profile
            </h2>
        </template>
        <Container>
            <div>
                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 ">
                    <!-- Profile Information Update -->
                    <div v-if="$page.props.jetstream.canUpdateProfileInformation">
                        <UpdateProfileInformationForm :user="$page.props.auth.user" />

                        <SectionBorder />
                    </div>

                    <!-- Password Update Section -->
                    <div v-if="$page.props.jetstream.canUpdatePassword">
                        <UpdatePasswordForm class="mt-10 sm:mt-0" />

                        <SectionBorder />
                    </div>

                    <!-- Two-Factor Authentication Settings -->
                    <div v-if="$page.props.jetstream.canManageTwoFactorAuthentication">
                        <TwoFactorAuthenticationForm :requires-confirmation="confirmsTwoFactorAuthentication"
                            class="mt-10 sm:mt-0" />

                        <SectionBorder />
                    </div>

                    <!-- Logout from Other Browser Sessions -->
                    <LogoutOtherBrowserSessionsForm :sessions="sessions" class="mt-10 sm:mt-0" />

                    <!-- Account Deletion Feature -->
                    <template v-if="$page.props.jetstream.hasAccountDeletionFeatures">
                        <SectionBorder />

                        <DeleteUserForm class="mt-10 sm:mt-0" />
                    </template>
                </div>
            </div>
        </Container>
    </AppLayout>
</template>
