<template>
    <ClientLayout>
        <main class="bg-slate-50 w-full p-3 pt-[80px] lg:flex flex-col items-center">
            <div
                class="bg-slate-200 w-full mb-5 p-3 rounded-lg border border-slate-300 dark:bg-slate-700 dark:border-slate-600 hover:shadow-2xl dark:hover:bg-slate-800 dark:hover:border-slate-50 hover:bg-slate-400 hover:border-slate-500 transition-all lg:w-1/2">
                <p class="text-center mb-5 uppercase">Active appointment</p>
                <p class="w-full truncate mt-2">Name:
                    <span class="text-slate-600 dark:text-slate-300">Lorem, ipsum dolor.</span>
                </p>
                <p class="w-full truncate mt-2">Age:
                    <span class="text-slate-600 dark:text-slate-300">Lorem, ipsum dolor.</span>
                </p>
                <p class="w-full truncate mt-2">Service:
                    <span class="text-slate-600 dark:text-slate-300">Lorem, ipsum dolor.</span>
                </p>
                <p class="w-full truncate mt-2">Schedule:
                    <span class="text-slate-600 dark:text-slate-300">Lorem, ipsum dolor.</span>
                </p>
                <p class="w-full truncate mt-2">Dentist:
                    <span class="text-slate-600 dark:text-slate-300">Lorem, ipsum dolor.</span>
                </p>
                <p class="w-full truncate mt-2">Status:
                    <span class="text-slate-600 dark:text-slate-300">Lorem, ipsum dolor.</span>
                </p>
            </div>

            <div
                class="bg-slate-200 w-full mt-16 mb-5 p-3 rounded-lg border border-slate-300 dark:bg-slate-700 dark:border-slate-600 hover:shadow-2xl dark:hover:bg-slate-800 dark:hover:border-slate-50 hover:bg-slate-400 hover:border-slate-500 transition-all lg:w-1/2">
                <p class="text-center mb-5 uppercase">Appointment form</p>
                <form @submit.prevent="submit" method="POST">
                    <input type="text" name="appointment_name" placeholder="Name" v-model="form.name" required
                        class="bg-slate-50 w-full mt-5 mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all" />
                    <InputError :message="form.errors.name" />
                    <input type="text" name="appointment_age" placeholder="Age" v-model="form.age" required
                        class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all" />
                    <InputError :message="form.errors.age" />
                    <input type="text" name="contact" placeholder="Contact Number" v-model="form.contact" required
                        class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all" />
                    <InputError :message="form.errors.contact" />
                    <select name="" id="" v-model="form.sex"
                        class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all appearance-none">
                        <option value="">Sex</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <InputError :message="form.errors.sex" />
                    <select name="" id="" v-model="form.service"
                        class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all appearance-none">
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
                    <select name="" id="" v-model="form.dentist"
                        class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all appearance-none">
                        <option value="">Dentist</option>
                        <option v-for="dentist in dentists" :value="dentist.id">
                            {{ dentist.name }}
                        </option>
                    </select>
                    <InputError :message="form.errors.dentist" />
                    <input type="datetime-local" name="appointment_date" placeholder="Date" v-model="form.date" required
                        class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all" />
                    <InputError :message="form.errors.date" />

                    <div class="w-full flex justify-end">
                        <button
                            class="bg-blue-500 text-slate-50 mt-16 w-1/2 py-3 rounded-lg font-bold outline outline-1 outline-blue-600 hover:bg-blue-600 hover:outline-blue-700 hover:shadow-lg dark:bg-blue-400 dark:text-slate-900 dark:outline-blue-300 dark:hover:bg-blue-500 dark:hover:outline-blue-400 dark:hover:text-slate-800 transition-all uppercase">
                            Submit
                        </button>
                    </div>
                </form>
            </div>

            <div
                class="bg-slate-200 w-full mt-16 mb-5 p-3 rounded-lg border border-slate-300 dark:bg-slate-700 dark:border-slate-600 hover:shadow-2xl dark:hover:bg-slate-800 dark:hover:border-slate-50 hover:bg-slate-400 hover:border-slate-500 transition-all lg:w-1/2">
                <p class="text-center mb-5 uppercase">Appointment history</p>
                <p class="w-full truncate mt-2">Date:
                    <span class="text-slate-600 dark:text-slate-300">Lorem, ipsum dolor.</span>
                </p>
            </div>
        </main>
    </ClientLayout>
</template>

<script setup>
import ClientLayout from "@/Layouts/ClientLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import { reactive } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import InputError from "@/Components/InputError.vue";

defineProps({
    dentists: {
        type: Array,
        default: [],
    },
});

const form = useForm({
    name: "",
    age: "",
    sex: "",
    service: "",
    dentist: "",
    date: "",
    contact: "",
});

const submit = () => {
    form.post(route("client.appointment.store"), {
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>

<style lang="scss" scoped>

</style>
