<template>
    <div class="w-full py-2 flex items-center justify-between">
        <h1>
            <Link :href="route('tasks.index')">
                <img src="/logo.png" class="w-40" alt="eworks logo" />
            </Link>
        </h1>
        <ul class="flex gap-8 text-gray">
            <Link
                :href="route('tasks.index')"
                class="transition-color delay-150 hover:text-orange font-bold"
            >
                Prehľad úloh
            </Link>
            <Link
                :href="route('tasks.create')"
                class="transition-color delay-150 hover:text-orange font-bold"
                >Pridať úlohu</Link
            >
        </ul>
    </div>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
</script>
