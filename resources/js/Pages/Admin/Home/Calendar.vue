<script setup>
import "@fullcalendar/core/vdom"; // solves problem with Vite
import FullCalendar from "@fullcalendar/vue3";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import { onMounted, ref } from "vue";
import moment from "moment";

onMounted(async () => {
    const data = await fetchAppointments();
    appointments.value = data;
});

const fetchAppointments = async (date = null) => {
    const res = await axios.get(route("admin.appointment.by-date", date));
    return res.data;
};

const appointments = ref([]);
const date = ref(moment().format("YYYY-MM-DD"));

const calendarOptions = {
    plugins: [dayGridPlugin, interactionPlugin],
    initialView: "dayGridMonth",
    events: appointments.value,
    dateClick: async ({ dateStr }) => {
        date.value = dateStr;
        appointments.value = await fetchAppointments(dateStr);
    },
    selectable: true,
};
</script>
<template>
    <div class="w-full gap-4 md:flex block">
        <div class="w-full">
            <FullCalendar :options="calendarOptions" />
        </div>
        <div class="w-full">
            <div class="dark:text-gray-300 text-gray-700 mb-4">
                <h1 class="text-lg font-bold">Appointment for {{ date }}</h1>
            </div>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table
                    class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                >
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                    >
                        <tr>
                            <th scope="col" class="py-3 px-6">Name</th>
                            <th scope="col" class="py-3 px-6">Dentist</th>
                            <th scope="col" class="py-3 px-6">Sched</th>
                            <th scope="col" class="py-3 px-6">Service</th>
                            <th scope="col" class="py-3 px-6">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-if="appointments.length > 0"
                            v-for="appointment in appointments"
                            :key="appointment.id"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                        >
                            <th
                                scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                {{ appointment.name }}
                            </th>
                            <td class="py-4 px-6">
                                {{ appointment.dentist.name }}
                            </td>
                            <td class="py-4 px-6">
                                {{
                                    moment(appointment.schedule).format(
                                        "MMMM DD, YYYY h:mm a"
                                    )
                                }}
                            </td>
                            <td class="py-4 px-6">{{ appointment.service }}</td>
                            <td class="py-4 px-6 text-right">
                                <div
                                    class="flex p-1 text-sm items-center first-letter:uppercase justify-center font-bold rounded-xl"
                                    :class="{
                                        'bg-green-200 text-green-700':
                                            appointment.status === 'approved',
                                        'bg-red-200 text-red-700':
                                            appointment.status === 'rejected',
                                        'bg-yellow-200 text-yellow-700 ':
                                            appointment.status === 'pending',
                                    }"
                                >
                                    {{ appointment.status }}
                                </div>
                            </td>
                        </tr>
                        <tr
                            v-else
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                        >
                            <td
                                colspan="5"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                No appointments for today
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
