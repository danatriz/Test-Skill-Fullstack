<template>
    <div>
        <nav
            class="border-red-200 bg-red-900 px-2.5 py-2.5 shadow-sm light:bg-slate-800 sm:px-4 block print:hidden"
        >
            <div
                class="container mx-0 flex max-w-full flex-wrap items-center lg:mx-auto"
            >
                <div class="flex items-center">
                    <a href="#" class="flex items-center outline-none">
                        <img src="@images/logo-sm.png" alt="" class="h-6" />
                        <img
                            src="@images/logo.png"
                            alt=""
                            class="ml-2 hidden xl:block mt-1"
                        />
                    </a>
                </div>

                <div
                    class="order-2 hidden w-full items-center justify-between md:order-1 md:ml-5 md:flex md:w-auto"
                    id="mobile-menu-2"
                >
                    <ul
                        class="font-body text-white mt-4 flex flex-col font-medium md:mt-0 md:flex-row md:text-sm md:font-medium space-x-0 md:space-x-4 lg:space-x-6 xl:space-x-8 navbar"
                    >
                        <!-- ! BEGIN : Dashbaord Dropdown -->
                        <li class="dropdown">
                            <button
                                id="navDashboardLink"
                                data-dropdown-toggle="navDashboard"
                                class="dropdown-toggle flex w-full items-center border-b border-gray-800 py-2 px-3 font-medium md:border-0 md:p-0"
                            >
                                <i
                                    class="ti ti-smart-home mr-1 pb-1 text-lg"
                                ></i>
                                Dashboards
                                <i
                                    class="ti ti-chevron-down ml-auto lg:ml-1"
                                ></i>
                            </button>
                            <!-- Dropdown menu -->
                            <div
                                id="navDashboard"
                                class="dropdown-menu z-10 my-1 hidden w-full list-none divide-y divide-gray-100 rounded bg-gray-800 md:bg-white text-base shadow border border-slate-700 md:border-white dark:border-slate-700/50 dark:divide-gray-600 dark:bg-gray-900 md:w-44 dropdown-menu"
                            >
                                <ul class="py-1">
                                    <li>
                                        <a
                                            href="/product"
                                            class="nav-link dark:hover:bg-slate-800/70"
                                            >Product</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            href="/transaction"
                                            class="nav-link dark:hover:bg-slate-800/70"
                                            >Transaction</a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ! END : Dashbaord Dropdown -->
                        <!-- !BEGIN: Product Dropdown -->
                        <li class="dropdown">
                            <button
                                id="navAppsLink"
                                data-dropdown-toggle="navApps"
                                class="dropdown-toggle flex w-full items-center border-b border-gray-800 py-2 px-3 font-medium md:border-0 md:p-0"
                            >
                                <i class="ti ti-bucket mr-1 pb-1 text-lg"></i>
                                Product
                                <i
                                    class="ti ti-chevron-down ml-auto lg:ml-1"
                                ></i>
                            </button>
                            <!-- Dropdown menu -->
                            <div
                                id="navApps"
                                class="dropdown-menu z-10 my-1 hidden w-full list-none divide-y divide-gray-100 rounded bg-gray-800 md:bg-white text-base shadow dark:divide-gray-600 border border-slate-700 md:border-white dark:border-slate-700/50 dark:bg-gray-900 md:w-44 dropdown-menu"
                            >
                                <ul class="py-1">
                                    <li>
                                        <router-link
                                            to="/product"
                                            class="nav-link dark:hover:bg-slate-800/70"
                                            >Tampil Produk</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link
                                            to="/product"
                                            class="nav-link dark:hover:bg-slate-800/70"
                                            >Tambah Produk</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link
                                            to="/product"
                                            class="nav-link dark:hover:bg-slate-800/70"
                                            >Ubah Produk</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link
                                            to="/product"
                                            class="nav-link dark:hover:bg-slate-800/70"
                                            >Hapus Produk</router-link
                                        >
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- !END: Product Dropdown -->
                        <!-- !BEGIN: Transaction Dropdown -->
                        <li class="dropdown">
                            <button
                                id="navAppsLink"
                                data-dropdown-toggle="navApps"
                                class="dropdown-toggle flex w-full items-center border-b border-gray-800 py-2 px-3 font-medium md:border-0 md:p-0"
                            >
                                <i class="ti ti-report mr-1 pb-1 text-lg"></i>
                                Transaction
                                <i
                                    class="ti ti-chevron-down ml-auto lg:ml-1"
                                ></i>
                            </button>
                            <!-- Dropdown menu -->
                            <div
                                id="navApps"
                                class="dropdown-menu z-10 my-1 hidden w-full list-none divide-y divide-gray-100 rounded bg-gray-800 md:bg-white text-base shadow dark:divide-gray-600 border border-slate-700 md:border-white dark:border-slate-700/50 dark:bg-gray-900 md:w-44 dropdown-menu"
                            >
                                <ul class="py-1">
                                    <li>
                                        <router-link
                                            to="/transaction"
                                            class="nav-link dark:hover:bg-slate-800/70"
                                            >Tampil Transaction</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link
                                            to="/transaction"
                                            class="nav-link dark:hover:bg-slate-800/70"
                                            >Tambah Transaction</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link
                                            to="/transaction"
                                            class="nav-link dark:hover:bg-slate-800/70"
                                            >Ubah rransaction</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link
                                            to="/transaction"
                                            class="nav-link dark:hover:bg-slate-800/70"
                                            >Hapus Transactirn</router-link
                                        >
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- !END: Transaction Dropdown -->
                    </ul>
                </div>
                <div class="order-1 ml-auto flex items-center md:order-2">
                    <div class="mr-2 lg:mr-4">
                        <button
                            id="toggle-theme"
                            class="flex rounded-full md:mr-0 relative"
                        >
                            <i class="ti ti-sun top-icon"></i>
                        </button>
                    </div>

                    <div class="mr-2 lg:mr-0 dropdown relative" v-if="user">
                        <button
                            type="button"
                            class="dropdown-toggle flex items-center rounded-full text-sm focus:bg-none focus:ring-0 dark:focus:ring-0 md:mr-0"
                            id="user-profile"
                            aria-expanded="false"
                            data-dropdown-toggle="navUserdata"
                        >
                            <img
                                class="h-8 w-8 rounded-full"
                                :src="user.image"
                                alt="user photo"
                            />

                            <span class="ml-2 hidden text-left xl:block">
                                <span class="block font-medium text-gray-400">{{
                                    user.name
                                }}</span>
                                <span
                                    class="-mt-1 block text-sm font-medium text-gray-500"
                                    >{{ user.username }}</span
                                >
                            </span>
                        </button>

                        <div
                            class="dropdown-menu dropdown-menu-right z-50 my-1 hidden list-none divide-y divide-gray-100 rounded border-slate-700 md:border-white text-base shadow dark:divide-gray-600 bg-white dark:bg-slate-800"
                            id="navUserdata"
                        >
                            <div class="py-3 px-4" v-if="user">
                                <span
                                    class="block text-sm font-medium text-gray-900 dark:text-white"
                                    >{{ user.name }}</span
                                >
                                <span
                                    class="block truncate text-sm font-normal text-gray-500 dark:text-gray-400"
                                    >{{ user.email }}</span
                                >
                            </div>
                            <ul class="py-1" aria-labelledby="navUserdata">
                                <li>
                                    <a
                                        href="#"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-900/20 dark:hover:text-white"
                                        >Profile</a
                                    >
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-900/20 dark:hover:text-white"
                                        >Setting</a
                                    >
                                </li>
                                <li>
                                    <button
                                        @click="handleLogout"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-900/20 dark:hover:text-white"
                                    >
                                        Logout
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <button
                        data-collapse-toggle="mobile-menu-2"
                        type="button"
                        id="toggle-menu"
                        class="ml-1 inline-flex items-center rounded-lg text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-0 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 md:hidden"
                        aria-controls="mobile-menu-2"
                        aria-expanded="false"
                    >
                        <span class="sr-only">Open main menu</span>
                        <i class="ti ti-menu-2 h-6 w-6 text-lg leading-6"></i>
                        <i class="ti ti-X hidden h-6 w-6 text-lg leading-6"></i>
                    </button>
                </div>
            </div>
        </nav>
    </div>
</template>
<script>
import { useAuthStore } from "../store/useAuthStore";
import Swal from "sweetalert2";
import { useToast } from "vue-toastification";

export default {
    name: "Navbar",
    setup() {
        const toast = useToast();
        return { toast };
    },
    computed: {
        user() {
            return useAuthStore().getUser;
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
