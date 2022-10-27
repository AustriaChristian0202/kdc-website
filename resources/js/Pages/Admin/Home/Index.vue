<template>
    <AdminLayout>
        <main class="w-full p-3 pt-[80px]">
            <div class="w-full gap-4 md:flex block">
                <div class="w-full mb-5 flex gap-2">
                    <div
                        class="bg-blue-300 w-1/2 p-3 rounded-lg flex items-center justify-between border border-blue-400 hover:shadow-lg dark:bg-blue-200 dark:text-slate-900 dark:border-blue-300 transition-all"
                    >
                        <p class="font-bold">
                            Today's<br />
                            appointments
                        </p>
                        <p class="text-7xl font-bold font-mono">
                            {{ props.todaysAppointment }}
                        </p>
                    </div>
                    <div
                        class="bg-orange-300 w-1/2 p-3 rounded-lg flex items-center justify-between border border-orange-400 hover:shadow-lg dark:bg-orange-200 dark:text-slate-900 dark:border-orange-300 transition-all"
                    >
                        <p class="font-bold">Pending <br />appointments</p>
                        <p class="text-7xl font-bold font-mono">
                            {{ props.remainingAppointments }}
                        </p>
                    </div>
                </div>

                <div
                    class="bg-slate-100 w-full mb-5 p-3 rounded-lg border border-slate-200 hover:shadow-lg dark:bg-slate-700 dark:border-slate-600 transition-all"
                >
                    <p class="mb-2">Your next appointment:</p>
                    <div
                        v-if="nextAppointment"
                        class="bg-slate-200 w-full px-3 py-2 rounded-lg text-left dark:bg-slate-600 dark:text-slate-300"
                        id="next-appointment-trigger"
                    >
                        <div class="w-full flex justify-between">
                            <p class="max-w-[70%] text-xl font-medium truncate">
                                {{ nextAppointment.name }}
                            </p>
                            <p class="text-xl font-medium">
                                {{
                                    moment(nextAppointment.schedule).format(
                                        "h:mm a"
                                    )
                                }}
                            </p>
                        </div>
                        <p class="italic">{{ nextAppointment.service }}</p>
                    </div>
                    <div v-else>
                        <p class="text-sm italic text-gray-500">
                            No upcoming appointments
                        </p>
                    </div>
                </div>
            </div>
            <Calendar />
        </main>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import moment from "moment";
import Calendar from "./Calendar.vue";

const props = defineProps({
    todaysAppointment: {
        type: Number,
        default: 0,
    },
    remainingAppointments: {
        type: Number,
        default: 0,
    },
    nextAppointment: {
        type: Object,
        default: {},
    },
});
</script>

<style lang="scss" scoped></style>
