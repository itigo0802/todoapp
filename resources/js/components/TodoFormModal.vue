<script setup lang="ts">
import { store, update } from '@/routes/todos';
import type { Todo } from '@/types';
import { Form } from '@inertiajs/vue3';
import { computed, useTemplateRef } from 'vue';

const props = defineProps<{ todo: Todo | null }>();

const dialog = useTemplateRef('dialog');
const formBinding = computed(() =>
    props.todo ? update.form(props.todo) : store.form(),
);

defineExpose({
    open: () => dialog.value?.showModal(),
});
</script>

<template>
    <dialog ref="dialog" class="modal">
        <div class="modal-box">
            <h3 class="text-lg font-bold">
                {{ todo ? 'Todo編集' : 'Todo新規登録' }}
            </h3>
            <Form
                v-bind="formBinding"
                #default="{ errors, processing }"
                class="flex flex-col gap-4"
                @success="dialog?.close()"
            >
                <label class="input">
                    <span class="label">タイトル</span>
                    <input
                        type="text"
                        name="title"
                        :value="todo?.title ?? ''"
                        class="validator"
                    />
                </label>
                <div class="validator-hint">{{ errors.title }}</div>
                <label class="input">
                    <span class="label">完了日</span>
                    <input
                        type="date"
                        name="completed_date"
                        :value="todo?.completed_date?.slice(0, 10) ?? ''"
                        class="validator"
                    />
                </label>
                <div class="validator-hint">{{ errors.completed_date }}</div>
                <label class="floating-label">
                    <span class="label">説明</span>
                    <textarea
                        name="description"
                        rows="5"
                        :value="todo?.description"
                        class="textarea validator"
                    ></textarea>
                </label>
                <div class="validator-hint">{{ errors.description }}</div>

                <div class="modal-action">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        @click="dialog?.close()"
                    >
                        キャンセル
                    </button>
                    <button
                        type="submit"
                        class="btn btn-primary"
                        :disabled="processing"
                    >
                        保存
                    </button>
                </div>
            </Form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
</template>
