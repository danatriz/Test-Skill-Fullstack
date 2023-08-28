+<template>
    <div>
        <h1>Login Page</h1>
        <form @submit.prevent="login">
            <label for="credentials">Email/Username:</label>
            <input type="text" v-model="credentials" required />
            <label for="password">Password:</label>
            <input type="password" v-model="password" required />
            <button type="submit">Login</button>
        </form>
        <p v-if="errors" style="color: red">{{ errors }}</p>
    </div>
</template>

<script>
import { useAuthStore } from "../store/useAuthStore";

export default {
    name: "Login",
    data() {
        return {
            credentials: "",
            password: "",
            errors: "",
        };
    },
    methods: {
        async login() {
            const credentials = this.credentials;
            const password = this.password;
            const authStore = useAuthStore();

            const success = await authStore.login(credentials, password);

            if (success) {
                // Redirect to dashboard or other page after successful login
                this.$router.push({ name: "Dashboard" });
            } else {
                this.errors = authStore.getErrors;
            }
        },
    },
};
</script>