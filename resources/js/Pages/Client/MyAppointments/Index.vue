<template>
    <ClientLayout>
        <div class="max-w-5xl mx-auto pt-20 pb-20">
            <div class="w-full">
                <div class="mb-4">
                    <h1
                        class="dark:text-gray-300 text-gray-700 font-bold text-lg"
                    >
                        My Appointments
                    </h1>
                    <p class="text-gray-500">
                        These are the list of you've created appointments
                    </p>
                </div>

                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table
                        class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                    >
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                        >
                            <tr>
                                <th scope="col" class="py-3 px-6">ID</th>
                                <th scope="col" class="py-3 px-6">Name</th>
                                <th scope="col" class="py-3 px-6">Dentist</th>
                                <th scope="col" class="py-3 px-6">Schedule</th>
                                <th scope="col" class="py-3 px-6">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-if="appointments.length > 0"
                                v-for="appointment in appointments"
                                key="appointment.id"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                            >
                                <th
                                    scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                >
                                    {{ appointment.id }}
                                </th>
                                <td class="py-4 px-6">
                                    {{ appointment.name }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ appointment.dentist.name }}
                                </td>
                                <td class="py-4 px-6">
                                    <!-- convert to date time using moment js-->
                                    {{
                                        moment(appointment.schedule).format(
                                            "MMMM Do YYYY, h:mm:ss a"
                                        )
                                    }}
                                </td>
                                <td class="py-4 px-6">
                                    <div
                                        class="flex items-center first-letter:uppercase justify-center font-bold rounded-xl"
                                        :class="{
                                            'bg-green-200 text-green-700':
                                                appointment.status ===
                                                'approved',
                                            'bg-red-200 text-red-700':
                                                appointment.status ===
                                                'rejected',
                                            'bg-yellow-200 text-yellow-700 ':
                                                appointment.status ===
                                                'pending',
                                        }"
                                    >
                                        {{ appointment.status }}
                                    </div>
                                </td>
                            </tr>
                            <tr v-else>
                                <td
                                    colspan="5"
                                    class="py-4 px-6 text-center text-gray-500"
                                >
                                    No appointments found
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </ClientLayout>
</template>

<script setup>
import ClientLayout from "@/Layouts/ClientLayout.vue";
import moment from "moment";
defineProps({
    appointments: {
        type: Array,
        default: [],
    },
});
</script>

<style></style>
