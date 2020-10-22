<template>
    <app-layout :breadcrumbs="[{label: 'Dashboard', href: '/dashboard'}, {label: 'Boulder Gyms', href: ''}]">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Boulder Gyms
            </h2>
        </template>

        <div class="mt-5 md:mt-0 md:col-span-2" v-for="(boulderGym, index) in boulderGyms" :key="index">
            <inertia-link :href="boulderGym.detailUrl">
            <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg hover:bg-blue-100 active:shadow-lg mouse shadow transition ease-in duration-200">
                <h3 class="text-lg font-medium text-gray-900">
                    {{ boulderGym.name }}
                </h3>
            </div>

            </inertia-link>
            <jet-section-border v-if="index !== boulderGyms.length - 1" />
        </div>

        <div class="fixed right-10 bottom-10">
            <button @click="showingCreateModal = true"
                class="p-0 w-12 h-12 bg-red-600 rounded-full hover:bg-red-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none">
                <svg viewBox="0 0 20 20" enable-background="new 0 0 20 20" class="w-6 h-6 inline-block">
                    <path fill="#FFFFFF" d="M16,10c0,0.553-0.048,1-0.601,1H11v4.399C11,15.951,10.553,16,10,16c-0.553,0-1-0.049-1-0.601V11H4.601
                                        C4.049,11,4,10.553,4,10c0-0.553,0.049-1,0.601-1H9V4.601C9,4.048,9.447,4,10,4c0.553,0,1,0.048,1,0.601V9h4.399
                                        C15.952,9,16,9.447,16,10z" />
                </svg>
            </button>
        </div>

        <jet-dialog-modal :show="showingCreateModal">
            <template #title>Add a new boulder gym</template>
            <template #content>Form goes here</template>
            <template #footer>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Create
                </button>
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" @click="showingCreateModal= false">
                    Cancel
                </button>
            </template>
        </jet-dialog-modal>

    </app-layout>
</template>

<script>
    import AppLayout from './../../Layouts/AppLayout'
    import JetSectionBorder from "../../Jetstream/SectionBorder";
    import JetDialogModal from "../../Jetstream/DialogModal";
    import Button from "../../Jetstream/Button";

    export default {
        props: ['boulderGyms', 'detailUrl'],

        components: {
            Button,
            AppLayout,
            JetSectionBorder,
            JetDialogModal
        },

        data() {
            return {
                showingCreateModal: false
            }
        },
    }
</script>
