<template>
    <app-layout :breadcrumbs="[{label: 'Dashboard', href: '/dashboard'}, {label: 'Boulder Gyms', href: '/boulder-gyms'}]">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Boulder Gyms
            </h2>
        </template>

        <div class="mt-5 md:mt-0 md:col-span-2" v-for="boulderGym in boulderGyms">
            <inertia-link :href="boulderGym.detailUrl">
            <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900">
                    {{ boulderGym.name }}
                </h3>
            </div>

            <jet-section-border />
            </inertia-link>
        </div>


    </app-layout>
</template>

<script>
    import AppLayout from './../../Layouts/AppLayout'
    import JetSectionBorder from "../../Jetstream/SectionBorder";

    export default {
        props: ['boulderGyms', 'detailUrl'],

        components: {
            AppLayout,
            JetSectionBorder,
        },
    }
</script>
