<template>
    <div class="flex flex-col px-4 md:px-10 items-center gap-8">
        <h1 class="font-bold text-gray text-2xl">Prehľad úloh</h1>
        <div
            class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 text-gray bg-clip-border"
        >
            <table class="w-full text-left table-auto min-w-max text-gray">
                <thead>
                    <tr class="text-white border-b border-slate-300">
                        <th class="p-4">
                            <p class="text-sm leading-none font-bold text-gray">
                                Názov úlohy
                            </p>
                        </th>

                        <th class="p-4">
                            <p class="text-sm leading-none font-bold text-gray">
                                Dátum dokončenia úlohy
                            </p>
                        </th>
                        <th class="p-4">
                            <p class="text-sm leading-none font-bold text-gray">
                                Zostávajúci počet dní
                            </p>
                        </th>
                        <th class="p-4">
                            <p class="text-sm leading-none font-bold text-gray">
                                Stav úlohy
                            </p>
                        </th>
                        <th class="p-4">
                            <p></p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="task in tasks"
                        :key="task.id"
                        :class="{
                            'border-b-4 border-green-300': task.status === 1,
                            'border-b-4 border-red-300': task.status === 0,
                            'my-2': true,
                        }"
                    >
                        <td class="p-4">
                            <p class="text-sm font-bold">{{ task.title }}</p>
                        </td>
                        <td class="p-4">
                            <p class="text-sm">
                                {{ format(task.due_date, "dd.MM.yyyy") }}
                            </p>
                        </td>
                        <td class="p-4">
                            <p class="text-sm">
                                <template v-if="task.status == 0">
                                    {{
                                        formatDistance(
                                            subDays(
                                                new Date(task.due_date),
                                                -1
                                            ),
                                            new Date(),
                                            { addSuffix: true, locale: sk }
                                        )
                                    }}
                                </template>
                                <template v-else>
                                    <p class="text-sm">
                                        <ShieldCheckIcon
                                            class="text-green-400 w-6"
                                        />
                                    </p>
                                </template>
                            </p>
                        </td>
                        <td class="p-4">
                            <div class="flex gap-2">
                                <p class="text-sm">
                                    {{
                                        task.status
                                            ? "dokončená"
                                            : "rozpracovaná"
                                    }}
                                </p>
                                <template v-if="task.status == 0">
                                    <input
                                        type="checkbox"
                                        class="mr-2"
                                        @change="updateStatus(task)"
                                    />
                                </template>
                            </div>
                        </td>

                        <td class="p-4 flex gap-2">
                            <Link
                                :href="route('tasks.show', task.id)"
                                class="text-sm font-semibold"
                            >
                                <EyeIcon class="h-6 w-6 text-green-600" />
                            </Link>
                            <Link
                                :href="route('tasks.edit', task.id)"
                                class="text-sm font-semibold"
                            >
                                <PencilSquareIcon
                                    class="size-6 text-blue-600"
                                />
                            </Link>
                            <Link
                                :href="route('tasks.destroy', task.id)"
                                class="text-sm font-semibold"
                                method="delete"
                                as="button"
                            >
                                <TrashIcon class="size-6 text-red-500" />
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script setup>
const { tasks } = defineProps({ tasks: Array });
import {
    EyeIcon,
    PencilSquareIcon,
    TrashIcon,
    ShieldCheckIcon,
} from "@heroicons/vue/24/outline";
import { Link, useForm } from "@inertiajs/vue3";
import { format, formatDistance, subDays } from "date-fns";
import { sk } from "date-fns/locale";

const form = useForm({
    status: 0,
    title: "",
    description: "",
    due_date: "",
});

const updateStatus = (task) => {
    form.status = 1;
    form.title = task.title;
    form.description = task.description;
    form.due_date = task.due_date;
    form.put(route("tasks.update", task.id));
};
</script>
