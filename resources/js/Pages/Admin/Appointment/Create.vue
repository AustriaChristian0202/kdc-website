<template>
    <AdminLayout>
        <head title="Create Appointment" />
        <main
            class="bg-slate-50 w-full p-3 pt-[80px] lg:flex flex-col items-center dark:bg-slate-900"
        >
            <div
                class="bg-slate-200 w-full mt-2 mb-5 p-3 rounded-lg border border-slate-300 dark:bg-slate-700 dark:border-slate-600 hover:shadow-2xl dark:hover:bg-slate-800 dark:hover:border-slate-50 hover:bg-slate-400 hover:border-slate-500 transition-all lg:w-1/2"
            >
                <p class="text-center mb-5 uppercase">Appointment form</p>
                <form @submit.prevent="submit" method="POST">
                    <input
                        type="text"
                        name="appointment_name"
                        placeholder="Name"
                        v-model="form.name"
                        required
                        class="bg-slate-50 w-full mt-5 mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all"
                    />
                    <InputError :message="form.errors.name" />
                    <input
                        type="number"
                        name="appointment_age"
                        placeholder="Age"
                        v-model="form.age"
                        required
                        class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all"
                    />
                    <InputError :message="form.errors.age" />
                    <input
                        type="number"
                        name="contact"
                        placeholder="Contact Number"
                        v-model="form.contact"
                        required
                        class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all"
                    />
                    <InputError :message="form.errors.contact" />
                    <select
                        name=""
                        id=""
                        v-model="form.sex"
                        class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all appearance-none"
                    >
                        <option value="">Sex</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <InputError :message="form.errors.sex" />
                    <select
                        name=""
                        id=""
                        v-model="form.service"
                        class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all appearance-none"
                    >
                        <option value="">Service</option>
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
                    <InputError :message="form.errors.service" />
                    <select
                        name=""
                        id=""
                        v-model="form.dentist"
                        class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all appearance-none"
                    >
                        <option value="">Dentist</option>
                        <option v-for="dentist in dentists" :value="dentist.id">
                            {{ dentist.name }}
                        </option>
                    </select>
                    <InputError :message="form.errors.dentist" />

                    <div class="my-2 dark:text-gray-300 text-gray-700">
                        <h1>Please Choose the date and time</h1>
                    </div>

                    <FullCalendar :options="calendarOptions" />
                    <InputError :message="form.errors.date" />
                    <div
                        v-if="!isLoading && !isSunday"
                        class="flex my-4 flex-wrap gap-1 items-center justify-center"
                    >
                        <!-- loop time every hour from 9pm to 5pm -->
                        <div
                            v-for="time in times"
                            :key="time"
                            class="w-1/3 md:w-1/4 lg:w-1/6"
                        >
                            <!-- disable if not available -->
                            <button
                                type="button"
                                :disabled="
                                    unavailableAppointments.some(
                                        (e) => e.schedule === time.value
                                    )
                                "
                                class="w-full disabled:bg-red-100 disabled:text-red-900 dark:disabled:bg-red-800 dark:disabled:text-red-300 mb-2 py-2 rounded-lg dark:hover:bg-slate-400 hover:bg-blue-200"
                                :class="{
                                    'bg-slate-50 dark:bg-slate-500':
                                        !isTimeSelected(time.value),
                                    'bg-blue-500 text-white dark:bg-slate-900':
                                        isTimeSelected(time.value),
                                }"
                                @click="selectTime(time.value)"
                            >
                                {{ time.text }}
                            </button>
                        </div>
                    </div>
                    <div v-else class="flex items-center justify-center my-4">
                        <svg
                            aria-hidden="true"
                            class="mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                            viewBox="0 0 100 101"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor"
                            />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentFill"
                            />
                        </svg>
                        <span class="sr-only">Loading...</span>
                    </div>

                    <InputError :message="form.errors.time" />
                    <div v-if="isSunday" class="mb-4">
                        <div
                            class="flex gap-2 items-center my-2 bg-blue-200 py-3 px-4 rounded-lg dark:text-text-900 text-blue-700"
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

                            <h1>
                                We are closed on Sunday, please choose another
                                date
                            </h1>
                        </div>
                    </div>

                    <div class="mt-2">
                        <p class="dark:text-gray-300 text-gray-700">
                            Selected Schedule:
                            <span
                                v-if="form.date"
                                class="font-bold rounded-lg text-gray-300 bg-gray-900 px-2 py-1"
                                >{{ `${form.date} ${form.time}` }}</span
                            >
                        </p>
                    </div>
                    <div class="w-full flex justify-end">
                        <button
                            type="submit"
                            class="flex gap-2 items-center justify-center dark:bg-slate-800 bg-blue-500 text-slate-50 mt-5 py-2 px-8 rounded-lg font-bold outline outline-1 outline-blue-600 hover:bg-blue-600 hover:outline-blue-700 hover:shadow-lg dark:text-gray-200 dark:outline-gray-300 dark:hover:bg-gray-500 dark:hover:outline-gray-400 dark:hover:text-slate-800 transition-all uppercase"
                        >
                            <span>Proceed</span>
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
                                    d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"
                                />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import { reactive, ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import InputError from "@/Components/InputError.vue";
import "@fullcalendar/core/vdom"; // solves problem with Vite
import FullCalendar from "@fullcalendar/vue3";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import Modal from "@/Components/Modal.vue";
import axios from "axios";
import { Head } from "@inertiajs/inertia-vue3";

defineProps({
    dentists: {
        type: Array,
        default: [],
    },
    today: {
        type: Object,
        default: {},
    },
});

const calendarOptions = {
    plugins: [dayGridPlugin, interactionPlugin],
    initialView: "dayGridMonth",
    selectable: true,
    dateClick: async ({ dateStr }) => {
        // check if the date is sunday
        const date = new Date(dateStr);
        if (date.getDay() === 0) {
            isSunday.value = true;
            return;
        }
        // if date is less than now
        if (date < new Date()) {
            return;
        }

        isSunday.value = false;
        form.date = dateStr;
        isLoading.value = true;
        unavailableAppointments.value = await fetchAppointments(dateStr);
        isLoading.value = false;
        console.log(unavailableAppointments.value);
    },
};

const isSunday = ref(false);

const form = useForm({
    name: "",
    age: "",
    sex: "",
    service: "",
    dentist: "",
    date: "",
    time: "",
    contact: "",
});

const submit = () => {
    form.post(route("admin.appointment.store"), {
        onSuccess: () => {
            form.reset();
        },
    });
};

const isTimeSelected = (selectedTime) => {
    // check if it was the time selected
    return form.time === selectedTime;
};

const unavailableAppointments = ref([]);
const isLoading = ref(false);

const fetchAppointments = async (date) => {
    const res = await axios.get(
        route("client.appointment-selected-date", date)
    );
    return res.data;
};

const times = reactive([
    { value: "09:00", text: "9:00 AM" },
    { value: "10:00", text: "10:00 AM" },
    { value: "11:00", text: "12:00 AM" },
    { value: "13:00", text: "01:00 PM" },
    { value: "14:00", text: "02:00 PM" },
    { value: "15:00", text: "03:00 PM" },
    { value: "16:00", text: "04:00 PM" },
    { value: "17:00", text: "05:00 PM" },
]);

const selectTime = (selectedTime) => {
    form.time = selectedTime;
};
</script>

<style lang="scss" scoped></style>
