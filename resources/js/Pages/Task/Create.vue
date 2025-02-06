<template>
    <MainLayout>
        <div
            class="w-full md:w-[80%] min-h-36 font-bold text-gray my-10 py-10 flex flex-col gap-8"
        >
            <form
                @submit.prevent="addTask"
                class="flex flex-col w-full md:w-[90%] gap-4"
            >
                <div>
                    <label class="text-gray" for="title"> Názov úlohy </label>
                    <input
                        id="title"
                        v-model="form.title"
                        type="text"
                        placeholder="Názov úlohy"
                        class="border-2 border-gray-400 rounded-md p-2 w-full"
                    />
                    <p
                        v-if="form.errors.title"
                        class="w-full bg-red-400 text-red-700 px-2 py-1 rounded mt-2"
                    >
                        {{ form.errors.title }}
                    </p>
                </div>
                <div>
                    <label class="text-gray" for="description">
                        Popis úlohy
                    </label>
                    <textarea
                        id="description"
                        v-model="form.description"
                        placeholder="Popis úlohy"
                        class="border-2 border-gray-400 rounded-md p-2 w-full"
                    >
                    </textarea>
                    <p
                        v-if="form.errors.description"
                        class="w-full bg-red-400 text-red-700 px-2 py-1 rounded mt-2"
                    >
                        {{ form.errors.description }}
                    </p>
                </div>
                <div class="flex flex-col">
                    <label class="text-gray" for="due_date">
                        Dátum dokončenia úlohy
                    </label>
                    <input
                        id="due_date"
                        type="date"
                        class="border-2 border-gray-400 rounded-md p-2 w-full"
                        v-model="form.due_date"
                    />
                    <p
                        v-if="form.errors.due_date"
                        class="w-full bg-red-400 text-red-700 px-2 py-1 rounded mt-2"
                    >
                        {{ form.errors.due_date }}
                    </p>
                </div>
                <button
                    type="submit"
                    class="bg-gray text-purple font-bold rounded-md p-2 w-full mt-2"
                >
                    Pridať úlohu
                </button>
            </form>
        </div>
    </MainLayout>
</template>
<script setup>
import MainLayout from "../../Layout/MainLayout.vue";
const { task } = defineProps({ task: Object });
import { Link } from "@inertiajs/vue3";
import { format } from "date-fns";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    title: "",
    description: "",
    due_date: null,
    status: 0,
});

const addTask = () => {
    form.post("/tasks");
};
</script>
