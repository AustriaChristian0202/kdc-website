<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Services from "./Services.vue";
import NavBar from "./NavBar.vue";
import Sidebar from "./Sidebar.vue";
import About from "./About.vue";
import Contact from "./Contact.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />
    <div
        class="m-0 p-0 bg-fixed bg-cover bg-center bg-no-repeat transition-all text-sm bg-slate-50 text-slate-900 dark:bg-slate-900 dark:text-slate-50 md:text-base"
        style="background-image: url('resources/facade.jpg')"
    >
        <NavBar />
        <!-- <Sidebar /> -->

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
                    <p class="text-slate-200 italic md:text-lg lg:text-2xl">
                        Renew your smile
                    </p>
                    <a href="">
                        <button
                            class="bg-blue-500 text-slate-50 text-base font-medium mt-4 px-5 py-3 rounded-lg dark:bg-blue-400 dark:text-slate-900 outline outline-1 outline-blue-300 hover:shadow-2xl dark:hover:outline-blue-400 dark:hover:bg-blue-500 transition-all"
                        >
                            Create an appointment
                        </button>
                    </a>
                </div>
            </section>

            <div class="backdrop-blur-sm">
                <Services />
                <About />
                <Contact />
            </div>
        </main>
    </div>
</template>
