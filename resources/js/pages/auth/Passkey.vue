<script setup lang="ts">
import AccountSettings from '@/layouts/AccountSettings.vue';
import { Head, router } from '@inertiajs/vue3';
import { usePasskeyRegister } from '@laravel/passkeys/vue';
import { ref } from 'vue';
import PasskeyTable from '@/components/PasskeyTable.vue';
import type { Passkey } from '@/types';

const successMessage = ref<string | null>(null);
const { passkeys } = defineProps<{ passkeys: Passkey[] }>();
const name = ref('');
const { register, isLoading, error } = usePasskeyRegister({
    onSuccess: () => {
        successMessage.value = 'パスキーを登録しました。';
        router.reload({ only: ['passkeys'] });
    },
});
</script>
<template>
    <Head title="パスキー設定" />
    <div class="bg-base-200 flex min-h-screen">
        <div class="flex w-lg flex-col justify-start">
            <AccountSettings />
        </div>
        <div class="flex items-center justify-center">
            <div class="card bg-base-100 w-full max-w-sm shadow-xl">
                <div class="card-body">
                    <div v-if="successMessage" class="alert alert-success">
                        {{ successMessage }}
                    </div>
                    <h2 class="card-title">パスキー登録</h2>
                    <label class="input">
                        <span class="label">端末名</span>
                        <input type="text" v-model="name" />
                    </label>
                    <button
                        @click="register(name)"
                        class="btn btn-primary"
                        :disabled="isLoading || !name"
                    >
                        {{ isLoading ? '登録中...' : 'パスキーを登録' }}
                    </button>
                    <div v-if="error" class="text-error mt-1 text-xs">
                        {{ error }}
                    </div>
                    <div class="divider"></div>
                    <h2 class="card-title">パスキー一覧</h2>
                    <PasskeyTable :passkeys="passkeys" />
                </div>
            </div>
        </div>
    </div>
</template>
