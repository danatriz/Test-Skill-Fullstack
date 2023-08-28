<template>
    <div>
        <h1>Login Page</h1>
        <form @submit.prevent="handleLogin">
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
//import Swal from "sweetalert2"; // Import SweetAlert

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
    methods: {
        async handleLogin() {
            const success = await useAuthStore().login(
                this.credentials,
                this.password
            );

            if (success) {
                 // Show success message using SweetAlert
                 const message = useAuthStore().getSuccess;
                Swal.fire({
                    icon: "success",
                    title: "Login Successful",
                    text: message,
                });

                this.$router.push("/dashboard");
            } else {
                const message = useAuthStore().getErrors;
                // Show error message using SweetAlert
                Swal.fire({
                    icon: "error",
                    title: "Login Failed",
                    text: message,
                });
            }
        },
    },
};
</script>
