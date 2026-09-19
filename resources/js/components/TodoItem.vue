<script setup lang="ts">
import { formatDate } from '@/lib/utils';
import { deleteMethod } from '@/routes/todos';
import { router } from '@inertiajs/vue3';
import type { Todo } from '@/types';

const props = defineProps<{ todo: Todo}>();
defineEmits<{ edit: [todo:Todo] }>();

function handleDelete() {
    if(confirm('本当に削除しますか？')) {
        router.delete(deleteMethod.url(props.todo.id));
    }
}
</script>
<template>
    <tr>
        <td :class="{ 'line-through decoration-double': todo.completed_date }">{{ todo.title }}</td>
        <td>{{ formatDate(todo.completed_date)  }}</td>
        <td class="flex gap-4"><button class="btn btn-primary" @click="$emit('edit', todo)">修正</button><button class="btn btn-error" @click="handleDelete()">削除</button></td>
    </tr>
</template>
