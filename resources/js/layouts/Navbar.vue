<script setup lang="ts">
import { home, login, logout, register } from '@/routes';
import { edit as editUserInfo } from '@/routes/updateUserInfo';
import { edit as editPassword } from '@/routes/updatePassword';
import { Link, usePage } from '@inertiajs/vue3';
const page = usePage();
</script>
<template>
    <nav class="navbar bg-base-100 shadow-sm">
        <div class="navbar-start">
            <span
                v-if="!page.props.auth.user"
                class="btn btn-ghost pointer-events-none text-xl"
                >{{ page.props.name }}</span
            >
            <Link
                :href="home()"
                v-if="page.props.auth.user"
                class="btn btn-ghost text-xl"
                >{{ page.props.name }}</Link
            >
            <Link
                :href="home()"
                v-if="page.props.auth.user"
                class="btn btn-ghost"
                >ホーム</Link
            >
        </div>
        <div v-if="!page.props.auth.user" class="navbar-end">
            <Link :href="login()" class="btn btn-ghost">ログイン</Link>
            <div class="divider divider-horizontal"></div>
            <Link :href="register()" class="btn btn-ghost">会員登録</Link>
        </div>
        <div v-if="page.props.auth.user" class="navbar-end">
            <details class="dropdown">
                <summary class="btn btn-ghost m-1">
                    {{ page.props.auth.user.name }}さん ▼
                </summary>
                <ul
                    class="menu dropdown-content bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm"
                >
                    <li><Link :href="editUserInfo()">アカウント情報修正</Link></li>
                    <li><Link :href="editPassword()">パスワード変更</Link></li>
                    <li><Link :href="logout()">ログアウト</Link></li>
                </ul>
            </details>
        </div>
    </nav>
</template>
