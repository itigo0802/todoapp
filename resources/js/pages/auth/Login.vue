<script setup lang="ts">
import { Form, Head, Link } from '@inertiajs/vue3';
import { store } from '@/routes/login';
import { register } from '@/routes';
</script>

<template>
    <Head title="ログイン"></Head>
    <div class="flex min-h-screen justify-center items-center bg-base-200">
        <div class="card bg-base-100 shadow-xl w-full max-w-sm">
            <div class="card-body">
                <h2 class="card-title">ログイン</h2>
                <Form v-bind="store.form()" #default="{ errors, processing }" class="flex flex-col gap-4">
                    <label class="input">
                        <span class="label">E-mailアドレス</span>
                        <input type="email" name="email" class="validator" required>
                    </label>
                    <div class="text-error text-xs mt-1" v-if="errors.email">{{ errors.email }}</div>
                    <label class="input">
                        <span class="label">パスワード</span>
                        <input type="password" name="password" class="validator">
                    </label>
                    <div class="text-error text-xs mt-1" v-if="errors.password">{{ errors.password }}</div>
                    <input type="submit" :disabled="processing" value="ログイン" class="btn btn-primary">
                </Form>
                <Link :href="register()" class="link">会員登録へ</Link>
            </div>
        </div>
    </div>
</template>
