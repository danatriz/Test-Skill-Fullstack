<template>
    <div>
        <Navbar />
        <!-- !BEGIN: Breadcrumb -->
        <div class="container mx-auto px-2">
            <div class="flex flex-wrap">
                <div class="flex items-center py-4 w-full">
                    <div class="w-full">
                        <div class="">
                            <div class="flex flex-wrap justify-between">
                                <div class="items-center">
                                    <h1
                                        class="font-semibold text-xl mb-0 block dark:text-slate-100"
                                    >
                                        Dashboard
                                    </h1>
                                    <ol class="list-reset flex text-sm">
                                        <li>
                                            <router-link
                                                to="/"
                                                class="text-gray-500"
                                                >Data Andalan Utama</router-link
                                            >
                                        </li>
                                        <li>
                                            <span class="text-gray-500 mx-2"
                                                >/</span
                                            >
                                        </li>

                                        <li>
                                            <router-link
                                                to="/dashboard"
                                                class="text-blue-600 hover:text-blue-700"
                                                >Dashboard</router-link
                                            >
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- !END: Breadcrumb -->

        <div
            class="container mx-auto px-2 min-h-[calc(100vh-138px)] relative pb-14"
        >
            <div
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-4 mb-4"
            >
                <div
                    class="sm:col-span-1 md:col-span-1 lg:col-span-1 xl:col-span-1"
                >
                    <div class="card">
                        <div class="card-body">
                            <div class="flex flex-wrap content-between">
                                <div class="">
                                    <p
                                        class="uppercase text-slate-400 font-medium text-xs"
                                    >
                                        Transactions
                                    </p>
                                    <h4
                                        class="text-center font-medium text-[20px] dark:text-slate-300"
                                    >
                                        78
                                    </h4>
                                </div>
                                <div class="ml-auto self-center">
                                    <i
                                        class="ti ti-brand-asana text-3xl text-slate-400"
                                    ></i>
                                </div>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
                <div
                    class="sm:col-span-1 md:col-span-1 lg:col-span-1 xl:col-span-1"
                >
                    <div class="card">
                        <div class="card-body">
                            <div class="flex flex-wrap content-between">
                                <div class="">
                                    <p
                                        class="uppercase text-slate-400 font-medium text-xs"
                                    >
                                        Products
                                    </p>
                                    <h4
                                        class="text-center font-medium text-[20px] dark:text-slate-300"
                                    >
                                        40
                                        <span
                                            class="focus:outline-none text-[10px] bg-green-100 text-green-500 dark:text-green-600 rounded font-medium py-[2px] px-2"
                                            >Active</span
                                        >
                                    </h4>
                                </div>
                                <div class="ml-auto self-center">
                                    <i
                                        class="ti ti-subtask text-3xl text-slate-400"
                                    ></i>
                                </div>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
                <div
                    class="sm:col-span-1 md:col-span-1 lg:col-span-1 xl:col-span-1"
                >
                    <div class="card">
                        <div class="card-body">
                            <div class="flex flex-wrap content-between">
                                <div class="">
                                    <p
                                        class="uppercase text-slate-400 font-medium text-xs"
                                    >
                                        Total Penjulan
                                    </p>
                                    <h4
                                        class="text-center font-medium text-[20px] dark:text-slate-300"
                                    >
                                        801:30
                                    </h4>
                                </div>
                                <div class="ml-auto self-center">
                                    <i
                                        class="ti ti-clock text-3xl text-slate-400"
                                    ></i>
                                </div>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
                <div
                    class="sm:col-span-1 md:col-span-1 lg:col-span-1 xl:col-span-1"
                >
                    <div class="card">
                        <div class="card-body">
                            <div class="flex flex-wrap content-between">
                                <div class="">
                                    <p
                                        class="uppercase text-slate-400 font-medium text-xs"
                                    >
                                        Total Pendapatan
                                    </p>
                                    <h4
                                        class="text-center font-medium text-[20px] dark:text-slate-300"
                                    >
                                        $24100
                                    </h4>
                                </div>
                                <div class="ml-auto self-center">
                                    <i
                                        class="ti ti-currency-dollar text-3xl text-slate-400"
                                    ></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <Footer />
        </div>
    </div>
</template>

<script>
import { useAuthStore } from "../store/useAuthStore";
import Swal from "sweetalert2";
import { useToast } from "vue-toastification";
import Navbar from "../components/Navbar.vue";
//import Footer from "../components/Footer.vue";

export default {
    name: "Dashboard",
    components: {
        Navbar,
        //Footer,
    },
    data() {
        return {
            isFirstTimeRedirect: true,
        };
    },
    setup() {
        const toast = useToast();
        return { toast };
    },
    watch: {
        $route(to, from) {
            if (this.isFirstTimeRedirect) {
                this.isFirstTimeRedirect = false;
                // Reload the page
                location.reload();
            }
        },
    },
    methods: {
        async handleLogout() {
            const confirmation = await Swal.fire({
                icon: "warning",
                title: "Logout",
                text: "Are you sure you want to logout?",
                showCancelButton: true,
                confirmButtonText: "Logout",
                cancelButtonText: "Cancel",
                reverseButtons: true,
                width: "25rem",
            });

            if (confirmation.isConfirmed) {
                // Call the logout action in useAuthStore
                await useAuthStore().logout();

                // Get the success and error messages from the store
                const successMessage = useAuthStore().getSuccess;
                const errorMessage = useAuthStore().getErrors;

                if (successMessage) {
                    this.toast.success(successMessage, {
                        position: "top-right",
                        timeout: 3000,
                        closeOnClick: true,
                        pauseOnFocusLoss: true,
                        pauseOnHover: true,
                        draggable: true,
                        draggablePercent: 0.6,
                        showCloseButtonOnHover: false,
                        hideProgressBar: true,
                        closeButton: "button",
                        icon: true,
                        rtl: false,
                    });
                } else if (errorMessage) {
                    this.toast.error(errorMessage, {
                        position: "top-right",
                        timeout: 3000,
                        closeOnClick: true,
                        pauseOnFocusLoss: true,
                        pauseOnHover: true,
                        draggable: true,
                        draggablePercent: 0.6,
                        showCloseButtonOnHover: false,
                        hideProgressBar: true,
                        closeButton: "button",
                        icon: true,
                        rtl: false,
                    });
                }
                this.$router.push("/login");
            } else {
                this.toast.info("Logout cancelled", {
                    position: "top-right",
                    timeout: 3000,
                    closeOnClick: true,
                    pauseOnFocusLoss: true,
                    pauseOnHover: true,
                    draggable: true,
                    draggablePercent: 0.6,
                    showCloseButtonOnHover: false,
                    hideProgressBar: true,
                    closeButton: "button",
                    icon: true,
                    rtl: false,
                });
            }
        },
    },
};
</script>
