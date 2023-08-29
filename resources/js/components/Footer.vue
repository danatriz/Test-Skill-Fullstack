<template>
    <!-- ! BEGIN: Footer -->
    <div class="absolute bottom-0 left-2 right-2 block print:hidden">
        <div class="container mx-auto">
            <footer
                class="footer mt-4 rounded-tr-md rounded-tl-md bg-white dark:bg-slate-800 p-4 text-center font-medium text-slate-600 dark:text-slate-400 shadow md:text-left"
            >
                Copyright &copy; {{ currentYear }}
                <strong>PT. Data Andalan Utama</strong>
                All rights reserved.
                <span
                    class="float-right hidden text-slate-600 dark:text-slate-400 md:inline-block"
                >
                    Made with
                    <i class="fa fa-heart heart text-red-500"></i> by
                </span>
            </footer>
        </div>
    </div>
    <!-- ! END: Footer -->
</template>
<script>
export default {
    name: "Footer",

    data() {
        return {
            currentYear: new Date().getFullYear(),
        };
    },
};
</script>
