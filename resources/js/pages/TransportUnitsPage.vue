<template>
    <div class="container mx-auto p-4">
        <!-- Tab Buttons -->
        <div class="flex space-x-4 mb-6">
            <button :class="[
                    'px-4 py-2 rounded-lg shadow-sm font-medium transition',
                    activeTab === 'truck'
                        ? 'bg-blue-500 text-white'
                        : 'bg-gray-200 hover:bg-gray-300'
                ]"
                    @click="switchTabs('truck')"
            >
                Trucks
            </button>
            <button
                :class="[
                    'px-4 py-2 rounded-lg shadow-sm font-medium transition',
                    activeTab === 'trailer'
                        ? 'bg-blue-500 text-white'
                        : 'bg-gray-200 hover:bg-gray-300'
                ]"
                @click="switchTabs('trailer')"
            >
                Trailers
            </button>
        </div>

        <!-- Tab Content -->
        <div v-if="activeTab === 'truck'" class="space-y-4">
            <h1 class="text-2xl font-bold">Trucks</h1>

            <!-- Search Input -->
            <input
                type="text"
                v-model="search"
                placeholder="Search trucks"
                @input="fetchTransportUnits"
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300"
            />

            <!-- List of Trucks -->
            <ul class="space-y-2">
                <li
                    v-for="truck in transportUnits"
                    :key="truck.id"
                    class="p-4 bg-gray-100 border rounded-lg shadow-sm"
                >
                    {{ truck.name }}
                </li>
            </ul>

            <!-- Pagination Buttons -->
            <div class="flex justify-between">
                <button
                    @click="prevPage"
                    :disabled="isPrevPageDisabled"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow-sm hover:bg-blue-600 disabled:bg-gray-300 disabled:cursor-not-allowed"
                >
                    Prev
                </button>
                <button
                    @click="nextPage"
                    :disabled="isNextPageDisabled"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow-sm hover:bg-blue-600 disabled:bg-gray-300 disabled:cursor-not-allowed"
                >
                    Next
                </button>
            </div>
        </div>

        <div v-if="activeTab === 'trailer'" class="space-y-4">
            <h1 class="text-2xl font-bold">Trailers</h1>

            <!-- Search Input -->
            <input
                type="text"
                v-model="search"
                placeholder="Search trailers"
                @input="fetchTransportUnits"
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300"
            />

            <!-- List of Trailers -->
            <ul class="space-y-2">
                <li
                    v-for="trailer in transportUnits"
                    :key="trailer.id"
                    class="p-4 bg-gray-100 border rounded-lg shadow-sm"
                >
                    {{ trailer.name }}
                </li>
            </ul>

            <!-- Pagination Buttons -->
            <div class="flex justify-between">
                <button
                    @click="prevPage"
                    :disabled="isPrevPageDisabled"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow-sm hover:bg-blue-600 disabled:bg-gray-300 disabled:cursor-not-allowed"
                >
                    Prev
                </button>
                <button
                    @click="nextPage"
                    :disabled="isNextPageDisabled"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow-sm hover:bg-blue-600 disabled:bg-gray-300 disabled:cursor-not-allowed"
                >
                    Next
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            activeTab: "truck",
            transportUnits: [],
            search: "",
            pagination: {
                currentPage: 1,
                pageSize: 5,
            },
            totalPages: 1,
        };
    },
    methods: {
        switchTabs(transportUnitType) {
            this.activeTab = transportUnitType;
            this.pagination.currentPage = 1;
            this.fetchTransportUnits();
        },
        async fetchTransportUnits() {
            const response = await axios.get(`/api/transport-units`, {
                params: {
                    type: this.activeTab,
                    search: this.search,
                    page: this.pagination.currentPage,
                    pageSize: this.pagination.pageSize,
                },
            });

            this.transportUnits = response.data.transportUnits;
            this.totalPages = response.data.totalNumberOfPages;
        },
        prevPage() {
            if (this.pagination.currentPage > 1) {
                this.pagination.currentPage--;
                this.fetchTransportUnits();
            }
        },
        nextPage() {
            if (this.pagination.currentPage < this.totalPages) {
                this.pagination.currentPage++;
                this.fetchTransportUnits();
            }
        },
    },
    computed: {
        isPrevPageDisabled() {
            return this.pagination.currentPage === 1;
        },
        isNextPageDisabled() {
            return this.pagination.currentPage === this.totalPages;
        },
    },
    mounted() {
        this.fetchTransportUnits();
    },
};
</script>
