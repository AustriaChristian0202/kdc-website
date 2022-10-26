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
                                <th scope="col" class="py-3 px-6">Action</th>
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
                                <td class="py-4 px-6">
                                    <div>
                                        <!-- cancel -->
                                        <!-- if schedule is today cannot cancel schedule-->
                                        <button
                                            v-if="
                                                appointment.status ===
                                                    'pending' &&
                                                moment(
                                                    appointment.schedule
                                                ).isAfter(moment())
                                            "
                                            @click="
                                                showCancelAppointment(
                                                    appointment.id
                                                )
                                            "
                                            class="bg-red-500 text-white rounded-lg px-2 py-1"
                                        >
                                            Cancel
                                        </button>
                                        <button
                                            v-else
                                            class="bg-red-100 text-white rounded-lg px-2 py-1"
                                        >
                                            Cancel
                                        </button>
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
        <Modal :show="isCancelShow">
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
                        cancel this appointment?
                    </p>
                </div>
                <div class="flex gap-2 items-center justify-end">
                    <button
                        type="button"
                        @click.prevent="hideCancelAppointment"
                        class="dark:text-gray-300 text-gray-700 dark:border-gray-800 border-2 rounded-lg py-1 px-4 hover:border-gray-900 hover:shadow-lg"
                    >
                        No
                    </button>
                    <button
                        type="submit"
                        @click.prevent="onCancel"
                        class="dark:text-gray-300 rounded-lg px-4 py-1 border-2 dark:border-gray-800 text-gray-50 hover:bg-blue-900 hover:dark:bg-gray-900 border-blue-500 hover:shadow-lg bg-blue-500 dark:bg-gray-800"
                    >
                        Yes
                    </button>
                </div>
            </div>
        </Modal>
    </ClientLayout>
</template>

<script setup>
import ClientLayout from "@/Layouts/ClientLayout.vue";
import Modal from "@/Components/Modal.vue";
import moment from "moment";
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
defineProps({
    appointments: {
        type: Array,
        default: [],
    },
});

const isCancelShow = ref(false);
const cancelAppointmentId = ref(null);

const showCancelAppointment = (id) => {
    isCancelShow.value = true;
    cancelAppointmentId.value = id;
};

const hideCancelAppointment = () => {
    isCancelShow.value = false;
    cancelAppointmentId.value = null;
};

const onCancel = () => {
    Inertia.delete(
        route("client.appointment.destroy", cancelAppointmentId.value),
        {
            preserveState: true,
            onSuccess: () => {
                hideCancelAppointment();
            },
        }
    );
};
</script>

<style></style>
