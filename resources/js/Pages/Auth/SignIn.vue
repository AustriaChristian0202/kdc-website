<template>
    <body
        class="bg-slate-50 text-slate-900 text-sm dark:bg-slate-900 dark:text-slate-50 transition-all md:text-base"
    >
        <Head title="Sign In" />
        <main
            class="w-screen h-screen p-[30px] grid place-items-center md:px-[15%] lg:px-[35%]"
        >
            <div
                class="bg-slate-100 w-full h-full p-2 px-[30px] rounded-lg grid place-items-center border border-slate-200 dark:bg-slate-700 dark:border-slate-600"
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
                    <p class="mb-3 text-base text-center">
                        Sign in to continue
                    </p>
                    <a
                        :href="route('auth.google')"
                        class="bg-slate-200 w-full py-3 rounded-lg font-medium flex items-center justify-center gap-2 outline outline-1 outline-slate-300 hover:bg-slate-300 hover:outline-slate-400 dark:bg-slate-800 dark:outline-slate-600 dark:hover:bg-slate-900 dark:hover:outline-slate-800 hover:shadow-lg transition-all"
                    >
                        <span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-google"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"
                                />
                            </svg>
                        </span>
                        Continue with google account
                    </a>
                    <div class="w-full mt-5 mb-3 flex items-center gap-2">
                        <hr
                            class="w-1/2 border-slate-900 dark:border-slate-50"
                        />
                        <p class="whitespace-nowrap text-center">or</p>
                        <hr
                            class="w-1/2 border-slate-900 dark:border-slate-50"
                        />
                    </div>
                    <form
                        @submit.prevent="submit"
                        method="POST"
                        class="w-full py-2 grid"
                    >
                        <input
                            type="email"
                            name="email"
                            placeholder="Email"
                            v-model="form.email"
                            required
                            class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all"
                        />
                        <InputError class="mb-2" :message="form.errors.email" />
                        <input
                            type="password"
                            name="password"
                            placeholder="Password"
                            v-model="form.password"
                            required
                            class="bg-slate-50 w-full mb-2 px-3 py-2 rounded-lg outline outline-1 outline-slate-200 placeholder:text-slate-400 hover:bg-slate-200 hover:outline-slate-300 hover:shadow-lg focus:bg-slate-200 focus:outline-slate-300 focus:shadow-lg active:bg-slate-200 active:outline-slate-300 active:shadow-lg dark:bg-slate-500 dark:outline-slate-400 dark:hover:bg-slate-600 dark:hover:outline-slate-500 dark:focus:bg-slate-600 dark:focus:outline-slate-500 dark:active:bg-slate-600 dark:active:outline-slate-500 transition-all"
                        />
                        <InputError
                            class="mb-2"
                            :message="form.errors.password"
                        />
                        <div class="flex items-center justify-end">
                            <Link
                                :href="route('password.request')"
                                class="underline mb-2 dark:text-gray-400 text-sm text-gray-600 hover:text-gray-900"
                            >
                                Forgot your password?
                            </Link>
                        </div>

                        <button
                            class="bg-blue-500 text-slate-50 w-full py-3 rounded-lg font-bold outline outline-1 outline-blue-600 hover:bg-blue-600 hover:outline-blue-700 hover:shadow-lg dark:bg-blue-400 dark:text-slate-900 dark:outline-blue-300 dark:hover:bg-blue-500 dark:hover:outline-blue-400 dark:hover:text-slate-800 transition-all uppercase"
                        >
                            Sign in
                        </button>
                    </form>
                    <p class="mt-2 text-center">
                        Don't have an account?
                        <a
                            :href="route('auth.sign-up')"
                            class="text-blue-500 dark:text-blue-400 dark:hover:text-blue-300 transition-all"
                            >Create account</a
                        >
                    </p>
                </div>
            </div>
        </main>
    </body>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import InputError from "@/Components/InputError.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Head } from "@inertiajs/inertia-vue3";

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        remember: form.remember ? "on" : "",
    })).post(route("auth.login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<style lang="scss" scoped></style>
