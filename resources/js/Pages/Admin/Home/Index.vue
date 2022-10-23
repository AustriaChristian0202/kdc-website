<template>
    <AdminLayout>
        <main class="w-full p-3 pt-[80px] lg:h-screen lg:flex lg:gap-5">
            <div class="w-full">
                <div class="w-full mb-5 flex gap-2">
                    <div
                        class="bg-blue-300 w-1/2 p-3 rounded-lg flex items-center justify-between border border-blue-400 hover:shadow-lg dark:bg-blue-200 dark:text-slate-900 dark:border-blue-300 transition-all"
                    >
                        <p class="text-xs">Today's appointments:</p>
                        <p
                            class="bg-blue-500 text-slate-200 h-full p-3 font-medium rounded-lg border border-blue-600 dark:bg-blue-400 dark:text-slate-900 dark:border-blue-500"
                        >
                            100
                        </p>
                    </div>
                    <div
                        class="bg-orange-300 w-1/2 p-3 rounded-lg flex items-center justify-between border border-orange-400 hover:shadow-lg dark:bg-orange-200 dark:text-slate-900 dark:border-orange-300 transition-all"
                    >
                        <p class="text-xs">Remaining appointments:</p>
                        <p
                            class="bg-orange-500 text-slate-200 h-full p-3 font-medium rounded-lg border border-orange-600 dark:bg-orange-400 dark:text-slate-900 dark:border-orange-500"
                        >
                            100
                        </p>
                    </div>
                </div>

                <div
                    class="bg-slate-100 w-full mb-5 p-3 rounded-lg border border-slate-200 hover:shadow-lg dark:bg-slate-700 dark:border-slate-600 transition-all"
                >
                    <p class="mb-2">Your next appointment:</p>
                    <div
                        class="bg-slate-200 w-full px-3 py-2 rounded-lg text-left dark:bg-slate-600 dark:text-slate-300"
                        id="next-appointment-trigger"
                    >
                        <div class="w-full flex justify-between">
                            <p class="max-w-[70%] text-xl font-medium truncate">
                                John Doe
                            </p>
                            <p class="text-xl font-medium">10:10 AM</p>
                        </div>
                        <p class="italic">Orthodontic Treatment</p>
                    </div>
                </div>

                <div
                    class="bg-slate-100 w-full p-3 rounded-lg border border-slate-200 dark:bg-slate-700 dark:border-slate-600 hover:shadow-lg transition-all"
                >
                    <Calendar />
                </div>
            </div>

            <div
                class="bg-slate-100 w-full mt-5 mb-5 px-5 py-3 rounded-lg border border-slate-200 dark:bg-slate-700 dark:border-slate-600 hover:shadow-lg transition-all lg:m-0 lg:h-full"
            >
                <!-- <?php require __DIR__ . "../../components/appointment-schedule.php";  ?> -->
            </div>
        </main>
    </AdminLayout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Calendar from "@/Components/Calendar.vue";
export default {
    components: { AdminLayout, Calendar },
};
</script>

<style lang="scss" scoped></style>
