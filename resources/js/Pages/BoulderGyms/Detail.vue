<template>
    <app-layout :breadcrumbs="[
            {label: 'Dashboard', href: '/dashboard'},
            {label: 'Boulder Gyms', href: '/boulder-gyms'},
            {label: boulderGym.name, href: ''}
         ]">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Boulder Problems of {{ boulderGym.name }}
            </h2>
        </template>

        <div class="mt-5 md:mt-0 md:col-span-2" v-for="boulderProblem in boulderGym.boulderProblems">
            <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900">
                    Grade: {{ boulderProblem.grade }}
                </h3>
                <div v-if="boulderProblem.creator" class="flex items-center">
                    <img class="w-10 h-10 rounded-full mr-4" :src="boulderProblem.creator.profile_photo_url" :alt="'Avatar of ' + boulderProblem.creator.name">
                    <div class="text-sm">
                        <p class="text-gray-900 leading-none">{{ boulderProblem.creator.name }}</p>
                        <p class="text-gray-600">{{ boulderProblem.created_at }}</p>
                    </div>
                </div>
            </div>

            <jet-section-border />
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

        <jet-dialog-modal :show="showingCreateModal" :closeable="true">
            <template #title>Add a new boulder gym</template>
            <template #content>
                <form class="w-full max-w-lg" id="create-boulder-gym-form" @submit.prevent="onSubmitCreateBoulderProblemForm">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grade">
                                Grade
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="grade" type="text" placeholder="" v-model="form.grade">
                            <jet-input-error :message="form.error('grade')" class="mt-2" />
                        </div>
                    </div>
                    <input id="boulder_gym_id" type="hidden" placeholder="" v-model="boulderGym.id">

                </form>
            </template>
            <template #footer>
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" @click="showingCreateModal= false">
                    Cancel
                </button>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" form="create-boulder-gym-form">
                    Create
                </button>
            </template>
        </jet-dialog-modal>

    </app-layout>
</template>

<script>
    import AppLayout from './../../Layouts/AppLayout'
    import JetSectionBorder from "../../Jetstream/SectionBorder";
    import Button from "../../Jetstream/Button";
    import JetDialogModal from "../../Jetstream/DialogModal";
    import JetInputError from "../../Jetstream/InputError";

    export default {
        props: ['boulderGym'],

        components: {
            Button,
            AppLayout,
            JetSectionBorder,
            JetDialogModal,
            JetInputError,
        },

        data() {
            return {
                showingCreateModal: false,
                form: this.$inertia.form({
                    boulder_gym_id: this.boulderGym.id,
                    grade: ""
                }, {
                    bag: 'createBoulderProblem',
                    resetOnSuccess: true,
                }),
                selectableGrades: [
                    '4', '5', '6a', '6a+', '6b', '6b+', '6c', '6c+'
                ]
            }
        },

        methods: {
            onSubmitCreateBoulderProblemForm() {
                this.form.post('/boulder-problems', {preserveScroll: true}).then(() => {
                    if (! this.$page.errors.createBoulderProblem) {
                        this.showingCreateModal = false;
                    }
                })
            }
        }
    }
</script>

<style>

</style>
