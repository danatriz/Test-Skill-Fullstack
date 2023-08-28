import { defineStore } from "pinia";
import api from "../api";

export const useAuthStore = defineStore("auth", {
    state: () => ({
        token: localStorage.getItem("token") || null,
        user: JSON.parse(localStorage.getItem("user")) || null,
        success: "",
        errors: "",
    }),
    getters: {
        getToken: (state) => state.token,
        getUser: (state) => state.user,
        getSuccess: (state) => state.success,
        getErrors: (state) => state.errors,
        isLoggedIn: (state) => state.token !== null,
    },
    actions: {
        setToken(token) {
            this.token = token;
            localStorage.setItem("token", token);
        },
        setUser(user) {
            this.user = user;
            localStorage.setItem("user", JSON.stringify(user));
        },
        setSuccess(success) {
            this.success = success;
        },
        setErrors(errors) {
            this.errors = errors;
        },

        clearData() {
            this.token = null;
            this.user = null;
            localStorage.removeItem("token");
            localStorage.removeItem("user");
        },
        async login(credentials, password) {
            try {
                // Call the login endpoint on the server
                const response = await api.post("/login", {
                    credentials,
                    password,
                });

                // Get the success message from the response or set a generic message
                const successMessage =
                    response.data?.message || "Login successful.";
                this.setSuccess(successMessage);

                // Get Token and User from the response
                const { token, user } = response.data.data;
                // Set the token and user data to the state using existing actions
                this.setToken(token);
                this.setUser(user);
                // Clear the error message from the state
                this.setErrors("");
                // Return true to indicate successful login
                return true;
            } catch (error) {
                // Check if the error is from the server
                if (
                    error.response &&
                    error.response.data &&
                    error.response.data.message
                ) {
                    // Get the error message from the response
                    const { message } = error.response.data;
                    this.setErrors(message);
                } else {
                    // If the error doesn't have the expected structure, set a generic error message
                    this.setErrors("An error occurred during login.");
                }
                // Console log the error
                console.log("Message: ", error.response?.data?.message);
                // Return false to indicate failed login
                return false;
            }
        },

        async register(userData) {
            try {
                // Call the register endpoint on the server
                const response = await api.post("/register", userData);

                // Get the success message from the response or set a generic message
                const successMessage =
                    response.data?.message || "Registration successful.";
                this.setSuccess(successMessage);

                // Get Token and User from the response
                const { token, user } = response.data.data;
                // Set the token and user data to the state using existing actions
                this.setToken(token);
                this.setUser(user);
                // Clear the error message from the state
                this.setErrors("");
                // Return true to indicate successful registration
                return true;
            } catch (error) {
                // Check if the error is from the server
                if (
                    error.response &&
                    error.response.data &&
                    error.response.data.message
                ) {
                    // Get the error message from the response
                    const { message } = error.response.data;
                    this.setErrors(message);
                } else {
                    // If the error doesn't have the expected structure, set a generic error message
                    this.setErrors("An error occurred during registration.");
                }
                // Console log the error
                console.log("Message: ", error.response?.data?.message);
                // Return false to indicate failed registration
                return false;
            }
        },

        async fetchUserData() {
            try {
                // Call the user endpoint on the server to get the user data
                const response = await api.get("/user");
                // Get the user data from the response
                const user = response.data.data;
                // Set the user data to the state using existing action
                this.setUser(user);
            } catch (error) {
                // Get the error message from the response
                const { message } = error.response.data;
                // Set the error message to the state
                this.setErrors(message);
                console.log(error);
            }
        },

        async logout() {
            try {
                // Call the logout endpoint on the server
                const response = await api.post("/logout");
                // Get the success message from the response or set a generic message
                const successMessage =
                    response.data?.message || "Logout successful.";
                this.setSuccess(successMessage);
            } catch (error) {
                // Get the error message from the response
                const { message } = error.response.data;
                // Set the error message to the state
                this.setErrors(message);
                console.log(error);
            } finally {
                // Clear the token and user data from the state and localStorage
                this.clearData();
            }
        },
    },
});
