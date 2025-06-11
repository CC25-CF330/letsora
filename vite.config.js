<<<<<<< HEAD
import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
=======
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
>>>>>>> 3ef3099052e14de089eebe2788b119aaee282291

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/timer.js",
                "resources/js/calendar.js",
                "resources/js/activity.js",
                "resources/js/schedule.js",
            ],
            refresh: true,
        }),
    ],
});
