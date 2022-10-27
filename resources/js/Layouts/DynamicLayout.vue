<template>
    <AdminLayout v-if="$page.props.user.role === 'admin'">
        <slot></slot>
    </AdminLayout>
    <ClientLayout v-else>
        <slot></slot>
    </ClientLayout>
</template>

<script setup>
import AdminLayout from "./AdminLayout.vue";
import ClientLayout from "./ClientLayout.vue";
</script>

<style lang="scss" scoped></style>
