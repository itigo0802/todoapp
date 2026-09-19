import { createInertiaApp } from '@inertiajs/vue3';
import MainLayout from './layouts/MainLayout.vue';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

void createInertiaApp({
    layout: () => MainLayout,
    title: (title) => (title ? `${title} - ${appName}` : appName),
    progress: {
        color: '#4B5563',
    },
});
