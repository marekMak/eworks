<template>
    <MainLayout>
        <div class="grid grid-cols-[2fr_1fr] my-10 py-10">
            <TaskList :tasks="tasks" />
            <TaskForm />
        </div>
    </MainLayout>
</template>
<script setup>
import MainLayout from "../../Layout/MainLayout.vue";
import TaskList from "./components/TaskList.vue";
import TaskForm from "./components/TaskForm.vue";
const { tasks } = defineProps({ tasks: Array });
</script>
