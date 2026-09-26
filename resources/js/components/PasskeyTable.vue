<script setup lang="ts">
import PasskeyItem from './PasskeyItem.vue';
import type { Passkey } from '@/types';

const { passkeys } = defineProps<{ passkeys: Passkey[] }>();
</script>
<template>
    <table class="table">
        <thead>
            <tr>
                <th>端末名</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <PasskeyItem
                v-for="passkey in passkeys"
                :key="passkey.id"
                :passkey="passkey"
            />
        </tbody>
    </table>
</template>
