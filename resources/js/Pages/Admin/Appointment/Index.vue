<template>
    <AdminLayout>
        <div class="mt-14 w-full">
            <div class="max-w-7xl mx-auto pt-14">
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <div
                        class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900 p-4"
                    >
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
                                class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search for items"
                                v-model="params.search"
                            />
                        </div>
                        <div class="mt-1">
                            <label for="table-branch" class="sr-only"
                                >Status</label
                            >
                            <select
                                v-model="params.status"
                                class="bg-gray-50 border dark:text-gray-300 border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                                <option selected :value="null">
                                    Choose Status
                                </option>
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                            </select>
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
                                <th scope="col" class="py-3 px-6">Name</th>
                                <th scope="col" class="py-3 px-6">Age</th>
                                <th scope="col" class="py-3 px-6">Service</th>
                                <th scope="col" class="py-3 px-6">Dentist</th>
                                <th scope="col" class="py-3 px-6">
                                    Appointment Date
                                </th>
                                <th scope="col" class="py-3 px-6">Status</th>
                                <th scope="col" class="py-3 px-6">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-if="data.length > 0"
                                v-for="item in data"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                            >
                                <td class="py-4 px-6">
                                    {{ item.id }}
                                </td>
                                <th
                                    scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                >
                                    {{ item.name }}
                                </th>
                                <td class="py-4 px-6">{{ item.age }}</td>
                                <td class="py-4 px-6">{{ item.service }}</td>
                                <td class="py-4 px-6">
                                    {{ item.dentist.name }}
                                </td>
                                <td class="py-4 px-6">
                                    <!-- convert to date time using moment js-->
                                    {{
                                        moment(item.schedule).format(
                                            "MMMM Do YYYY, h:mm:ss a"
                                        )
                                    }}
                                </td>
                                <td class="py-4 px-6">
                                    <div
                                        class="flex items-center first-letter:uppercase justify-center font-bold rounded-xl"
                                        :class="{
                                            'bg-green-200 text-green-700':
                                                item.status === 'approved',
                                            'bg-red-200 text-red-700':
                                                item.status === 'rejected',
                                            'bg-yellow-100 text-yellow-700 ':
                                                item.status === 'pending',
                                        }"
                                    >
                                        {{ item.status }}
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex gap-2">
                                        <button
                                            @click="
                                                onStatusChange(
                                                    'rejected',
                                                    item.id
                                                )
                                            "
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-6 h-6 hover:text-red-500"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                />
                                            </svg>
                                        </button>
                                        <button
                                            @click="
                                                onStatusChange(
                                                    'approved',
                                                    item.id
                                                )
                                            "
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-6 h-6 hover:text-green-500"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr v-else>
                                <td
                                    colspan="8"
                                    class="justify-center py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-gray-200"
                                >
                                    <div
                                        class="w-full gap-2 flex items-center justify-center"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="w-6 h-6 -translate-y-2 animate-bounce ease-in duration-150"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"
                                            />
                                        </svg>

                                        No data found
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <Pagination :links="link" />
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { computed } from "vue";
import Pagination from "@/Components/Pagination.vue";
import { Inertia } from "@inertiajs/inertia";
import { reactive, watch } from "vue";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";
import moment from "moment";
const props = defineProps({
    // props
    appointments: {
        type: Object,
        default: () => {},
    },
    filters: {
        type: Object,
        default: () => {},
    },
});

// computed
const data = computed(() => props.appointments.data);
const link = computed(() => props.appointments.links);

const onStatusChange = (status, id) => {
    Inertia.post(route("admin.appointment.status-change"), {
        status,
        id,
    });
};

const params = reactive({
    search: props.filters.search,
    status: props.filters.status,
});

// watch params on change
watch(
    () => params,
    (value) => {
        // throttle
        throttle(() => {
            let filter = pickBy(value);
            console.log(value);
            Inertia.get(route("admin.appointment.index"), filter, {
                replace: true,
                preserveState: true,
            });
        }, 300)();
    },
    { deep: true }
);
</script>

<style lang="scss" scoped></style>
