import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js'],
            refresh: true,
        }),
    ],
    // Conectar Front
    server: {
        host: '0.0.0.0',
        port: 5200,
        hmr: {
            host: 'localhost'
        },
        watch: {
            usePolling: true
        }
    },
});

