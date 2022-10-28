<template>
    <div
        class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700"
    >
        <ul class="flex flex-wrap -mb-px">
            <li class="mr-2">
                <Link
                    :href="route('admin.report.appointment.index')"
                    class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    :class="{
                        'text-gray-700 border-gray-300 dark:text-gray-200 dark:border-gray-700':
                            route().current('admin.report.appointment.*'),
                    }"
                    >Appointment</Link
                >
            </li>
        </ul>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>

<style lang="scss" scoped></style>
