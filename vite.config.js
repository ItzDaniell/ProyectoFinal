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
                'resources/js/mostrar_opciones.js',
                'resources/js/opciones.js',
                'resources/js/check_form_ban.js',
                'resources/js/mostrar_busqueda_nombre.js',
                'resources/js/mostrar_modal_reporte.js',
                'resources/js/autocomplete.js',
                'resources/js/autocomplete-ponentes.js',
                'resources/js/opciones_publicacion.js',
            ],
            refresh: true,
        }),
    ],
});
