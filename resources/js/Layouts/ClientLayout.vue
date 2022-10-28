<template>
    <body
        class="bg-slate-50 text-slate-900 text-sm dark:bg-slate-900 dark:text-slate-50 transition-all"
    >
        <Toast
            :show="$page.props.flash.message != null"
            :message="$page.props.flash.message"
        />

        <header
            class="bg-slate-400 w-full h-[60px] grid place-items-center fixed top-0 left-0 z-20 dark:bg-slate-700 dark:border-slate-300"
        >
            <nav
                class="bg-slate-400 w-full h-[40px] flex items-center justify-between dark:bg-slate-700"
            >
                <div class="h-full ml-[15px] flex gap-1">
                    <button
                        @click="toggleSidebar"
                        class="h-full lg:hidden transition-all"
                        id="sidebar-trigger"
                    >
                        <img
                            src="/resources/kebab-light-mode.png"
                            alt=""
                            class="h-2/3 inline dark:hidden lg:hidden"
                        />
                        <img
                            src="/resources/kebab-dark-mode.png"
                            alt=""
                            class="h-2/3 hidden dark:inline lg:hidden"
                        />
                    </button>
                    <Link
                        href="/"
                        class="h-full flex items-center gap-1 text-base font-bold uppercase"
                    >
                        <img
                            src="/resources/logo-large.png"
                            alt="logo"
                            class="h-full inline dark:hidden"
                        />
                        <img
                            src="/resources/logo-large-dark-mode.png"
                            alt="logo"
                            class="h-full hidden dark:inline"
                        />
                        <p
                            class="text-slate-50 hidden dark:text-slate-900 lg:inline"
                        >
                            Kasilag Dental Clinic
                        </p>
                    </Link>
                </div>

                <ul class="hidden lg:flex gap-2">
                    <li>
                        <Link
                            :href="route('client.my-appointments')"
                            :class="{
                                'font-bold border-1 border-b border-white rounded-none dark:border-gray-300':
                                    route().current('client.my-appointments'),
                            }"
                            class="w-full px-3 py-2 rounded-lg flex text-white hover:text-gray-700 items-center text-base hover:bg-slate-50 dark:hover:bg-slate-900 transition-all"
                        >
                            My Appointments
                        </Link>
                    </li>
                    <li>
                        <Link
                            :href="route('client.appointment.index')"
                            :class="{
                                'font-bold border-1 border-b border-white rounded-none dark:border-gray-300':
                                    route().current('client.appointment.*'),
                            }"
                            class="w-full px-3 py-2 rounded-lg flex text-white hover:text-gray-700 items-center text-base hover:bg-slate-50 dark:hover:bg-slate-900 transition-all"
                        >
                            Make an Appointment
                        </Link>
                    </li>

                    <li>
                        <Link
                            :href="route('profile.show')"
                            :class="{
                                'font-bold border-1 border-b border-white rounded-none dark:border-gray-300':
                                    route().current('profile.*'),
                            }"
                            class="w-full px-3 py-2 rounded-lg flex text-white hover:text-gray-700 items-center text-base hover:bg-slate-50 dark:hover:bg-slate-900 transition-all"
                        >
                            Profile
                        </Link>
                    </li>
                </ul>

                <div
                    class="ml-[12px] mr-[30px] pl-3 flex items-center gap-2 lg:border-l"
                >
                    <form @submit.prevent="logout">
                        <button
                            class="bg-slate-50 px-3 py-2 rounded-lg font-medium outline outline-1 outline-slate-300 hover:bg-slate-200 hover:outline-slate-600 dark:bg-slate-900 dark:outline-slate-600 dark:hover:bg-slate-700 dark:hover:outline-slate-300 transition-all uppercase dark:text-gray-300"
                        >
                            Log out
                        </button>
                    </form>
                    <img
                        class="h-8 w-8 rounded-full object-cover"
                        :src="$page.props.user.profile_photo_url"
                        :alt="$page.props.user.name"
                    />
                    <button
                        class="w-[32px] h-[32px] rounded-full outline-slate-300 hover:bg-slate-200 hover:outline-slate-600 dark:outline-slate-600 dark:hover:bg-slate-700 dark:hover:outline-slate-300 transition-all group grid"
                        id="toggle-mode"
                        @click.prevent="toggleMode"
                    >
                        <div
                            class="w-[24px] h-[24px] m-auto rounded-full group-hover:w-[22px] group-hover:h-[22px]"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6 dark:hidden inline"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"
                                />
                            </svg>

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6 hidden dark:inline"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                />
                            </svg>
                        </div>
                    </button>
                </div>
            </nav>
            <div
                class="bg-black/80 w-full h-full flex fixed z-50 top-0 left-0 flex-row justify-between transition-all lg:hidden"
                :class="{
                    'translate-x-0': showSidebar,
                    '-translate-x-full': !showSidebar,
                }"
                id="sidebar"
            >
                <div
                    class="bg-slate-200 text-slate-50 w-[80%] h-full p-5 dark:bg-slate-700 flex flex-col justify-between md:w-1/2"
                >
                    <div class="w-full">
                        <div class="w-full mb-16">
                            <img
                                src="/resources/logo-large-dark-mode.png"
                                alt="logo-icon"
                                class="inline dark:hidden"
                            />
                            <img
                                src="/resources/logo-large.png"
                                alt="logo-icon"
                                class="hidden dark:inline"
                            />
                        </div>
                        <ul
                            class="w-full p-5 text-slate-900 dark:text-slate-50"
                        >
                            <li class="w-full">
                                <Link
                                    :href="route('client.appointment.index')"
                                    :class="{
                                        'font-bold border-1 border-b border-white rounded-none dark:border-gray-300':
                                            route().current(
                                                'client.appointment.*'
                                            ),
                                    }"
                                    class="w-full mb-2 px-3 py-2 rounded-lg flex items-center text-base hover:bg-slate-50 dark:hover:bg-slate-900 transition-all"
                                    id="sidebar-service"
                                >
                                    <span class="w-6 h-6 mr-5 inline">
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
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"
                                            />
                                        </svg>
                                    </span>
                                    Make An Appointment
                                </Link>
                            </li>
                            <li class="w-full">
                                <Link
                                    :href="route('client.my-appointments')"
                                    :class="{
                                        'font-bold border-1 border-b border-white rounded-none dark:border-gray-300':
                                            route().current(
                                                'client.my-appointments'
                                            ),
                                    }"
                                    class="w-full mb-2 px-3 py-2 rounded-lg flex items-center text-base hover:bg-slate-50 dark:hover:bg-slate-900 transition-all"
                                    id="sidebar-service"
                                >
                                    <span class="w-6 h-6 mr-5 inline">
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
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z"
                                            />
                                        </svg>
                                    </span>

                                    My Appointments
                                </Link>
                            </li>
                            <li class="w-full">
                                <Link
                                    :href="route('profile.show')"
                                    :class="{
                                        'font-bold border-1 border-b border-white rounded-none dark:border-gray-300':
                                            route().current('profile.*'),
                                    }"
                                    class="w-full mb-2 px-3 py-2 rounded-lg flex items-center text-base hover:bg-slate-50 dark:hover:bg-slate-900 transition-all"
                                    id="sidebar-service"
                                >
                                    <span class="w-6 h-6 mr-5 inline">
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
                                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                                            />
                                        </svg>
                                    </span>

                                    Profile
                                </Link>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full px-10">
                        <a href="" class="w-full mr-[30px]"> </a>
                        <form @submit.prevent="logout">
                            <button
                                class="bg-slate-50 text-slate-900 w-full px-3 py-2 rounded-lg font-medium outline outline-1 outline-slate-100 hover:bg-slate-300 hover:outline-slate-400 dark:bg-slate-900 dark:text-slate-50 dark:outline-slate-600 dark:hover:bg-slate-600 dark:hover:text-slate-400 dark:hover:outline-slate-500 transition-all uppercase"
                            >
                                Log out
                            </button>
                        </form>
                    </div>
                </div>
                <div @click="toggleSidebar" class="w-[20%] h-screen"></div>
            </div>
        </header>
        <div class="overflow-y-auto min-h-screen">
            <slot></slot>
        </div>
    </body>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";
import Toast from "@/Components/Toast.vue";
export default {
    name: "App",

    components: {
        Link,
        Toast,
    },
    data() {
        return {
            showSidebar: false,
        };
    },

    methods: {
        toggleSidebar() {
            this.showSidebar = !this.showSidebar;
        },
        logout() {
            Inertia.post(route("logout"));
        },
        toggleMode() {
            // get local storage theme
            let theme = localStorage.getItem("theme");
            // if theme is dark
            if (theme == "dark") {
                // set theme to light
                localStorage.setItem("theme", "light");
                document.documentElement.classList.remove("dark");
                // set theme to dark
            } else {
                localStorage.setItem("theme", "dark");
                document.documentElement.classList.add("dark");
            }
        },
    },
};
</script>

<style lang="scss" scoped></style>
