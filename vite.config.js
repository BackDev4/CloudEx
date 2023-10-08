import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/views/front/css/bootstrap.min.css',
                'resources/views/front/css/normalize.css',
                'resources/views/front/css/style.css',
                'resources/views/front/js/calculator.js',
                'resources/views/front/js/dashboard.js',
                'resources/views/front/js/hideinput.js',
                'resources/views/front/js/bootstrap.bundle.js'
            ],
            refresh: true,
        }),
    ],
});
