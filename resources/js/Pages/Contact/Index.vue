<template>
    <AppLayout>
        <Container>
            <div class="flex mb-10 items-center">
                <!-- Left Section -->
                <div class="w-2/3 flex flex-col gap-8 p-4 pe-8 relative">
                    <!-- Small Circle SVG -->
                    <Circle class="absolute top-5 right-5 z-0" />

                    <!-- Gradient Circle SVG -->

                    <GradientCircle class="absolute -top-8 -left-2 z-0" />

                    <!-- Text Content -->
                    <h1 class="text-5xl font-black w-2/3 z-10">Get In Touch</h1>

                    <Circle class="absolute right-1/2 z-0" circleClass="fill-rose-500" />

                    <ContactForm />

                </div>

                <!-- Right Section with Image -->
                <div class="relative flex-1">
                    <Square class="absolute top-8 right-5 z-0" />
                    <img  src="assets/images/contact-image2.png"
                        alt="Contact Image">
                    <img class="absolute -end-20 left-0 w-20"
                        src="assets/images/ring.png"
                        alt="Abstract Shape">
                </div>
            </div>

        </Container>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/Container.vue";
import Circle from '@/Components/Svg/Circle.vue';
import GradientCircle from '@/Components/Svg/GradientCircle.vue';
import Square from '@/Components/Svg/Square.vue';
import ContactForm from "./Partials/ContactForm.vue";
</script>