<script setup lang="ts">
import TodoTable from '@/components/TodoTable.vue';
import type { Todo } from '@/types';

defineProps<{ todos: Todo[] }>();
</script>
<template>
    <div>
        <TodoTable :todos="todos" />
    </div>
</template>
