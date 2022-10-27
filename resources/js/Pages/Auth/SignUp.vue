<template>
    <body
        class="bg-slate-50 min-h-screen text-slate-900 text-sm dark:bg-slate-900 dark:text-slate-50 transition-all md:text-base"
    >
        <head title="Sign Up" />
        <main
            class="w-screen overflow-y-auto h-screen p-[30px] grid place-items-center md:px-[15%] lg:px-[35%]"
        >
            <div
                class="bg-slate-100 w-full p-2 pb-10 px-[30px] rounded-lg grid place-items-center border border-slate-200 dark:bg-slate-700 dark:border-slate-600"
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

                    <form
                        @submit.prevent="submit"
                        class="space-y-2 w-full py-2 grid"
                    >
                        <div>
                            <InputLabel value="Name" />
                            <input
                                type="text"
                                name="client_name"
                                placeholder="Name"
                                required
                                v-model="form.name"
                                class="bg-slate-50 w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all"
                            />
                            <InputError :message="form.errors.name" />
                        </div>
                        <div>
                            <InputLabel value="Email" />

                            <input
                                type="email"
                                name="client_email"
                                placeholder="Email"
                                v-model="form.email"
                                required
                                class="bg-slate-50 w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all"
                            />
                            <InputError :message="form.errors.email" />
                        </div>
                        <div>
                            <InputLabel value="Contact Number" />
                            <input
                                type="number"
                                name="client_number"
                                placeholder="Contact Number"
                                required
                                v-model="form.contact"
                                maxlength="11"
                                class="bg-slate-50 w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all appearance-none"
                            />
                            <InputError :message="form.errors.contact" />
                        </div>
                        <div>
                            <!-- sex dropdown -->
                            <InputLabel value="Sex" />
                            <select
                                name=""
                                id=""
                                v-model="form.sex"
                                class="bg-slate-50 w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all appearance-none"
                            >
                                <option value="">Sex</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <InputError :message="form.errors.sex" />
                        </div>
                        <div>
                            <InputLabel value="Age" />
                            <input
                                type="number"
                                name="age"
                                placeholder="Age"
                                required
                                v-model="form.age"
                                maxlength="11"
                                class="bg-slate-50 w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all appearance-none"
                            />
                            <InputError :message="form.errors.age" />
                            <!-- <input
                            type="text"
                            name="client_username"
                            placeholder="Username"
                            v-model="form.email"
                            required
                            class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all"
                        /> -->
                        </div>
                        <div>
                            <InputLabel value="Password" />
                            <input
                                type="password"
                                name="client_password"
                                placeholder="Password"
                                v-model="form.password"
                                required
                                class="bg-slate-50 w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all"
                            />
                            <InputError :message="form.errors.password" />
                        </div>
                        <div>
                            <InputLabel value="Confirm Password" />
                            <input
                                v-model="form.password_confirmation"
                                type="password"
                                name="retype_password"
                                placeholder="Re-type password"
                                required
                                class="bg-slate-50 w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all"
                            />
                            <InputError
                                :message="form.errors.password_confirmation"
                            />
                        </div>
                        <div class="w-full">
                            <button
                                type="submit"
                                class="dark:bg-slate-800 rounded-lg w-full mt-4 px-4 py-2 shadow-sm bg-blue-600 text-white hover:bg-blue-700 focus:bg-slate-700 active:bg-slate-700 transition-all"
                            >
                                Register your account
                            </button>
                        </div>
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

<script setup>
import { Head, useForm } from "@inertiajs/inertia-vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
const form = useForm({
    name: "",
    phone: "",
    email: "",
    age: "",
    contact: "",
    sex: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("auth.register-client"));
};
</script>

<style lang="scss" scoped></style>
