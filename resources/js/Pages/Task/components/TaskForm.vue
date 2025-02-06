<template>
    <div class="flex flex-col px-4 md:px-10 items-center gap-8">
        <h1 class="font-bold text-gray text-2xl">Pridať úlohu</h1>
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
                <label class="text-gray" for="description"> Popis úlohy </label>
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
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    title: "",
    description: "",
    due_date: null,
    status: 0,
});

const addTask = () => {
    try {
        form.post("/tasks");
        form.reset();
    } catch (error) {
        console.error("Chyba pri odoslaní formuláru");
    }
};
</script>
