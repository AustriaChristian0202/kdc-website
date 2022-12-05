<template>
    <AdminLayout>
        <Head title="Appointment Reports" />
        <div class="mt-16 w-full max-w-7xl mx-auto mb-8">
            <Tabs />
            <div class="mt-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg"
                >
                    <div class="px-4 py-5 sm:px-6">
                        <h3
                            class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-200"
                        >
                            Appointment Reports
                        </h3>
                        <p
                            class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-400"
                        >
                            List of all appointment reports.
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="flex mt-4 justify-center flex-wrap items-center gap-2 pb-4 p-4 bg-white dark:bg-gray-900"
            >
                <div>
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
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
                            v-model="params.search"
                            id="table-search"
                            class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for items"
                        />
                    </div>
                </div>
                <div>
                    <label
                        for="countries"
                        class="sr-only block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"
                        >Select an option</label
                    >
                    <select
                        id="status"
                        v-model="params.status"
                        class="bg-gray-50 border w-36 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >
                        <option value="null">Choose Status</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                        <option value="cancelled">Cancelled</option>
                        <option value="rescheduled">Rescheduled</option>
                    </select>
                </div>
                <div>
                    <label
                        for="countries"
                        class="sr-only block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"
                        >Select an option</label
                    >
                    <select
                        id="status"
                        v-model="params.service"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >
                        <option value="null">Choose Service</option>
                        <option value="Consultation">Consultation</option>
                        <option value="Teeth Whitening">Teeth Whitening</option>
                        <option value="Teeth Cleaning">Teeth Cleaning</option>
                        <option value="Orthodontic Treatment">
                            Orthodontic Treatment
                        </option>
                        <option value="Modern Dentistry Services">
                            Modern Dentistry Services
                        </option>
                        <option value="Teeth/Dental Bonding">
                            Teeth/Dental Bonding
                        </option>
                        <option value="Cosmetic Fillings">
                            Cosmetic Fillings
                        </option>
                        <option value="Dentures">Dentures</option>
                        <option value="Root Canal Therapy">
                            Root Canal Therapy
                        </option>
                    </select>
                </div>
                <div class="flex items-center gap-2">
                    <!-- calender start -->
                    <div class="relative">
                        <label
                            for="date"
                            class="sr-only block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"
                            >Select an option</label
                        >
                        <input
                            type="date"
                            v-model="params.start_date"
                            id="start_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        />
                    </div>
                    <div>to</div>
                    <!-- calender end -->
                    <div class="relative">
                        <label
                            for="date"
                            class="sr-only block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"
                            >Select an option</label
                        >
                        <input
                            type="date"
                            v-model="params.end_date"
                            id="end_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        />
                    </div>
                </div>
                <div class="flex justify-between grow">
                    <button class="hover:text-red-500" @click="clearParams">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>
                    </button>
                    <div>
                        <a
                            class="flex items-center dark:hover:text-green-300 hover:text-green-500 justify-end gap-2 px-4 py-2 text-sm font-medium"
                            :href="
                                route('admin.report.appointment.export', params)
                            "
                            download
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"
                                />
                            </svg>

                            <span>Download Excel</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table
                    class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                >
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                    >
                        <tr>
                            <th scope="col" class="p-4">ID</th>
                            <th scope="col" class="py-3 px-6">Name & Email</th>
                            <th scope="col" class="py-3 px-6">Contact & Age</th>
                            <th scope="col" class="py-3 px-6">Dentist</th>
                            <th scope="col" class="py-3 px-6">Service</th>
                            <th scope="col" class="py-3 px-6">Schedule</th>
                            <th scope="col" class="py-3 px-6">
                                Cancellation / Rejection Reason
                            </th>
                            <th scope="col" class="py-3 px-6">Create At</th>
                            <th scope="col" class="py-3 px-6">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-if="data.length > 0"
                            v-for="appointment in data"
                            key="appointment.id"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                        >
                            <td class="p-4">
                                {{ appointment.id }}
                            </td>
                            <th
                                scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                <div class="flex gap-2 items-center">
                                    <img
                                        class="h-8 w-8 rounded-full object-cover"
                                        :src="
                                            appointment.client
                                                ?.profile_photo_url ??
                                            'https://ui-avatars.com/api/?name=' +
                                                appointment.name +
                                                '&color=7F9CF5&background=EBF4FF'
                                        "
                                        :alt="appointment.name"
                                    />
                                    <div>
                                        <p>{{ appointment.name }}</p>
                                        <p
                                            class="text-gray-500 dark:text-gray300"
                                        >
                                            {{
                                                appointment.client?.email ??
                                                "N/A"
                                            }}
                                        </p>
                                    </div>
                                </div>
                            </th>
                            <td class="py-4 px-6">
                                <div>
                                    <p>{{ appointment.contact }}</p>
                                    <p class="text-gray-500 dark:text-gray-300">
                                        {{ appointment.age }} yrs. old
                                    </p>
                                </div>
                            </td>

                            <td class="py-4 px-6">
                                {{ appointment.dentist.name }}
                            </td>
                            <td class="py-4 px-6">{{ appointment.service }}</td>

                            <td class="py-4 px-6">
                                {{
                                    moment(appointment.schedule).format(
                                        "MMMM DD,YYYY, h:mm a"
                                    )
                                }}
                            </td>
                            <td class="py-4 px-6">{{ appointment.reason }}</td>
                            <td class="py-4 px-6">
                                {{
                                    moment(appointment.created_at).format(
                                        "M-DD-YYYY, h:mm a"
                                    )
                                }}
                            </td>
                            <td class="py-4 px-6">
                                <div
                                    class="flex items-center px-2 first-letter:uppercase justify-center font-bold rounded-xl"
                                    :class="{
                                        'bg-green-200 text-green-700':
                                            appointment.status === 'approved',
                                        'bg-red-200 text-red-700':
                                            appointment.status === 'rejected' ||
                                            appointment.status === 'cancelled',
                                        'bg-yellow-100 text-yellow-700 ':
                                            appointment.status === 'pending' ||
                                            appointment.status ===
                                                'rescheduled',
                                    }"
                                >
                                    {{ appointment.status }}
                                </div>
                            </td>
                        </tr>
                        <tr v-else>
                            <td
                                colspan="9"
                                class="text-center py-8 px-6 text-sm text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                <div
                                    class="flex gap-2 items-center justify-center w-full"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="w-6 h-6"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"
                                        />
                                    </svg>

                                    <span>No data found</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <Pagination :links="links" />
        </div>
    </AdminLayout>
</template>

<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Tabs from "@/Pages/Admin/Report/Tabs.vue";
import Pagination from "@/Components/Pagination.vue";
import { computed, reactive, watch } from "vue";
import moment from "moment";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    appointments: {
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
    status: props.filters.status,
    service: props.filters.service,
    start_date: props.filters.start_date,
    end_date: props.filters.end_date,
});

const clearParams = () => {
    params.search = null;
    params.status = null;
    params.service = null;
    params.start_date = null;
    params.end_date = null;
};

const data = computed(() => {
    return props.appointments.data;
});
const links = computed(() => {
    return props.appointments.links;
});

// watch params on change
watch(
    () => params,
    (value) => {
        // throttle
        throttle(() => {
            let filter = pickBy(value);
            console.log(value);
            Inertia.get(route("admin.report.appointment.index"), filter, {
                replace: true,
                preserveState: true,
            });
        }, 300)();
    },
    { deep: true }
);
</script>

<style lang="scss" scoped></style>
