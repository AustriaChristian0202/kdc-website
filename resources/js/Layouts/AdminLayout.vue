<template>
    <body
        class="bg-slate-50 text-slate-900 text-sm dark:bg-slate-900 dark:text-slate-50 transition-all min-h-screen w-full"
    >
        <Toast
            :show="$page.props.flash.message != null"
            :message="$page.props.flash.message"
        />
        <header
            class="bg-slate-400 dark:bg-slate-700 w-full h-[60px] grid place-items-center fixed top-0 left-0 z-20 dark:border-slate-300"
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
                    <a
                        href=""
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
                    </a>
                </div>

                <ul class="hidden dark:text-gray-300 lg:flex gap-2 font-medium">
                    <li>
                        <Link
                            :href="route('admin.home.index')"
                            :class="{
                                'font-bold border-1 border-b border-white rounded-none dark:border-gray-300':
                                    route().current('admin.home.*'),
                            }"
                            class="w-full px-3 py-2 rounded-lg flex text-white hover:text-gray-700 items-center text-base hover:bg-slate-50 dark:hover:bg-slate-900 transition-all"
                        >
                            Home
                        </Link>
                    </li>
                    <li>
                        <Link
                            :href="route('admin.appointment.index')"
                            :class="{
                                'font-bold border-1 border-b border-white rounded-none dark:border-gray-300':
                                    route().current('admin.appointment.index'),
                            }"
                            class="w-full px-3 py-2 rounded-lg flex items-center text-white hover:text-gray-700 text-base hover:bg-slate-50 dark:hover:bg-slate-900 transition-all"
                        >
                            Appointment
                        </Link>
                    </li>
                    <li>
                        <Link
                            :href="route('admin.client.index')"
                            :class="{
                                'font-bold border-1 border-b border-white rounded-none dark:border-gray-300':
                                    route().current('admin.client.*'),
                            }"
                            class="w-full px-3 py-2 rounded-lg flex items-center text-base text-white hover:text-gray-700 hover:bg-slate-50 dark:hover:bg-slate-900 transition-all"
                        >
                            Patients
                        </Link>
                    </li>
                    <li>
                        <Link
                            :href="route('profile.show')"
                            :class="{
                                'font-bold border-1 border-b border-white rounded-none dark:border-gray-300':
                                    route().current('profile.*'),
                            }"
                            class="w-full px-3 py-2 rounded-lg flex items-center text-base text-white hover:text-gray-700 hover:bg-slate-50 dark:hover:bg-slate-900 transition-all"
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
                        class="bg-slate-50 w-[32px] h-[32px] rounded-full outline outline-1 outline-slate-300 hover:bg-slate-200 hover:outline-slate-600 dark:bg-slate-900 dark:outline-slate-600 dark:hover:bg-slate-700 dark:hover:outline-slate-300 transition-all group grid"
                        id="toggle-mode"
                        @click.prevent="toggleMode"
                    >
                        <div
                            class="w-[24px] h-[24px] m-auto rounded-full group-hover:w-[22px] group-hover:h-[22px]"
                        >
                            <img
                                src="/resources/dark-mode.png"
                                alt="light-mode"
                                class="w-full h-full m-auto block dark:hidden"
                            />
                            <img
                                src="/resources/light-mode.png"
                                alt="light-mode"
                                class="w-full h-full m-auto hidden dark:block"
                            />
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
                                    :href="route('admin.home.index')"
                                    :class="{
                                        'font-bold border-1 border-b border-white rounded-none dark:border-gray-300':
                                            route().current('admin.home.*'),
                                    }"
                                    class="w-full mb-2 px-3 py-2 rounded-lg flex items-center text-base hover:bg-slate-50 dark:hover:bg-slate-900 transition-all"
                                    id="sidebar-home"
                                >
                                    <span
                                        class="w-6 h-6 mr-5 inline dark:hidden"
                                    >
                                        <img
                                            src="/resources/home-light-mode.png"
                                            alt="home-icon"
                                            class="w-6 h-6"
                                        />
                                    </span>
                                    <span
                                        class="w-6 h-6 mr-5 hidden dark:inline"
                                    >
                                        <img
                                            src="/resources/home-dark-mode.png"
                                            alt="home-icon"
                                            class="w-6 h-6"
                                        />
                                    </span>
                                    Home
                                </Link>
                            </li>
                            <li class="w-full">
                                <Link
                                    :href="route('admin.appointment.index')"
                                    :class="{
                                        'font-bold border-1 border-b border-white rounded-none dark:border-gray-300':
                                            route().current(
                                                'admin.appointment.index'
                                            ),
                                    }"
                                    class="w-full mb-2 px-3 py-2 rounded-lg flex items-center text-base hover:bg-slate-50 dark:hover:bg-slate-900 transition-all"
                                    id="sidebar-service"
                                >
                                    <span
                                        class="w-6 h-6 mr-5 inline dark:hidden"
                                    >
                                        <img
                                            src="/resources/appointment-light-mode.png"
                                            alt="home-icon"
                                            class="w-6 h-6"
                                        />
                                    </span>
                                    <span
                                        class="w-6 h-6 mr-5 hidden dark:inline"
                                    >
                                        <img
                                            src="/resources/appointment-dark-mode.png"
                                            alt="home-icon"
                                            class="w-6 h-6"
                                        />
                                    </span>
                                    Appointment
                                </Link>
                            </li>
                            <li class="w-full">
                                <Link
                                    :href="route('admin.client.index')"
                                    :class="{
                                        'font-bold border-1 border-b border-white rounded-none dark:border-gray-300':
                                            route().current('admin.client.*'),
                                    }"
                                    class="w-full flex gap-5 mb-2 px-3 py-2 rounded-lg items-center text-base hover:bg-slate-50 dark:hover:bg-slate-900 transition-all"
                                    id="sidebar-about"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        fill="currentColor"
                                        class="w-6 h-6"
                                    >
                                        <path
                                            d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z"
                                        />
                                    </svg>

                                    Patients
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
                                    id="sidebar-about"
                                >
                                    <span
                                        class="w-6 h-6 mr-5 inline dark:hidden"
                                    >
                                        <img
                                            src="/resources/user-light-mode.png"
                                            alt="home-icon"
                                            class="w-6 h-6"
                                        />
                                    </span>
                                    <span
                                        class="w-6 h-6 mr-5 hidden dark:inline"
                                    >
                                        <img
                                            src="/resources/user-dark-mode.png"
                                            alt="home-icon"
                                            class="w-6 h-6"
                                        />
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
        <div class="overflow-x-auto">
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
