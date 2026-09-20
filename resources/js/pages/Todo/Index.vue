<script setup lang="ts">
import TodoTable from '@/components/TodoTable.vue';
import type { Todo } from '@/types';
import { usePage } from '@inertiajs/vue3';

defineProps<{ todos: Todo[] }>();
const page = usePage();
</script>
<template>
    <div>
        <div class="alert alert-success" v-if="page.props.flash.success">{{ page.props.flash.success }}</div>
        <TodoTable :todos="todos" />
    </div>
</template>
