<template>
    <div class="container mx-auto p-6 text-center">
        <!-- Header -->
        <h1 class="text-3xl font-bold mb-6">Welcome to the Transport Units App</h1>

        <!-- Navigation Links -->
        <div class="flex justify-center space-x-4 mb-8">
            <router-link
                to="/transport-units"
                class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow-sm hover:bg-blue-600 transition"
            >
                View Transport Units
            </router-link>
            <router-link
                to="/transport-units/create"
                class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-sm hover:bg-green-600 transition"
            >
                Create Transport Unit
            </router-link>
        </div>

        <!-- Router View -->
        <div class="mt-8">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
export default {
    name: 'App',
};
</script>

<style scoped>
/* Optional scoped styles for the component */
</style>
