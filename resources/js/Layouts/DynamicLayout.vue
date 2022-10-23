<template>
    <AdminLayout v-if="role === 'admin'">
        <slot></slot>
    </AdminLayout>
    <ClientLayout v-else>
        <slot></slot>
    </ClientLayout>
</template>

<script>
import AdminLayout from "./AdminLayout.vue";
import ClientLayout from "./ClientLayout.vue";
export default {
    props: {
        role: {
            type: String,
            default: "client",
        },
    },
    components: { AdminLayout, ClientLayout },
};
</script>

<style lang="scss" scoped></style>
