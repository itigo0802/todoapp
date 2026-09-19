<script setup lang="ts">
import { login } from '@/routes';
import { store } from '@/routes/register';
import { Form, Head, Link } from '@inertiajs/vue3';
</script>
<template>
    <Head title="会員登録"></Head>
    <div class="bg-base-200 flex min-h-screen items-center justify-center">
        <div class="card bg-base-100 w-full max-w-sm shadow-xl">
            <div class="card-body">
                <h2 class="card-title">会員登録</h2>
                <Form
                    v-bind="store.form()"
                    #default="{ errors, invalid, validate, processing }"
                    class="flex flex-col gap-4"
                >
                    <label class="input">
                        <span class="label">E-mailアドレス</span>
                        <input
                            type="email"
                            name="email"
                            @change="validate('email')"
                            class="validator"
                        />
                    </label>
                    <div
                        class="text-error mt-1 text-xs"
                        v-if="invalid('email')"
                    >
                        {{ errors.email }}
                    </div>
                    <label class="input">
                        <span class="label">パスワード</span>
                        <input
                            type="password"
                            name="password"
                            @change="validate('password')"
                            class="validator"
                        />
                    </label>
                    <div
                        class="text-error mt-1 text-xs"
                        v-if="invalid('password')"
                    >
                        {{ errors.password }}
                    </div>
                    <label class="input">
                        <span class="label">パスワード確認</span>
                        <input
                            type="password"
                            name="password_confirmation"
                            @change="validate('password')"
                            class="validator"
                        />
                    </label>
                    <label class="input">
                        <span class="label">名前</span>
                        <input
                            type="text"
                            name="name"
                            @change="validate('name')"
                            class="validator"
                        />
                    </label>
                    <div class="text-error mt-1 text-xs" v-if="invalid('name')">
                        {{ errors.name }}
                    </div>
                    <input
                        type="submit"
                        :disabled="processing"
                        value="登録"
                        class="btn btn-primary"
                    />
                </Form>
                <Link :href="login()" class="link">ログインへ</Link>
            </div>
        </div>
    </div>
</template>
