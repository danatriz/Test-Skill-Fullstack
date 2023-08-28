<template>
    <div
        class="relative flex flex-col justify-center min-h-screen overflow-hidden"
    >
        <div
            class="w-full m-auto bg-white dark:bg-slate-800/60 rounded shadow-lg ring-2 ring-slate-300/50 dark:ring-slate-700/50 lg:max-w-md"
        >
            <div
                class="text-center p-6 bg-gradient-to-r from-green-500 to-green-700 rounded-t"
            >
                <router-link to="/"
                    ><img
                        src="@images/new-logo.png"
                        alt=""
                        class="w-14 h-14 mx-auto mb-2"
                /></router-link>
                <h3 class="font-semibold text-gray-900 text-xl mb-1">
                    Masuk Akun
                </h3>
                <p class="text-sm text-gray-700">
                    Buat kamu yang sudah terdaftar, silakan masuk ke akunmu.
                </p>
            </div>

            <form class="p-6" @submit.prevent="handleLogin">
                <div>
                    <label
                        for="credentials"
                        class="block text-sm font-medium text-gray-700"
                        >Username, email atau nomor telepon</label
                    >
                    <input
                        id="credentials"
                        v-model="credentials"
                        type="text"
                        placeholder="Masukkan Username, email atau nomor telepon"
                        class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm mt-1"
                        required
                        autofocus
                    />
                </div>

                <div class="mt-2">
                    <label
                        for="password"
                        class="block text-sm font-medium text-gray-700"
                        >Password</label
                    >
                    <input
                        id="password"
                        v-model="password"
                        type="password"
                        placeholder="Masukkan password"
                        required
                        class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm mt-1"
                    />
                </div>

                <a href="#" class="text-xs text-gray-600 hover:underline"
                    >Lupa Password?</a
                >

                <div class="mt-5">
                    <button
                        type="submit"
                        class="flex w-full justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                    >
                        Login
                    </button>
                </div>
            </form>
            <p class="mb-5 text-sm font-medium text-center text-slate-500">
                Belum punya akun?
                <router-link
                    to="/register"
                    class="font-medium text-green-600 hover:underline"
                    >Daftarkan Dirimu</router-link
                >
            </p>
        </div>
    </div>
</template>

<script>
import { useAuthStore } from "../store/useAuthStore";
import { useToast } from "vue-toastification";

export default {
    name: "Login",
    data() {
        return {
            credentials: "",
            password: "",
            success: "",
            errors: "",
        };
    },
    setup() {
        const toast = useToast();
        return { toast };
    },
    methods: {
        async handleLogin() {
            const success = await useAuthStore().login(
                this.credentials,
                this.password
            );

            if (success) {
                const message = useAuthStore().getSuccess;
                this.toast.success(message, {
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
                this.$router.push("/dashboard");
            } else {
                const message = useAuthStore().getErrors;
                this.toast.error(message, {
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
    beforeRouteEnter(to, from, next) {
        next((vm) => {
            if (to.query.username) {
                vm.credentials = to.query.username;
            }
            if (to.query.password) {
                vm.password = to.query.password;
            }
        });
    },
};
</script>
