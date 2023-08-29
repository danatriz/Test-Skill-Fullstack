import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        laravel({
            input: [
                "resources/css/app.css",
                "resources/assets/css/icons.css",
                "resources/js/app.js",
                "resources/assets/libs/simplebar/simplebar.min.js",
                "resources/assets/libs/chart.js/chart.min.js",
                "resources/assets/libs/apexcharts/apexcharts.min.js",
                "resources/assets/libs/echarts/echarts.min.js",
                "resources/assets/js/main.js",
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            "@": "/resources/js",
            "@assets": "/resources/assets",
            "@store": "/resources/js/store",
            "@components": "/resources/js/components",
            "@images": "/resources/assets/images",
        },
    },
});
