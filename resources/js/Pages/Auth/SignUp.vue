<template>
    <body
        class="bg-slate-50 min-h-screen text-slate-900 text-sm dark:bg-slate-900 dark:text-slate-50 transition-all md:text-base"
    >
        <main
            class="w-screen overflow-y-auto h-screen p-[30px] grid place-items-center md:px-[15%] lg:px-[35%]"
        >
            <div
                class="bg-slate-100 w-full p-2 pb-10 px-[30px] rounded-lg grid place-items-center border border-slate-200 dark:bg-slate-700 dark:border-slate-600 md:h-[90%]"
            >
                <div class="w-full">
                    <div class="w-full mb-5 rounded-lg grid place-items-center">
                        <img
                            src="/resources/logo-large-dark-mode.png"
                            alt=""
                            class="inline dark:hidden"
                        />
                        <img
                            src="/resources/logo-large.png"
                            alt=""
                            class="hidden dark:inline"
                        />
                    </div>
                    <p class="mb-3 text-base text-center">Create new account</p>

                    <form @submit.prevent="submit" class="w-full py-2 grid">
                        <input type="hidden" name="text" value="register" />
                        <input
                            type="text"
                            name="client_name"
                            placeholder="Name"
                            required
                            v-model="form.name"
                            class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all"
                        />
                        <input
                            type="number"
                            name="client_number"
                            placeholder="Number"
                            required
                            v-model="form.phone"
                            maxlength="11"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all appearance-none"
                        />
                        <!-- <input
                            type="text"
                            name="client_username"
                            placeholder="Username"
                            v-model="form.email"
                            required
                            class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all"
                        /> -->
                        <input
                            type="email"
                            name="client_email"
                            placeholder="Email"
                            v-model="form.email"
                            required
                            class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all"
                        />
                        <input
                            type="password"
                            name="client_password"
                            placeholder="Password"
                            v-model="form.password"
                            required
                            class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all"
                        />
                        <input
                            v-model="form.password_confirmation"
                            type="password"
                            name="retype_password"
                            placeholder="Re-type password"
                            required
                            class="bg-slate-50 w-full mb-5 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all"
                        />
                        <button
                            type="submit"
                            class="bg-blue-500 text-slate-50 w-full py-3 rounded-lg font-bold outline outline-1 outline-blue-600 hover:bg-blue-600 hover:outline-blue-700 hover:shadow-lg dark:bg-blue-400 dark:text-slate-900 dark:outline-blue-300 dark:hover:bg-blue-500 dark:hover:outline-blue-400 dark:hover:text-slate-800 transition-all uppercase"
                        >
                            Register your account
                        </button>
                    </form>
                    <div class="w-full mt-2 text-center">
                        <a :href="route('auth.sign-in')"
                            >Return to sign in form</a
                        >
                    </div>
                </div>
            </div>
        </main>
    </body>
</template>

<script>
import { form } from "@inertiajs/inertia";
export default {
    data() {
        return {
            form: {
                name: "",
                phone: "",
                email: "",
                password: "",
                password_confirmation: "",
            },
        };
    },
    methods: {
        submit() {
            this.$inertia.post(route("auth.register-client"), this.form);
        },
    },
};
</script>

<style lang="scss" scoped></style>
