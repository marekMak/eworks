<template>
    <div class="w-full px-10 md:px-60 min-h-screen py-4 bg-purple">
        <Header></Header>
        <div
            v-if="flashSuccess"
            class="w-full bg-green-400 text-green-700 px-4 py-2 rounded flex items-center justify-between"
        >
            {{ flashSuccess }}
            <XCircleIcon
                class="cursor-pointer text-red-400 w-8"
                @click="page.props.flash.success = null"
            />
        </div>
        <slot>Default</slot>
    </div>
    <div class="w-full flex justify-center py-2 bg-fuchsia">
        <h5>marekMak©2025</h5>
    </div>
</template>
<script setup>
import { XCircleIcon } from "@heroicons/vue/24/outline";
import Header from "./components/Header.vue";
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();
const flashSuccess = computed(() => page.props.flash.success);
</script>
