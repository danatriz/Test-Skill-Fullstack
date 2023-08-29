<template>
    <div class="container mx-auto px-2">
        <div class="flex flex-wrap">
            <div class="flex items-center py-4 w-full">
                <div class="w-full">
                    <div class="">
                        <div class="flex flex-wrap justify-between">
                            <div class="items-center">
                                <h1
                                    class="font-semibold text-xl mb-0 block dark:text-slate-100"
                                >
                                    {{ pageTitle }}
                                </h1>
                                <ol class="list-reset flex text-sm">
                                    <li
                                        v-for="(item, index) in breadcrumbItems"
                                        :key="index"
                                    >
                                        <router-link
                                            :to="item.to"
                                            class="text-gray-500"
                                        >
                                            {{ item.label }}
                                        </router-link>
                                        <span
                                            v-if="
                                                index <
                                                breadcrumbItems.length - 1
                                            "
                                            class="text-gray-500 mx-2"
                                            >/</span
                                        >
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        pageTitle: {
            type: String,
            required: true,
        },
        breadcrumbItems: {
            type: Array,
            default: () => [],
        },
    },
};
</script>

<style>
/* Add your custom CSS styles for the breadcrumb component here, if needed */
</style>
