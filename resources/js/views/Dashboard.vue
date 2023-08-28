<template>
    <div>
        <h1>Dashboard Page</h1>
        <p>Welcome, {{ user.name }}!</p>
        <button @click="logout">Logout</button>
    </div>
</template>

<script>
import { useAuthStore } from "../store/useAuthStore";

export default {
    name: "Dashboard",
    computed: {
        user() {
            const authStore = useAuthStore();
            return authStore.getUser;
        },
    },
    methods: {
        logout() {
            const authStore = useAuthStore();
            authStore.logout();
            // Redirect to login page after logout
            this.$router.push({ name: "Login" });
        },
    },
};
</script>