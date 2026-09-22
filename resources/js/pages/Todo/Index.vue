<script setup lang="ts">
import TodoTable from '@/components/TodoTable.vue';
import type { Todo } from '@/types';
import { usePage } from '@inertiajs/vue3';

const flash = usePage().props.flash;
defineProps<{ todos: Todo[] }>();
</script>
<template>
    <div>
        <div class="alert alert-success" v-if="flash.success">
            {{ flash.success }}
        </div>
        <TodoTable :todos="todos" />
    </div>
</template>
