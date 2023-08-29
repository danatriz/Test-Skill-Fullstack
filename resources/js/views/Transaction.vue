<template>
    <Navbar />
    <Breadcrumb
        :pageTitle="'Transactions'"
        :breadcrumbItems="breadcrumbItems"
    />

    <!-- !BEGIN: Container -->
    <div
        class="container mx-auto px-2 min-h-[calc(100vh-138px)] relative pb-14"
    >
        <!-- !BEGIN Grid -->
        <div
            class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4"
        >
            <div
                class="sm:col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-12"
            >
                <!-- !BEGIN: Card -->
                <div class="card">
                    <div class="card-header flex justify-between items-center">
                        <h3 class="card-title">Transaction Table</h3>
                        <div class="flex items-center">
                            <input
                                v-model="searchQuery"
                                @input="performSearch"
                                class="px-3 py-2 border rounded-md focus:outline-none"
                                placeholder="Search products..."
                            />
                            <button
                                class="ml-3 px-3 py-2 bg-blue-500 text-white text-sm font-semibold rounded hover:bg-blue-600"
                                @click="clearSearch"
                            >
                                Clear
                            </button>
                            <button
                                class="ml-3 px-3 py-2 bg-green-500 text-white text-sm font-semibold rounded hover:bg-green-600"
                                @click="createNewProduct"
                            >
                                Create New
                            </button>
                        </div>
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        <!-- component -->
                        <div class="relative overflow-x-auto sm:rounded">
                            <table
                                class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                            >
                                <thead class="justify-between">
                                    <tr class="bg-gray-800 dark:bg-slate-700">
                                        <th
                                            scope="col"
                                            class="px-5 py-3 text-slate-200 text-center"
                                        >
                                            No.
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-5 py-3 text-slate-200 text-center"
                                        >
                                            Reference Number
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-5 py-3 text-slate-200 text-center"
                                        >
                                            Price
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-5 py-3 text-slate-200 text-center"
                                        >
                                            Quantity
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-5 py-3 text-slate-200 text-center"
                                        >
                                            Payment Amount
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-5 py-3 text-slate-200 text-center"
                                        >
                                            Action
                                        </th>
                                    </tr>
                                </thead>

                                <tbody
                                    v-if="transactions.length > 0"
                                    class="bg-gray-200"
                                >
                                    <tr
                                        class="bg-white dark:bg-slate-900/95"
                                        v-for="(
                                            transaction, index
                                        ) in transactions"
                                        :key="index"
                                    >
                                        <td class="px-5 py-3 text-center">
                                            {{ index + 1 }}
                                        </td>
                                        <td class="px-5 py-3 text-center">
                                            {{ transaction.reference_no }}
                                        </td>
                                        <td class="px-5 py-3 text-center">
                                            {{ transaction.price }}
                                        </td>
                                        <td class="px-5 py-3 text-center">
                                            {{ transaction.quantity }}
                                        </td>
                                        <td class="px-5 py-3 text-center">
                                            {{ transaction.payment_amount }}
                                        </td>
                                        <td class="text-center px-5 py-3">
                                            <button
                                                @click="
                                                    editTransaction(
                                                        transaction.id
                                                    )
                                                "
                                                class="bg-primary-500 text-white px-3 py-2 border rounded-lg text-sm hover:bg-white hover:border-primary-500-500 hover:text-black mr-2"
                                            >
                                                Edit
                                            </button>
                                            <button
                                                @click="
                                                    deleteTransaction(
                                                        transaction.id
                                                    )
                                                "
                                                class="bg-red-500 text-white px-3 py-2 border rounded-lg text-sm hover:bg-white hover:border-red-500-500 hover:text-black"
                                            >
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody v-else>
                                    <tr>
                                        <td align="center" colspan="3">
                                            No record found.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="relative">
                        <div
                            v-if="pagination.last_page > 1"
                            class="card-footer"
                        >
                            <ul
                                class="inline-flex -space-x-px list-inside my-2"
                            >
                                <li v-if="pagination.prev_page_url">
                                    <a
                                        @click="
                                            fetchPage(
                                                pagination.current_page - 1
                                            )
                                        "
                                        class="py-2 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                        >Previous</a
                                    >
                                </li>
                                <li
                                    v-for="page in pagination.last_page"
                                    :key="page"
                                >
                                    <a
                                        @click="fetchPage(page)"
                                        :class="{
                                            'py-2 px-3 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white':
                                                page !==
                                                pagination.current_page,
                                            'py-2 px-3 text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white':
                                                page ===
                                                pagination.current_page,
                                        }"
                                        >{{ page }}</a
                                    >
                                </li>
                                <li v-if="pagination.next_page_url">
                                    <a
                                        @click="
                                            fetchPage(
                                                pagination.current_page + 1
                                            )
                                        "
                                        class="py-2 px-3 text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                        >Next</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- !END: Card -->
            </div>
        </div>
        <!-- !END Grid -->
        <Footer />
    </div>
    <!-- !END: Container -->
</template>
<script>
import { onMounted, ref } from "vue";
import Navbar from "@components/Navbar.vue";
import Footer from "@components/Footer.vue";
import Breadcrumb from "@components/Breadcrumb.vue";
import { useTransactionStore } from "@/store/useTransactionStore";

export default {
    name: "Transaction",
    components: {
        Navbar,
        Breadcrumb,
    },
    setup() {
        const transactionStore = useTransactionStore();
        const transactions = ref([]);

        onMounted(async () => {
            await transactionStore.fetchTransactions();
            transactions.value = transactionStore.getTransactions;
        });

        const editTransaction = (productId) => {
            // Add the logic to handle the edit action here
            console.log("Edit Transaction with ID:", productId);
        };

        const deleteTransaction = (productId) => {
            // Add the logic to handle the delete action here
            console.log("Delete Transaction with ID:", productId);
        };

        const fetchPage = async (pageNumber) => {
            await transactionStore.fetchTransactions(pageNumber);
            transactions.value = transactionStore.getTransactions;
        };

        return {
            transactions,
            breadcrumbItems: [
                { label: "Data Andalan Utama", to: "/" },
                { label: "Dashboard", to: "/dashboard" },
                { label: "Transactions", to: "/transaction" },
            ],
            editTransaction,
            deleteTransaction,
            fetchPage,
            pagination: transactionStore.getPagination,
        };
    },
};
</script>
