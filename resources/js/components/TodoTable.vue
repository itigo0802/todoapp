<script setup lang="ts">
import type { Todo } from '@/types/todo.js';
import TodoItem from './TodoItem.vue';
import { ref, useTemplateRef } from 'vue';
import TodoFormModal from './TodoFormModal.vue';

const props = defineProps<{ todos: Todo[] }>();

const editingTodo = ref<Todo | null>(null);
const todoModal = useTemplateRef('todoModal');

function openEditModal(todo: Todo) {
    editingTodo.value = todo;
    todoModal.value?.open();
}

function openCreateModal() {
    editingTodo.value = null;
    todoModal.value?.open();
}
</script>
<template>
    <button class="btn btn-primary" @click="openCreateModal">新規登録</button>
    <table class="table">
        <thead>
            <tr>
                <th>タイトル</th>
                <th>期限</th>
                <th>完了日</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-if="todos.length === 0">
                <td colspan="3">Todoがありません</td>
            </tr>
            <TodoItem
                v-for="todo in todos"
                :key="todo.id"
                :todo="todo"
                @edit="openEditModal"
            />
        </tbody>
    </table>
    <TodoFormModal ref="todoModal" :todo="editingTodo" />
</template>
