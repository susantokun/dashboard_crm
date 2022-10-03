import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/frontend/app.css',
                'resources/js/frontend/app.js',

                'resources/css/backend/app.css',
                'resources/js/backend/app.js',
            ],
            refresh: true,
        }),
    ],
});
