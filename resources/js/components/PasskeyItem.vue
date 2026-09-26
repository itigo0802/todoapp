<script setup lang="ts">
import { destroy } from '@/routes/passkey';
import type { Passkey } from '@/types';
import { router } from '@inertiajs/vue3';

const { passkey } = defineProps<{ passkey: Passkey }>();

function handleDelete() {
    if (confirm('解除しますか？')) {
        router.delete(destroy.url(passkey.id));
    }
}
</script>
<template>
    <tr>
        <td>{{ passkey.name }}</td>
        <td>
            <button @click="handleDelete" class="btn btn-error">解除</button>
        </td>
    </tr>
</template>
