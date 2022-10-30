<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Services from "./Services.vue";
import NavBar from "./NavBar.vue";
import Sidebar from "./Sidebar.vue";
import About from "./About.vue";
import Contact from "./Contact.vue";
import HomeLayout from "../../Layouts/HomeLayout.vue";
import RServices from "./RServices.vue";
import Dentist from "./Dentist.vue";
import Footer from "./Footer.vue";
import Contacts from "./Contacts.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    user: Object,
});
</script>

<template>
    <Head title="Welcome" />

    <HomeLayout>
        <div
            class="m-0 p-0 bg-fixed bg-cover bg-center bg-no-repeat transition-all text-sm bg-slate-50 text-slate-900 dark:bg-slate-900 dark:text-slate-50 md:text-base"
            style="background-image: url('resources/facade.jpg')"
        >
            <main
                class="w-full h-full m-0 p-0 pb-10 bg-gradient-to-tr from-slate-900/40 via-slate-700/90 to-slate-400/40"
            >
                <!-- Home -->
                <section
                    class="w-full h-screen px-[30px] pt-[300px] md:px-[100px] md:pt-[400px] lg:px-[200px] lg:pt-[400px]"
                    id="home"
                >
                    <div class="w-full md:w-[60%] lg:w-full">
                        <p
                            class="text-slate-100 text-3xl font-bold md:text-4xl lg:text-5xl"
                        >
                            Kasilag Dental Clinic
                        </p>
                        <p
                            class="mb-2 text-slate-200 italic md:text-lg lg:text-2xl"
                        >
                            Renew your smile
                        </p>

                        <Link
                            :href="
                                user
                                    ? user?.role !== 'admin'
                                        ? route('client.appointment.index')
                                        : route('admin.appointment.create')
                                    : route('auth.sign-in')
                            "
                            class="border-white border-2 rounded-lg px-3 py-2 text-white hover:bg-blue-700 hover:text-slate-50 transition-all"
                        >
                            Create an appointment
                        </Link>
                    </div>
                </section>

                <div class="backdrop-blur-sm">
                    <RServices />
                    <Dentist />
                    <About />
                    <Contacts />
                </div>
            </main>
            <Footer />
        </div>
    </HomeLayout>
</template>
