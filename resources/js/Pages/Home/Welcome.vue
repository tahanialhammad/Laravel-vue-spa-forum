<template>
    <AppLayout title="Home">
        <Container>
            <div class="relative isolate p-6 lg:px-8 flex flex-col gap-10 overflow-hidden">
                <div class="absolute inset-x-0 -top-40tt -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80tt"
                    aria-hidden="true">
                    <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" />
                </div>

                <HeroSection />

                <Portfolio :marketings="marketings"/>

                <Features />

                <Topics :topics="topics"/>

                <Team />
                
                <AboutUs />

                <Blog :posts="posts" />
            </div>
        </Container>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import HeroSection from './Partials/HeroSection.vue';
import Portfolio from './Partials/Portfolio.vue';
import Features from './Partials/Features.vue';
import Team from './Partials/Team.vue';
import AboutUs from './Partials/AboutUs.vue';
import Blog from './Partials/Blog.vue';
import Topics from './Partials/Topics.vue';

defineProps(["posts", 'topics', 'marketings']);

</script>