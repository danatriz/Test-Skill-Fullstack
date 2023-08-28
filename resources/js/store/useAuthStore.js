import { defineStore } from 'pinia';
import api from '../api';

export const useAuthStore = defineStore('auth', {
    // TODO : Fixing get Token
    state: () => ({
        user: null,
        token: localStorage.getItem('token') || '',
        errors: '',
    }),
    getters: {
        getUser: (state) => state.user,
        getToken: (state) => state.token,
        getErrors: (state) => state.errors,
    },
    actions: {
        async login(credentials, password) {
            try {
                const response = await api.post('/login', {
                    credentials,
                    password,
                });
                const { user, token } = response.data;
                this.setUser(user);
                this.setToken(token);
                api.defaults.headers['Authorization'] = `Bearer ${token}`;
                return true;
            } catch (error) {
                this.setErrors('Login failed. Please check your credentials.');
                return false;
            }
        },
        setUser(user) {
            this.user = user;
        },
        setToken(token) {
            localStorage.setItem('token', token);
            this.token = token;
        },
        async logout() {
            this.user = null;
            this.token = '';
            delete api.defaults.headers['Authorization'];
            localStorage.removeItem('token');
        },
        setErrors(errors) {
            this.errors = errors;
        },
        clearErrors() {
            this.errors = '';
        },
    },
});