<template>
    <MainLayout>
        <div
            class="w-full md:w-[80%] min-h-36 font-bold text-gray my-10 py-10 flex flex-col gap-8"
        >
            <div class="flex flex-col gap-2">
                <h5>Názov úlohy</h5>
                <p
                    class="border-2 border-gray-400 rounded-md p-2 w-full text-purple bg-white"
                >
                    {{ task.title }}
                </p>
            </div>
            <div class="flex flex-col gap-2">
                <h5>Popis úlohy</h5>
                <p
                    class="border-2 border-gray-400 rounded-md p-2 w-full text-purple bg-white"
                >
                    {{ task.description }}
                </p>
            </div>
            <div class="flex flex-col gap-2">
                <h5>Dátum dokončenia úlohy</h5>
                <p
                    class="border-2 border-gray-400 rounded-md p-2 w-full text-purple bg-white"
                >
                    {{ format(task.due_date, "dd.MM.yyyy") }}
                </p>
            </div>

            <div class="flex flex-col gap-2">
                <h5>Stav úlohy</h5>
                <p
                    class="border-2 border-gray-400 rounded-md p-2 w-full text-purple bg-white"
                >
                    {{ task.status ? "hotová" : "nedokončená" }}
                </p>
            </div>

            <div class="flex flex-col gap-2">
                <h5>Dátum poslednej aktualizácie úlohy</h5>
                <p
                    class="border-2 border-gray-400 rounded-md p-2 w-full text-purple bg-white"
                >
                    {{ format(task.updated_at, "dd.MM.yyyy hh:mm:ss") }}
                </p>
            </div>
            <div class="flex flex-col gap-2">
                <h5>Dátum vytvorenia úlohy</h5>
                <p
                    class="border-2 border-gray-400 rounded-md p-2 w-full text-purple bg-white"
                >
                    {{ format(task.created_at, "dd.MM.yyyy hh:mm:ss") }}
                </p>
            </div>
        </div>
    </MainLayout>
</template>
<script setup>
import { format } from "date-fns";
import MainLayout from "../../Layout/MainLayout.vue";
const { task } = defineProps({ task: Object });
</script>
