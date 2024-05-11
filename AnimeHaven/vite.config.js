import laravel from "laravel-vite-plugin";
import { defineConfig } from "vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/js/app.js",
                "resources/js/product/show.js",
                "resources/js/product/admin.js",
            ],
            refresh: true,
        }),
    ],
});
