import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

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
