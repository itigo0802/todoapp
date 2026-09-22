<script setup lang="ts">
import { home } from '@/routes';
import { update } from '@/routes/updateUserInfo';
import { Form, Head, Link, usePage } from '@inertiajs/vue3';
const user = usePage().props.auth.user;
</script>
<template>
    <Head title="アカウント情報修正"></Head>
    <div class="bg-base-200 flex min-h-screen items-center justify-center">
        <div class="card bg-base-100 w-full max-w-sm shadow-xl">
            <div class="card-body">
                <h2 class="card-title">アカウント情報修正</h2>
                <Form
                    :action="update()"
                    #default="{ errors, invalid, validate, processing }"
                    class="flex flex-col gap-4"
                >
                    <label class="input">
                        <span class="label">E-mailアドレス</span>
                        <input
                            type="email"
                            name="email"
                            :defaultValue="user?.email"
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
                        <span class="label">名前</span>
                        <input
                            type="text"
                            name="name"
                            :defaultValue="user?.name"
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
                        value="修正"
                        class="btn btn-primary"
                    />
                    <Link :href="home()" class="btn btn-secondary"
                        >キャンセル</Link
                    >
                </Form>
            </div>
        </div>
    </div>
</template>
