<template>
    <ClientLayout>
        <main
            class="bg-slate-50 w-full p-3 pt-[80px] lg:flex flex-col items-center dark:bg-slate-900"
        >
            <div
                class="bg-slate-200 w-full mb-5 p-3 rounded-lg border border-slate-300 dark:bg-slate-700 dark:border-slate-600 hover:shadow-2xl dark:hover:bg-slate-800 dark:hover:border-slate-50 hover:bg-slate-400 hover:border-slate-500 transition-all lg:w-1/2"
            >
                <div v-if="today">
                    <p class="text-center mb-5 uppercase">Active appointment</p>
                    <p class="w-full truncate mt-2">
                        Name:
                        <span class="text-slate-600 dark:text-slate-300">{{
                            today.name
                        }}</span>
                    </p>
                    <p class="w-full truncate mt-2">
                        Age:
                        <span class="text-slate-600 dark:text-slate-300">{{
                            today.age
                        }}</span>
                    </p>
                    <p class="w-full truncate mt-2">
                        Contact Number:
                        <span class="text-slate-600 dark:text-slate-300">{{
                            today.contact
                        }}</span>
                    </p>
                    <p class="w-full truncate mt-2">
                        Sex:
                        <span class="text-slate-600 dark:text-slate-300">{{
                            today.sex
                        }}</span>
                    </p>
                    <p class="w-full truncate mt-2">
                        Service:
                        <span class="text-slate-600 dark:text-slate-300">{{
                            today.service
                        }}</span>
                    </p>
                    <p class="w-full truncate mt-2">
                        Schedule:
                        <span class="text-slate-600 dark:text-slate-300">{{
                            today.schedule
                        }}</span>
                    </p>
                    <p class="w-full truncate mt-2">
                        Dentist:
                        <span class="text-slate-600 dark:text-slate-300">{{
                            today.dentist.name
                        }}</span>
                    </p>
                    <p class="w-full truncate mt-2">
                        Status:
                        <span class="text-slate-600 dark:text-slate-300">{{
                            today.status
                        }}</span>
                    </p>
                </div>
                <div v-else>
                    <p class="text-center mb-5 uppercase">
                        No active appointment
                    </p>
                </div>
            </div>

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
                    <input
                        type="time"
                        name="time"
                        placeholder="time"
                        v-model="form.time"
                        required
                        class="bg-slate-50 mt-4 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all"
                    />

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
                            type="button"
                            @click.prevent="isModalShow = true"
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
                    <Modal :show="isModalShow">
                        <div class="p-4 text-gray-700 dark:text-gray-300">
                            <div>
                                <h1 class="text-xl font-bold">Terms of Use</h1>
                            </div>
                            <div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Veniam voluptatibus in est
                                    ipsam accusamus voluptatum asperiores soluta
                                    ab expedita aspernatur explicabo magnam
                                    temporibus exercitationem autem at
                                    blanditiis praesentium, facere quaerat?
                                </p>
                                <p class="mt-2">
                                    By Clicking the
                                    <span class="font-bold">"Submit"</span>
                                    button, you agree to the terms of use.
                                </p>
                                <div
                                    class="flex gap-2 items-center justify-end"
                                >
                                    <button
                                        type="button"
                                        @click.prevent="isModalShow = false"
                                        class="dark:text-gray-300 text-gray-700 dark:border-gray-800 border-2 rounded-lg py-1 px-4 hover:border-gray-900 hover:shadow-lg"
                                    >
                                        Cancel
                                    </button>
                                    <button
                                        type="submit"
                                        @click.prevent="submit"
                                        class="dark:text-gray-300 rounded-lg px-4 py-1 border-2 dark:border-gray-800 text-gray-50 hover:bg-blue-900 hover:dark:bg-gray-900 border-blue-500 hover:shadow-lg bg-blue-500 dark:bg-gray-800"
                                    >
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </Modal>
                </form>
            </div>
        </main>
    </ClientLayout>
</template>

<script setup>
import ClientLayout from "@/Layouts/ClientLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import { reactive, ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import InputError from "@/Components/InputError.vue";
import "@fullcalendar/core/vdom"; // solves problem with Vite
import FullCalendar from "@fullcalendar/vue3";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import Modal from "@/Components/Modal.vue";

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
    dateClick: ({ dateStr }) => {
        // check if the date is sunday
        const date = new Date(dateStr);
        if (date.getDay() === 0) {
            isSunday.value = true;
            return;
        }
        isSunday.value = false;
        form.date = dateStr;
    },
};

const isSunday = ref(false);
const isModalShow = ref(false);

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
    form.post(route("client.appointment.store"), {
        onSuccess: () => {
            form.reset();
            Inertia.reload();
        },
        onFinish: () => {
            isModalShow.value = false;
        },
    });
};
</script>

<style lang="scss" scoped></style>
