import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
export default defineConfig({
    optimizeDeps: {
        include: ['jquery','datatables.net-bs5']
    },
    plugins: [
        laravel({
            /** input: ['resources/css/app.css', 'resources/js/app.js'], Default laravel **/
            input: [
                'resources/sass/app.scss',

                'resources/js/app.js',
                'resources/js/datatables.net-bs5.js'
            ],
            refresh: true,
        }),
    ],


    //jika di pisah
    // build: {
    //     rollupOptions: {
    //         output:{
    //             manualChunks(id) {
    //                 if (id.includes('node_modules')) {
    //                     return id.toString().split('node_modules/')[1].split('/')[0].toString();
    //                 }
    //             }
    //         }
    //     }
    // }
});
