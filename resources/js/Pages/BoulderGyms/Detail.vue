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

        <div class="container mx-auto py-8">
            Filter on Grade:
            <div class="inline-block relative w-64">
                <select v-model="gradeFilter" @change="onGradeFilterChange" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <option v-for="grade in selectableGrades" :key="grade">{{ grade }}</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
        </div>


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

                <label v-if="boulderProblem.isTopped" for="checked" class="mt-3 inline-flex items-center cursor-pointer" @click.prevent="onClickTopToggle(boulderProblem)">
                    <span class="relative">
                      <span class="block w-10 h-6 bg-gray-400 rounded-full shadow-inner"></span>
                      <span
                          class="absolute block w-4 h-4 mt-1 ml-1 rounded-full shadow inset-y-0 left-0 focus-within:shadow-outline transition-transform duration-300 ease-in-out bg-purple-600 transform translate-x-full">
                        <input id="checked" type="checkbox" class="absolute opacity-0 w-0 h-0"/>
                      </span>
                    </span>
                    <span class="ml-3 text-sm">Topped!</span>
                </label>

                <label v-else for="unchecked" class="mt-3 inline-flex items-center cursor-pointer" @click.prevent="onClickTopToggle(boulderProblem)">
                    <span class="relative">
                      <span class="block w-10 h-6 bg-gray-400 rounded-full shadow-inner"></span>
                      <span
                          class="absolute block w-4 h-4 mt-1 ml-1 bg-white rounded-full shadow inset-y-0 left-0 focus-within:shadow-outline transition-transform duration-300 ease-in-out">
                        <input id="unchecked" type="checkbox" class="absolute opacity-0 w-0 h-0"/>
                      </span>
                    </span>
                    <span class="ml-3 text-sm">Not Topped</span>
                </label>


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
                    Grade:
                    <div class="inline-block relative w-64">
                        <select v-model="form.grade" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option v-for="grade in selectableGrades" :key="grade">{{ grade }}</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                    <jet-input-error :message="form.error('grade')" class="mt-2" />
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
        props: ['boulderGym', 'selectedGradeFilter'],

        components: {
            Button,
            AppLayout,
            JetSectionBorder,
            JetDialogModal,
            JetInputError,
        },

        data() {
            return {
                isTopped: false,
                gradeFilter: this.selectedGradeFilter,
                showingCreateModal: false,
                form: this.$inertia.form({
                    boulder_gym_id: this.boulderGym.id,
                    grade: "Select grade"
                }, {
                    bag: 'createBoulderProblem',
                    resetOnSuccess: true,
                }),
                selectableGrades: [
                    'Select grade', '4', '5', '6a', '6a+', '6b', '6b+', '6c', '6c+'
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
            },
            onClickTopToggle(boulderProblem) {
                boulderProblem.isTopped = !boulderProblem.isTopped;
                this.$inertia.visit(`/boulder-problems/${boulderProblem.id}/top`, { method: 'post', preserveScroll: true, data: { top: boulderProblem.isTopped }})
            },
            onGradeFilterChange() {
                this.$inertia.visit(`/boulder-gyms/${this.boulderGym.id}`, { method: 'get', data: { grade: this.gradeFilter }})
            }
        }
    }
</script>
