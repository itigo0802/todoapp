<script setup lang="ts">
import { Form } from '@inertiajs/vue3';
import { store } from '@/actions/Laravel/Fortify/Http/Controllers/ConfirmablePasswordController';
</script>
<template>
    <div class="bg-base-200 flex min-h-screen items-center justify-center">
        <div class="card w-full max-w-sm shadow-xl">
            <div class="card-body">
                <h2 class="card-title">パスワード確認</h2>
                <Form v-bind="store.form()" #default="{ processing, errors }">
                    <label class="input">
                        <span class="label">パスワード</span>
                        <input
                            type="password"
                            name="password"
                            class="validator"
                            required
                        />
                    </label>
                    <div class="text-error mt-1 text-sm" v-if="errors.password">
                        {{ errors.password }}
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary"
                        :disabled="processing"
                    >
                        確認
                    </button>
                </Form>
            </div>
        </div>
    </div>
</template>
