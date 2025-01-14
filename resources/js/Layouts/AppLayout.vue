<script setup>
import { ref } from "vue";
import { Head, Link, router, usePage } from "@inertiajs/vue3";
import Banner from "@/Components/Banner.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import ConfirmationModalWrapper from "@/Components/ConfirmationModalWrapper.vue";
import FooterSection from "@/Layouts/Partials/FooterSection.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import PrimaryLink from "@/Components/PrimaryLink.vue";

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(
        route("current-team.update"),
        {
            team_id: team.id,
        },
        {
            preserveState: false,
        }
    );
};

const logout = () => {
    router.post(route("logout"));
};

const menu = [
    {
        name: "Home",
        url: route("welcome"),
        route: "/",
    },
    {
        name: "Dashboard",
        url: route("dashboard"),
        route: "dashboard",
        when: () => usePage().props.auth.user,
    },
    {
        name: "Blog",
        url: route("posts.index"),
        route: "posts.index",
    },
    {
        name: "Create a Post",
        url: route("posts.create"),
        route: "posts.create",
        when: () => usePage().props.auth.user,
    },
    {
        name: "Contact",
        url: route("contact"),
        route: "contact",
    },
];
</script>

<template>
    <div class="bg-slate-950 text-slate-100">

        <Head :title="title" />
        <!--A flash message in Laravel's Jetstream -->
        <Banner />

        <div class="min-h-screen">
            <nav class="bg-slate-950 border-b border-slate-800">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('welcome')">
                                <ApplicationLogo class="block h-9 w-auto" />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <template v-for="item in menu" :key="item.name">
                                    <NavLink v-if="item.when ? item.when() : true" :href="item.url"
                                        :active="route().current(item.route)">
                                        {{ item.name }}
                                    </NavLink>
                                </template>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Settings Dropdown -->
                            <div v-if="$page.props.auth.user" class="ml-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <button v-if="
                                            $page.props.jetstream
                                                .managesProfilePhotos
                                        "
                                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-slate-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.auth.user
                                                .profile_photo_url
                                                " :alt="$page.props.auth.user.name
                                                    " />
                                        </button>

                                        <span v-else class="inline-flex rounded-md">
                                            <button type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-slate-500 bg-white hover:text-slate-700 focus:outline-none focus:bg-slate-50 active:bg-slate-50 transition ease-in-out duration-150">
                                                {{ $page.props.auth.user.name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-slate-400">
                                            Manage Account
                                        </div>

                                        <DropdownLink :href="route('profile.show')">
                                            Profile
                                        </DropdownLink>

                                        <DropdownLink v-if="
                                            $page.props.jetstream
                                                .hasApiFeatures
                                        " :href="route('api-tokens.index')">
                                            API Tokens
                                        </DropdownLink>

                                        <div class="border-t border-slate-200" />

                                        <!-- Authentication -->
                                        <form @submit.prevent="logout">
                                            <DropdownLink as="button">
                                                Log Out
                                            </DropdownLink>
                                        </form>
                                    </template>
                                </Dropdown>
                            </div>

                            <template v-else>
                                <PrimaryLink :href="route('login')">Log in</PrimaryLink>
                                <PrimaryLink :href="route('register')" class="ms-2 bg-rose-500 hover:bg-transparent">
                                    Register</PrimaryLink>
                            </template>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button
                                class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-slate-500 hover:bg-slate-100 focus:outline-none focus:bg-slate-100 focus:text-slate-500 transition duration-150 ease-in-out"
                                @click="
                                    showingNavigationDropdown =
                                    !showingNavigationDropdown
                                    ">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{
                                        hidden: showingNavigationDropdown,
                                        'inline-flex':
                                            !showingNavigationDropdown,
                                    }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{
                                        hidden: !showingNavigationDropdown,
                                        'inline-flex':
                                            showingNavigationDropdown,
                                    }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{
                    block: showingNavigationDropdown,
                    hidden: !showingNavigationDropdown,
                }" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <template v-for="item in menu" :key="item.name">
                            <ResponsiveNavLink v-if="item.when ? item.when() : true" :href="item.url"
                                :active="route().current(item.route)">
                                {{ item.name }}
                            </ResponsiveNavLink>
                        </template>
                        <div v-if="!usePage().props.auth.user">
                            <ResponsiveNavLink :href="route('login')">Log in</ResponsiveNavLink>
                            <ResponsiveNavLink :href="route('register')">Register</ResponsiveNavLink>
                        </div>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div v-if="$page.props.auth.user" class="pt-4 pb-1 border-t border-slate-200">
                        <div class="flex items-center px-4">
                            <div v-if="
                                $page.props.jetstream.managesProfilePhotos
                            " class="shrink-0 mr-3">
                                <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url
                                    " :alt="$page.props.auth.user.name" />
                            </div>

                            <div>
                                <div class="font-medium text-base text-slate-800">
                                    {{ $page.props.auth.user.name }}
                                </div>
                                <div class="font-medium text-sm text-slate-500">
                                    {{ $page.props.auth.user.email }}
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.show')" :active="route().current('profile.show')">
                                Profile
                            </ResponsiveNavLink>

                            <ResponsiveNavLink v-if="$page.props.jetstream.hasApiFeatures"
                                :href="route('api-tokens.index')" :active="route().current('api-tokens.index')">
                                API Tokens
                            </ResponsiveNavLink>

                            <!-- Authentication -->
                            <form method="POST" @submit.prevent="logout">
                                <ResponsiveNavLink as="button">
                                    Log Out
                                </ResponsiveNavLink>
                            </form>

                            <!-- Team Management -->
                            <template v-if="$page.props.jetstream.hasTeamFeatures">
                                <div class="border-t border-slate-200" />

                                <div class="block px-4 py-2 text-xs text-slate-400">
                                    Manage Team
                                </div>

                                <!-- Team Settings -->
                                <ResponsiveNavLink :href="route(
                                    'teams.show',
                                    $page.props.auth.user.current_team
                                )
                                    " :active="route().current('teams.show')">
                                    Team Settings
                                </ResponsiveNavLink>

                                <ResponsiveNavLink v-if="$page.props.jetstream.canCreateTeams"
                                    :href="route('teams.create')" :active="route().current('teams.create')">
                                    Create New Team
                                </ResponsiveNavLink>

                                <!-- Team Switcher -->
                                <template v-if="
                                    $page.props.auth.user.all_teams.length >
                                    1
                                ">
                                    <div class="border-t border-slate-200" />

                                    <div class="block px-4 py-2 text-xs text-slate-400">
                                        Switch Teams
                                    </div>

                                    <template v-for="team in $page.props.auth.user
                                        .all_teams" :key="team.id">
                                        <form @submit.prevent="switchToTeam(team)">
                                            <ResponsiveNavLink as="button">
                                                <div class="flex items-center">
                                                    <svg v-if="
                                                        team.id ==
                                                        $page.props.auth
                                                            .user
                                                            .current_team_id
                                                    " class="mr-2 h-5 w-5 text-green-400"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    <div>{{ team.name }}</div>
                                                </div>
                                            </ResponsiveNavLink>
                                        </form>
                                    </template>
                                </template>
                            </template>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header v-if="$slots.header" class="shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
        <!-- Confirmation alert modal. It can be used instead of Sweetalert -->
        <ConfirmationModalWrapper />

        <FooterSection :latestPosts="$page.props.latestPosts" />
    </div>
</template>
