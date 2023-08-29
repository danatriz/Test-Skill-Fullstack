<template>
    <div
        class="relative flex flex-col justify-center min-h-screen overflow-hidden"
    >
        <div
            class="w-full m-auto bg-white dark:bg-green-800/60 rounded shadow-lg ring-2 ring-slate-300/50 dark:ring-slate-700/50 lg:max-w-md"
        >
            <div class="text-center p-6 bg-white-900 rounded-t">
                <router-link to="/"
                    ><img
                        src="@images/logo-sm.png"
                        alt=""
                        class="w-14 h-14 mx-auto mb-2"
                /></router-link>
                <h3 class="font-semibold text-white text-xl mb-1">
                    Masuk Akun
                </h3>
                <p class="text-xs text-slate-400">
                    Jika sudah memiliki akun, silahkan masuk
                </p>
            </div>

            <form class="p-6" @submit.prevent="handleLogin">
                <!-- ! BEGIN : Credentials -->
                <div>
                    <label for="credentials" class="label"
                        >Username, email atau nomor telepon</label
                    >
                    <input
                        id="credentials"
                        type="text"
                        v-model="credentials"
                        class="form-control dark:bg-slate-800/60 dark:border-slate-700/50"
                        placeholder="Masukkan Username, email atau nomor telepon"
                        required
                        autofocus
                    />
                </div>
                <!-- ! END : Credentials -->

                <!-- ! BEGIN : Password -->
                <div class="mt-4">
                    <label for="password" class="label">Password</label>
                    <input
                        id="password"
                        type="password"
                        v-model="password"
                        class="form-control dark:bg-slate-800/60 dark:border-slate-700/50"
                        placeholder="*********"
                        required
                    />
                </div>
                <!-- ! END : Password -->

                <!-- ! BEGIN : Forget Password -->
                <router-link
                    to="#"
                    class="text-xs text-gray-600 hover:underline"
                    >Lupa password?</router-link
                >
                <!-- ! END : Forget Password -->
                <!-- ! BEGIN : Remember Me -->
                <div class="block mt-3">
                    <label class="custom-label">
                        <div
                            class="bg-white dark:bg-slate-700 dark:border-slate-600 border border-slate-200 rounded w-4 h-4 inline-block leading-4 text-center -mb-[3px]"
                        >
                            <input type="checkbox" class="hidden" />
                            <i
                                class="fas fa-check hidden text-xs text-slate-700 dark:text-slate-300"
                            ></i>
                        </div>
                        <span class="text-sm text-slate-500 font-medium"
                            >Ingat saya</span
                        >
                    </label>
                </div>
                <!-- ! END : Remember Me -->
                <div class="mt-6">
                    <button
                        class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600"
                    >
                        Login
                    </button>
                </div>
            </form>
            <p class="mb-5 text-sm font-medium text-center text-slate-500">
                Belum punya akun?
                <router-link
                    to="/register"
                    class="font-medium text-blue-600 hover:underline"
                    >Daftar Akun</router-link
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
                window.location.href = "/product";
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
