import { defineStore } from "pinia";
import api from "../api";

export const useTransactionStore = defineStore("transaction", {
    state: () => ({
        transactions: [],
        error: "",
        currentPage: null,
        firstPageUrl: "",
        from: null,
        lastPage: null,
        lastPageUrl: "",
        links: [],
        nextPageUrl: "",
        path: "",
        perPage: null,
        prevPageUrl: "",
        to: null,
        total: null,
        pagination: {},
    }),
    getters: {
        getTransactions: (state) => state.transactions,
        getError: (state) => state.error,
        getCurrentPage: (state) => state.currentPage,
        getData: (state) => state.transactions,
        getFirstPageUrl: (state) => state.firstPageUrl,
        getFrom: (state) => state.from,
        getLastPage: (state) => state.lastPage,
        getLastPageUrl: (state) => state.lastPageUrl,
        getLinks: (state) => state.links,
        getNextPageUrl: (state) => state.nextPageUrl,
        getPath: (state) => state.path,
        getPerPage: (state) => state.perPage,
        getPrevPageUrl: (state) => state.prevPageUrl,
        getTo: (state) => state.to,
        getTotal: (state) => state.total,
        getPagination: (state) => state.pagination,
    },
    actions: {
        async fetchTransactions() {
            try {
                const response = await api.get("/transactions");
                const { data } = response.data;
                this.transactions = data.data;
                this.pagination = data;
                this.currentPage = data.current_page;
                this.firstPageUrl = data.first_page_url;
                this.from = data.from;
                this.lastPage = data.last_page;
                this.lastPageUrl = data.last_page_url;
                this.links = data.links;
                this.nextPageUrl = data.next_page_url;
                this.path = data.path;
                this.perPage = data.per_page;
                this.prevPageUrl = data.prev_page_url;
                this.to = data.to;
                this.total = data.total;
                this.setError("");
            } catch (error) {
                const { message } = error.response?.data || {
                    message: "Unknown error occurred.",
                };
                this.setError(message);
                console.log("Error: ", error);
            }
        },

        setError(message) {
            this.error = message;
        },

        // TODO: Add other actions here
    },
});
