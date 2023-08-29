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
                    Pendaftaran
                </h3>
                <p class="text-sm text-gray-700">
                    Mohon isi data berikut dengan benar.
                </p>
            </div>

            <form class="p-6" @submit.prevent="handleRegister">
                <!-- ! BEGIN: Full Name -->
                <div>
                    <label
                        for="name"
                        class="block text-sm font-medium text-gray-700"
                        >Nama Lengkap <span class="text-red-500">*</span></label
                    >
                    <div>
                        <input
                            id="name"
                            v-model="name"
                            type="text"
                            placeholder="Masukkan Nama Lengkap"
                            class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm mt-1"
                            required
                            autofocus
                        />
                    </div>
                </div>
                <!-- ! END: Full Name -->

                <!-- ! BEGIN: Username -->
                <div class="mt-2">
                    <label
                        for="username"
                        class="block text-sm font-medium text-gray-700"
                        >Username <span class="text-red-500">*</span></label
                    >
                    <div>
                        <input
                            id="username"
                            v-model="username"
                            type="text"
                            placeholder="Masukkan Username"
                            class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm mt-1"
                            required
                        />
                    </div>
                </div>
                <!-- ! END: Username -->

                <!-- ! BEGIN: Email -->
                <div class="mt-2">
                    <label
                        for="email"
                        class="block text-sm font-medium text-gray-700"
                        >Email <span class="text-red-500">*</span></label
                    >
                    <div>
                        <input
                            id="email"
                            v-model="email"
                            type="email"
                            autocomplete="email"
                            placeholder="Masukkan Email"
                            class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm mt-1"
                            required
                        />
                    </div>
                </div>
                <!-- ! END: Email -->

                <!-- ! BEGIN: Password -->
                <div class="mt-2">
                    <label
                        for="password"
                        class="block text-sm font-medium text-gray-700"
                        >Password <span class="text-red-500">*</span></label
                    >
                    <div>
                        <input
                            id="password"
                            v-model="password"
                            type="password"
                            autocomplete="password"
                            placeholder="Masukkan Password"
                            class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm mt-1"
                            required
                        />
                    </div>
                </div>
                <!-- ! END: Password -->

                <!-- ! BEGIN: Confirm Password -->
                <div class="mt-2">
                    <label
                        for="password_confirmation"
                        class="block text-sm font-medium text-gray-700"
                        >Confirm Password
                        <span class="text-red-500">*</span></label
                    >
                    <div>
                        <input
                            id="password_confirmation"
                            v-model="password_confirmation"
                            type="password"
                            autocomplete="password_confirmation"
                            placeholder="Masukkan Confirm Password"
                            class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm mt-1"
                            required
                        />
                    </div>
                </div>
                <!-- ! END: Confirm Password -->

                <!-- ! BEGIN Checkbox -->
                <div class="block mt-4">
                    <label class="custom-label" for="terms_and_conditions">
                        <div
                            class="bg-white border dark:bg-slate-700 dark:border-slate-600 border-slate-200 rounded w-4 h-4 inline-block leading-4 text-center -mb-[3px]"
                        >
                            <input
                                type="checkbox"
                                id="terms_and_conditions"
                                v-model="terms_and_conditions"
                            />

                            <i
                                class="fas fa-check hidden text-xs text-slate-700 dark:text-slate-300"
                            ></i>
                        </div>
                        <span class="text-sm text-slate-500 font-medium">
                            Saya setuju dengan
                            <router-link
                                to="/register"
                                class="text-green-600 hover:underline"
                                >Syarat dan Ketentuan</router-link
                            >
                            yang berlaku.
                        </span>
                    </label>
                </div>

                <!-- ! END Checkbox -->

                <div class="mt-6">
                    <button
                        type="submit"
                        class="flex w-full justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                    >
                        Register
                    </button>
                </div>
            </form>
            <p class="mb-5 text-sm font-medium text-center text-slate-500">
                Sudah punya akun?
                <router-link
                    to="/register"
                    class="font-medium text-green-600 hover:underline"
                    >Masuk di sini</router-link
                >
            </p>
        </div>
    </div>
</template>
<script>
import { useAuthStore } from "../store/useAuthStore";
import { useToast } from "vue-toastification";

export default {
    name: "Register",
    data() {
        return {
            name: "",
            username: "",
            email: "",
            password: "",
            password_confirmation: "",
            terms_and_conditions: false,
            success: "",
            errors: "",
        };
    },
    setup() {
        const toast = useToast();
        return { toast };
    },
    methods: {
        async handleRegister() {
            const userData = {
                name: this.name,
                username: this.username,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation,
            };

            const success = await useAuthStore().register(userData);

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
                this.$router.push({
                    path: "/login",
                    query: { username: this.username, password: this.password },
                });
            } else {
                const errorMessage = useAuthStore().getErrors;
                if (typeof errorMessage === "object") {
                    // If the error message is an object, extract the first error message
                    const firstErrorMessage = Object.values(errorMessage)[0][0];
                    this.toast.error(firstErrorMessage, {
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
                } else
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
        },
    },
};
</script>
