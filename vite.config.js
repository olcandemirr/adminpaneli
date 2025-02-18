import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss', // SCSS dosyasını ekliyoruz
                'resources/js/app.js', // JS dosyasını ekliyoruz
            ],
            refresh: true,
        }),
    ],
    server: {
        hmr: {
            host: 'localhost',
        },
    },
});
