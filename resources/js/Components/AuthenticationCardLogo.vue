<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
    <Link :href="'/'">
        <img
            src="/resources/logo-large.png"
            alt="logo"
            class="h-full hidden dark:inline"
        />
        <img
            src="/resources/logo-large-dark-mode.png"
            alt="logo"
            class="h-full inline dark:hidden"
        />
    </Link>
</template>
