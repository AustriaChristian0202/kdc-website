<script setup>
import { computed, useSlots } from "vue";
import SectionTitle from "./SectionTitle.vue";

defineEmits(["submitted"]);

const hasActions = computed(() => !!useSlots().actions);
</script>

<template>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <SectionTitle>
            <template #title>
                <div class="text-slate-800 dark:text-slate-100">
                    <slot name="title" />
                </div>
            </template>
            <template #description>
                <div class="text-slate-500 dark:text-slate-400">
                    <slot name="description" />
                </div>
            </template>
        </SectionTitle>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <form @submit.prevent="$emit('submitted')">
                <div
                    class="px-4 py-5 bg-slate-100 dark:bg-slate-800 sm:p-6 shadow"
                    :class="
                        hasActions
                            ? 'sm:rounded-tl-md sm:rounded-tr-md'
                            : 'sm:rounded-md'
                    "
                >
                    <div class="grid grid-cols-6 gap-6">
                        <slot name="form" />
                    </div>
                </div>

                <div
                    v-if="hasActions"
                    class="flex items-center dark:bg-slate-700 justify-end px-4 py-3 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md"
                >
                    <slot name="actions" />
                </div>
            </form>
        </div>
    </div>
</template>
