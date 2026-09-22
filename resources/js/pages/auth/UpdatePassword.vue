<script setup lang="ts">
import { update } from '@/routes/user-password';
import { Head, Form } from '@inertiajs/vue3';
</script>

<template>
    <Head title="パスワード変更" />
    <div class="bg-base-200 flex min-h-screen items-center justify-center">
        <div class="card bg-base-100 w-full max-w-sm shadow-xl">
            <div class="card-body">
                <h2 class="card-title">パスワード変更</h2>
                <Form
                    v-bind="update.form()"
                    #default="{ errors, processing }"
                    class="flex flex-col gap-4"
                >
                    <label class="input">
                        <span class="label">現在のパスワード</span>
                        <input
                            type="password"
                            name="current_password"
                            class="validator"
                            required
                        />
                    </label>
                    <div
                        class="text-error mt-1 text-xs"
                        v-if="errors.current_password"
                    >
                        {{ errors.current_password }}
                    </div>
                    <label class="input">
                        <span class="label">新しいパスワード</span>
                        <input
                            type="password"
                            name="password"
                            class="validator"
                            required
                        />
                    </label>
                    <div class="text-error mt-1 text-xs" v-if="errors.password">
                        {{ errors.password }}
                    </div>
                    <label class="input">
                        <span class="label">新しいパスワード確認</span>
                        <input
                            type="password"
                            name="password_confirmation"
                            class="validator"
                            required
                        />
                    </label>
                    <div
                        class="text-error mt-1 text-xs"
                        v-if="errors.password_confirmation"
                    >
                        {{ errors.password_confirmation }}
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary"
                        :disabled="processing"
                    >
                        更新
                    </button>
                </Form>
            </div>
        </div>
    </div>
</template>
