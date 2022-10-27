<template>
    <AdminLayout>
        <Head title="Clients" />
        <div class="w-full max-w-7xl mx-auto mt-20">
            <div>
                <h1
                    class="font-bold mb-2 text-lg dark:text-gray-300 text-gray-700"
                >
                    Patients
                </h1>
            </div>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <div class="pb-4 bg-white p-2 dark:bg-gray-900">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div
                            class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none"
                        >
                            <svg
                                class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </div>
                        <input
                            type="text"
                            id="table-search"
                            v-model="params.search"
                            class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for items"
                        />
                    </div>
                </div>
                <table
                    class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                >
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                    >
                        <tr>
                            <th scope="col" class="py-3 px-6">ID</th>
                            <th scope="col" class="py-3 px-6">Name & Email</th>
                            <th scope="col" class="py-3 px-6">Contact</th>
                            <th scope="col" class="py-3 px-6">Age</th>
                            <th scope="col" class="py-3 px-6">Sex</th>
                            <th scope="col" class="py-3 px-6">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-if="data.length > 0"
                            v-for="(client, index) in data"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                        >
                            <td class="p-4 px-6">
                                {{ client.id }}
                            </td>
                            <th
                                scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                <div class="flex gap-2 items-center">
                                    <img
                                        class="h-8 w-8 rounded-full object-cover"
                                        :src="client.profile_photo_url"
                                        :alt="client.name"
                                    />
                                    <div>
                                        <p>{{ client.name }}</p>
                                        <p
                                            class="text-gray-500 dark:text-gray300"
                                        >
                                            {{ client.email }}
                                        </p>
                                    </div>
                                </div>
                            </th>
                            <td class="py-4 px-6">{{ client.contact }}</td>
                            <td class="py-4 px-6">{{ client.age }}</td>
                            <td class="py-4 px-6">{{ client.sex }}</td>
                            <td class="py-4 px-6">
                                <!-- <a
                                    href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                    >Edit</a
                                > -->
                                <button
                                    @click="showWarning(client.id)"
                                    class="bg-red-500 hover:bg-red-700 dark:hover:bg-red-300 text-white rounded-lg px-2 py-1"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                        <tr v-else>
                            <td
                                colspan="6"
                                class="py-4 px-6 text-center text-gray-500 dark:text-gray-400"
                            >
                                No data found
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <Pagination :links="links" />
        </div>
        <Modal :show="isModalWarning">
            <div class="p-4">
                <div class="flex justify-between">
                    <div class="flex gap-1 items-center">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6 text-red-500"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"
                            />
                        </svg>

                        <h1 class="text-lg font-bold">Confirmation</h1>
                    </div>

                    <button @click="hideCancelAppointment">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-4 h-4"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>
                <div class="my-2">
                    <p>
                        This action is not reversible.Are you sure you want to
                        delete this patient?
                    </p>
                </div>
                <div class="flex gap-2 items-center justify-end">
                    <button
                        type="button"
                        @click.prevent="hideShowWarning"
                        class="dark:text-gray-300 text-gray-700 dark:border-gray-800 border-2 rounded-lg py-1 px-4 hover:border-gray-900 hover:shadow-lg"
                    >
                        No
                    </button>
                    <button
                        type="submit"
                        @click.prevent="onDelete"
                        class="dark:text-gray-300 rounded-lg px-4 py-1 border-2 dark:border-gray-800 text-gray-50 hover:bg-blue-900 hover:dark:bg-gray-900 border-blue-500 hover:shadow-lg bg-blue-500 dark:bg-gray-800"
                    >
                        Yes
                    </button>
                </div>
            </div>
        </Modal>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Pagination from "@/Components/Pagination.vue";
import Modal from "@/Components/Modal.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import { reactive, watch, computed, ref } from "vue";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";
import { Inertia } from "@inertiajs/inertia";
const props = defineProps({
    clients: {
        type: Object,
        default: {},
    },
    filters: {
        type: Object,
        default: {},
    },
});
const params = reactive({
    search: props.filters.search,
});

const data = computed(() => props.clients.data);
const links = computed(() => props.clients.links);
const isModalWarning = ref(false);
const clientId = ref(null);

const showWarning = (id) => {
    isModalWarning.value = true;
    clientId.value = id;
};

const hideShowWarning = () => {
    isModalWarning.value = false;
    clientId.value = null;
};

const onDelete = () => {
    Inertia.delete(route("admin.client.destroy", clientId.value), {
        onSuccess: () => {
            hideShowWarning();
        },
    });
};

watch(
    () => params,
    (value) => {
        // throttle
        throttle(() => {
            let filter = pickBy(value);
            console.log(value);
            Inertia.get(route("admin.client.index"), filter, {
                replace: true,
                preserveState: true,
            });
        }, 300)();
    },
    { deep: true }
);
</script>

<style lang="scss" scoped></style>
