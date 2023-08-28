<template>
    <div>
        <h1>Dashboard Page</h1>
        <button @click="handleLogout">Logout</button>

<!-- Goto Home -->
<router-link to="/">Home</router-link>
    </div>
</template>

<script>
import { useAuthStore } from "../store/useAuthStore";
//import Swal from "sweetalert2"; // Import SweetAlert

export default {
    name: "Dashboard",
    methods: {
        async handleLogout() {
            // Show confirmation dialog using SweetAlert
            const confirmation = await Swal.fire({
                icon: "warning",
                title: "Logout",
                text: "Are you sure you want to logout?",
                showCancelButton: true,
                confirmButtonText: "Logout",
                cancelButtonText: "Cancel",
                reverseButtons: true,
            });

            if (confirmation.isConfirmed) {
                // Call the logout action in useAuthStore
                await useAuthStore().logout();

                // Get the success and error messages from the store
                const successMessage = useAuthStore().getSuccess;
                const errorMessage = useAuthStore().getErrors;

                if (successMessage) {
                    // Show success message using SweetAlert
                    Swal.fire({
                        icon: "success",
                        title: "Logout Successful",
                        text: successMessage,
                    });
                } else if (errorMessage) {
                    // Show error message using SweetAlert
                    Swal.fire({
                        icon: "error",
                        title: "Logout Failed",
                        text: errorMessage,
                    });
                }

                this.$router.push("/login");
            } else {
                // Show error message using SweetAlert
                Swal.fire({
                    icon: "error",
                    title: "Logout Failed",
                    text: "Logout cancelled",
                });
            }
        },
    },
};
</script>