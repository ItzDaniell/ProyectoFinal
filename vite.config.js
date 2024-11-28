import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/style.css',
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/mostrar_modal_crear.js',
                'resources/js/mostrar_modal_busq_cat.js',
                'resources/js/vista_previa.js',
                'resources/js/mostrar_opciones.js'
            ],
            refresh: true,
        }),
    ],
});
