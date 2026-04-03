import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/pages/dashboard/app.js',
                'resources/js/pages/sabesp/app.js',
            ],
            refresh: true,
        }),
        vue(),
    ],
});