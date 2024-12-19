<template>
    <div class="overflow-hidden py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div
                class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
                <div class="lg:pr-8 lg:pt-4">
                    <div class="lg:max-w-lg">
                        <h2 class="text-base font-semibold leading-7 text-rose-300">
                            <slot name="heroTitle" />
                        </h2>
                        <p class="mt-2 text-3xl font-bold tracking-tight text-gray-100 sm:text-4xl">
                            <slot name="heroTitle2" />
                        </p>
                        <p class="mt-6 text-lg leading-8 text-gray-100">
                            <slot name="heroDescription" />
                        </p>
                        <dl class="mt-10 max-w-xl space-y-8 text-base leading-7 text-gray-100 lg:max-w-none">
                            <div v-for="feature in features" :key="feature.name" class="relative pl-9">
                                <dt class="inline font-semibold text-gray-100">
                                    <component :is="feature.icon" class="absolute left-1 top-1 h-5 w-5 text-rose-300"
                                        aria-hidden="true" />
                                    {{ feature.name }}
                                </dt>
                                {{ ' ' }}
                                <dd class="inline">{{ feature.description }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
                <slot name="heroImage" />
            </div>
        </div>
    </div>
</template>

<script setup>

defineProps({
    features: {
    type: Array,
    required: false,
  },
});




</script>