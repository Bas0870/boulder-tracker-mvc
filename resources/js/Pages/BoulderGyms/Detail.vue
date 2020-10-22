<template>
    <app-layout :breadcrumbs="[
            {label: 'Dashboard', href: '/dashboard'},
            {label: 'Boulder Gyms', href: '/boulder-gyms'},
            {label: boulderGym.name, href: ''}
         ]">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ boulderGym.name }}
            </h2>
        </template>


        <div class="mt-5 md:mt-0 md:col-span-2" v-for="boulderProblem in boulderGym.boulder_problems">
            <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900">
                    {{ boulderProblem.grade }}
                </h3>
            </div>

            <jet-section-border />
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from './../../Layouts/AppLayout'
    import JetSectionBorder from "../../Jetstream/SectionBorder";

    export default {
        props: ['boulderGym'],

        components: {
            AppLayout,
            JetSectionBorder,
        },
    }
</script>
