<template>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Create Transport Unit</h1>

        <form @submit.prevent="createTransportUnit" class="space-y-4">
            <!-- Name Input -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input
                    type="text"
                    id="name"
                    v-model="form.name"
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter transport unit name"
                />
            </div>

            <!-- Type Select -->
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                <select
                    id="type"
                    v-model="form.type"
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300"
                >
                    <option disabled value="">Select type</option>
                    <option value="truck">Truck</option>
                    <option value="trailer">Trailer</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div>
                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow-sm hover:bg-blue-600"
                >
                    Create Transport Unit
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            form: {
                name: "",
                type: "",
            },
        };
    },
    methods: {
        async createTransportUnit() {
            try {
                const response = await axios.post("/api/transport-units", this.form);
                // Clear the form
                this.form.name = "";
                this.form.type = "";
            } catch (error) {
                console.error(error);
            }
        },
    },
};
</script>

<style scoped>
.container {
    max-width: 600px;
    margin: 0 auto;
}
</style>
