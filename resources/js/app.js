import "./bootstrap";
import { createApp } from "vue";
import { createPinia } from "pinia";
import router from "./router";
import App from "./App.vue";
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";

// * Create pinia instance
const pinia = createPinia();
// * Create vue app
const app = createApp(App);

// * Mount pinia instance and router
app.use(pinia);
app.use(Toast);
app.use(router);
app.mount("#app");
