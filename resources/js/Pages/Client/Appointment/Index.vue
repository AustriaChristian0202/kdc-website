<template>
    <ClientLayout>
        <main
            class="w-full p-3 pt-[80px] lg:h-screen lg:flex flex-col items-center"
        >
            <div
                class="bg-slate-200 w-full mb-5 p-3 rounded-lg border border-slate-200 dark:bg-slate-700 dark:border-slate-600 hover:shadow-2xl dark:hover:bg-slate-800 dark:hover:border-slate-50 hover:bg-slate-400 hover:border-slate-500 transition-all lg:w-1/2"
            >
                <p>Current appointment</p>
            </div>

            <div
                class="bg-slate-200 w-full mb-5 p-3 rounded-lg border border-slate-200 dark:bg-slate-700 dark:border-slate-600 hover:shadow-2xl dark:hover:bg-slate-800 dark:hover:border-slate-50 hover:bg-slate-400 hover:border-slate-500 transition-all lg:w-1/2"
            >
                <p class="text-center mb-5">APPOINTMENT FORM</p>
                <form action="" method="POST">
                    <input
                        type="text"
                        name="appointment_name"
                        placeholder="Name"
                        required
                        class="bg-slate-50 w-full mt-5 mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all"
                    />
                    <input
                        type="text"
                        name="appointment_age"
                        placeholder="Age"
                        required
                        class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all"
                    />
                    <select
                        name=""
                        id=""
                        class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all appearance-none"
                    >
                        <option value="">Sex</option>
                        <option value="">Male</option>
                        <option value="">Femal</option>
                        <option value="">Intersex</option>
                    </select>
                    <select
                        name=""
                        id=""
                        class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all appearance-none"
                    >
                        <option value="">Service</option>
                        <option value="">Consultation</option>
                        <option value="">Teeth Whitening</option>
                        <option value="">Teeth Cleaning</option>
                        <option value="">Orthodontic Treatment</option>
                        <option value="">Modern Dentistry Services</option>
                        <option value="">Teeth/Dental Bonding</option>
                        <option value="">Cosmetic Fillings</option>
                        <option value="">Dentures</option>
                        <option value="">Root Canal Therapy</option>
                    </select>
                    <select
                        name=""
                        id=""
                        class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all appearance-none"
                    >
                        <option value="">Dentist</option>
                        <option value="">Dr. Raymond S. Kasilag</option>
                        <option value="">Dr. Desiree Z. Kasilag</option>
                        <option value="">Dr. Mark S. Kasilag</option>
                    </select>
                    <input
                        type="datetime-local"
                        name="appointment_date"
                        placeholder="Date"
                        required
                        class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all"
                    />

                    <div class="w-full flex justify-end">
                        <button
                            class="bg-blue-500 text-slate-50 mt-16 w-1/2 py-3 rounded-lg font-medium outline outline-1 outline-blue-600 hover:bg-blue-600 hover:outline-blue-700 hover:shadow-lg dark:bg-blue-400 dark:text-slate-900 dark:outline-blue-300 dark:hover:bg-blue-500 dark:hover:outline-blue-400 dark:hover:text-slate-800 transition-all"
                        >
                            Sign in
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </ClientLayout>
</template>

<script setup>
import ClientLayout from "@/Layouts/ClientLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import { reactive } from "vue";

const form = reactive({
    name: "",
    age: "",
    sex: "",
    service: "",
    dentist: "",
    date: "",
});

const submit = () => {
    Inertia.post("");
};
</script>

<style lang="scss" scoped></style>
