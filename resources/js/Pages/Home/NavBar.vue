<template>
    <header
        class="bg-slate-500 w-full h-[60px] grid place-items-center fixed top-0 left-0 z-20 dark:bg-slate-400 dark:border-slate-300">
        <nav class="bg-slate-500 w-full h-[40px] flex items-center justify-between dark:bg-slate-400">
            <div class="h-full ml-[15px] flex gap-1">
                <button class="h-full lg:hidden transition-all" id="sidebar-trigger">
                    <img src="resources/kebab-light-mode.png" alt="" class="h-2/3 inline dark:hidden lg:hidden" />
                    <img src="resources/kebab-dark-mode.png" alt="" class="h-2/3 hidden dark:inline lg:hidden" />
                </button>
                <a href="#home" class="h-full flex items-center gap-1 text-base font-bold uppercase">
                    <img src="resources/logo-large.png" alt="logo" class="h-full inline dark:hidden" />
                    <img src="resources/logo-large-dark-mode.png" alt="logo" class="h-full hidden dark:inline" />
                    <p class="text-slate-50 hidden dark:text-slate-900 lg:inline">
                        Kasilag Dental Clinic
                    </p>
                </a>
            </div>

            <ul class="hidden lg:flex gap-2">
                <li>
                    <a href="#home"
                        class="w-full px-3 py-2 rounded-lg flex items-center text-base hover:bg-slate-50 dark:hover:bg-slate-900 transition-all">
                        Home
                    </a>
                </li>
                <li>
                    <a href="#service"
                        class="w-full px-3 py-2 rounded-lg flex items-center text-base hover:bg-slate-50 dark:hover:bg-slate-900 transition-all">
                        Service
                    </a>
                </li>
                <li>
                    <a href="#about"
                        class="w-full px-3 py-2 rounded-lg flex items-center text-base hover:bg-slate-50 dark:hover:bg-slate-900 transition-all">
                        About
                    </a>
                </li>
                <li>
                    <a href="#contact"
                        class="w-full px-3 py-2 rounded-lg flex items-center text-base hover:bg-slate-50 dark:hover:bg-slate-900 transition-all">
                        Contact
                    </a>
                </li>
            </ul>

            <div class="flex items-center gap-3 mr-[30px] lg:ml-[30px] lg:w-[150px] lg:flex">
                <Link v-if="!$page.props.user" :href="route('auth.sign-in')">
                <button
                    class="bg-slate-50 px-3 py-2 rounded-lg font-medium outline outline-1 outline-slate-100 hover:bg-slate-200 hover:outline-slate-300 hover:text-slate-700 dark:bg-slate-900 dark:text-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 dark:hover:outline-slate-600 transition-all lg:w-full">
                    SIGN IN
                </button>
                </Link>
                <div class="mr-2" v-else>
                    <Link v-if="$page.props.user.role === 'admin'" :href="route('admin.dashboard')">
                    <button
                        class="bg-slate-50 px-3 py-2 rounded-lg font-medium outline outline-1 outline-slate-100 hover:bg-slate-200 hover:outline-slate-300 hover:text-slate-700 dark:bg-slate-900 dark:text-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 dark:hover:outline-slate-600 transition-all lg:w-full">
                        ADMIN
                    </button>
                    </Link>
                    <Link v-else :href="route('client.appointment.index')">
                    <button
                        class="bg-slate-50 px-3 py-2 rounded-lg font-medium outline outline-1 outline-slate-100 hover:bg-slate-200 hover:outline-slate-300 hover:text-slate-700 dark:bg-slate-900 dark:text-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 dark:hover:outline-slate-600 transition-all lg:w-full">
                        ACCOUNT
                    </button>
                    </Link>
                </div>
                <button
                    class="bg-slate-50 w-[32px] h-[32px] rounded-full outline outline-1 outline-slate-300 hover:bg-slate-200 hover:outline-slate-600 dark:bg-slate-900 dark:outline-slate-600 dark:hover:bg-slate-700 dark:hover:outline-slate-300 transition-all group grid"
                    id="toggle-mode" @click.prevent="toggleMode">
                    <div class="w-[24px] h-[24px] m-auto rounded-full group-hover:w-[22px] group-hover:h-[22px]">
                        <img src="/resources/dark-mode.png" alt="light-mode"
                            class="w-full h-full m-auto block dark:hidden" />
                        <img src="/resources/light-mode.png" alt="light-mode"
                            class="w-full h-full m-auto hidden dark:block" />
                    </div>
                </button>
            </div>
        </nav>
    </header>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default { components: { Link } };
</script>

<style>

</style>
