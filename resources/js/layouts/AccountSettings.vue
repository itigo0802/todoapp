<script setup lang="ts">
import { index } from '@/routes/passkey';
import { edit as editPassword } from '@/routes/updatePassword';
import { edit as editUserInfo } from '@/routes/updateUserInfo';
import { Link, usePage } from '@inertiajs/vue3';

const url = usePage().url;
</script>
<template>
    <div>
        <ul class="menu bg-base-100 min-h-screen shadow-xl">
            <li>
                <Link
                    :href="editUserInfo()"
                    :class="{ 'menu-active': url === editUserInfo.url() }"
                    >ユーザー情報変更</Link
                >
            </li>
            <li>
                <Link
                    :href="editPassword()"
                    :class="{ 'menu-active': url === editPassword.url() }"
                    >パスワード変更</Link
                >
            </li>
            <li>
                <Link
                    :href="index()"
                    :class="{ 'menu-active': url === index.url() }"
                    >パスキー設定</Link
                >
            </li>
        </ul>
    </div>
</template>
