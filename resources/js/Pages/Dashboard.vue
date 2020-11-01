<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="max-w rounded overflow-hidden shadow-lg">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">🚧🚧 Under construction 🛠 🚧🚧</div>
                            <p class="text-gray-700 text-base">
                                Here you'll be able to see all your statistics and progress in the future!
                            </p>
                            <p class="text-gray-700 text-base">
                                Why don't you head on over to the <inertia-link class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700" href="/boulder-gyms">Boulder Gyms</inertia-link> and start topping some boulder problems?! 🧗‍♂️
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../Layouts/AppLayout'
    import Welcome from './../Jetstream/Welcome'

    export default {
        components: {
            AppLayout,
            Welcome,
        },
    }
</script>
