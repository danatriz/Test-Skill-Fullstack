<template>
    <div class="bg-white">
        <div class="relative overflow-hidden">
            <header>
                <Popover class="relative bg-white">
                    <div
                        class="mx-auto flex max-w-7xl items-center justify-between p-6 md:justify-start md:space-x-10 lg:px-8"
                    >
                        <div class="flex justify-start lg:w-0 lg:flex-1">
                            <a href="#">
                                <span class="sr-only">Your Company</span>
                                <img
                                    class="h-8 w-auto sm:h-10"
                                    src="@images/new-logo.png"
                                    alt=""
                                />
                            </a>
                        </div>
                        <div class="-my-2 -mr-2 md:hidden">
                            <PopoverButton
                                class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                            >
                                <span class="sr-only">Open menu</span>
                                <Bars3Icon class="h-6 w-6" aria-hidden="true" />
                            </PopoverButton>
                        </div>
                        <PopoverGroup
                            as="nav"
                            class="hidden space-x-10 md:flex"
                        >
                            <Popover class="relative" v-slot="{ open }">
                                <PopoverButton
                                    :class="[
                                        open
                                            ? 'text-gray-500'
                                            : 'text-gray-900',
                                        'group inline-flex items-center rounded-md bg-white text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2',
                                    ]"
                                >
                                    <span>Hosting</span>
                                    <ChevronDownIcon
                                        :class="[
                                            open
                                                ? 'text-gray-600'
                                                : 'text-gray-400',
                                            'ml-2 h-5 w-5 group-hover:text-gray-500',
                                        ]"
                                        aria-hidden="true"
                                    />
                                </PopoverButton>

                                <transition
                                    enter-active-class="transition ease-out duration-200"
                                    enter-from-class="opacity-0 translate-y-1"
                                    enter-to-class="opacity-100 translate-y-0"
                                    leave-active-class="transition ease-in duration-150"
                                    leave-from-class="opacity-100 translate-y-0"
                                    leave-to-class="opacity-0 translate-y-1"
                                >
                                    <PopoverPanel
                                        class="absolute z-10 -ml-4 mt-3 w-screen max-w-md transform lg:left-1/2 lg:ml-0 lg:max-w-2xl lg:-translate-x-1/2"
                                    >
                                        <div
                                            class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5"
                                        >
                                            <div
                                                class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8 lg:grid-cols-2"
                                            >
                                                <a
                                                    v-for="item in hostings"
                                                    :key="item.name"
                                                    :href="item.href"
                                                    class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50"
                                                >
                                                    <div
                                                        class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-md bg-gradient-to-r from-green-600 to-lime-600 text-white sm:h-12 sm:w-12"
                                                    >
                                                        <component
                                                            :is="item.icon"
                                                            class="h-6 w-6"
                                                            aria-hidden="true"
                                                        />
                                                    </div>
                                                    <div class="ml-4">
                                                        <p
                                                            class="text-base font-medium text-gray-900"
                                                        >
                                                            {{ item.name }}
                                                        </p>
                                                        <p
                                                            class="mt-1 text-sm text-gray-500"
                                                        >
                                                            {{
                                                                item.description
                                                            }}
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </PopoverPanel>
                                </transition>
                            </Popover>

                            <a
                                href="#"
                                class="text-base font-medium text-gray-900 hover:text-gray-500"
                                >Server</a
                            >
                            <a
                                href="#"
                                class="text-base font-medium text-gray-900 hover:text-gray-500"
                                >Domain</a
                            >
                            <a
                                href="#"
                                class="text-base font-medium text-gray-900 hover:text-gray-500"
                                >Solution</a
                            >
                            <a
                                href="#"
                                class="text-base font-medium text-gray-900 hover:text-gray-500"
                                >Contact</a
                            >
                        </PopoverGroup>
                        <div
                            class="hidden items-center justify-end md:flex md:flex-1 lg:w-0"
                        >
                            <router-link
                                to="/login"
                                class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-gradient-to-r from-green-500 to-green-700 bg-origin-border px-4 py-2 text-base font-medium text-white shadow-sm hover:from-green-700 hover:to-green-500"
                                >Login</router-link
                            >
                        </div>
                    </div>

                    <transition
                        enter-active-class="duration-200 ease-out"
                        enter-from-class="opacity-0 scale-95"
                        enter-to-class="opacity-100 scale-100"
                        leave-active-class="duration-100 ease-in"
                        leave-from-class="opacity-100 scale-100"
                        leave-to-class="opacity-0 scale-95"
                    >
                        <PopoverPanel
                            focus
                            class="absolute inset-x-0 top-0 z-30 origin-top-right transform p-2 transition md:hidden"
                        >
                            <div
                                class="divide-y-2 divide-gray-50 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5"
                            >
                                <div class="px-5 pt-5 pb-6">
                                    <div
                                        class="flex items-center justify-between"
                                    >
                                        <div>
                                            <img
                                                class="h-8 w-auto"
                                                src="@images/new-logo.png"
                                                alt="PT. Data Andalan Utama"
                                            />
                                        </div>
                                        <div class="-mr-2">
                                            <PopoverButton
                                                class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                            >
                                                <span class="sr-only"
                                                    >Close menu</span
                                                >
                                                <XMarkIcon
                                                    class="h-6 w-6"
                                                    aria-hidden="true"
                                                />
                                            </PopoverButton>
                                        </div>
                                    </div>
                                    <div class="mt-6">
                                        <nav class="grid grid-cols-1 gap-7">
                                            <a
                                                v-for="item in hostings"
                                                :key="item.name"
                                                :href="item.href"
                                                class="-m-3 flex items-center rounded-lg p-3 hover:bg-gray-50"
                                            >
                                                <div
                                                    class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-md bg-gradient-to-r from-green-600 to-indigo-600 text-white"
                                                >
                                                    <component
                                                        :is="item.icon"
                                                        class="h-6 w-6"
                                                        aria-hidden="true"
                                                    />
                                                </div>
                                                <div
                                                    class="ml-4 text-base font-medium text-gray-900"
                                                >
                                                    {{ item.name }}
                                                </div>
                                            </a>
                                        </nav>
                                    </div>
                                </div>
                                <div class="py-6 px-5">
                                    <div class="grid grid-cols-2 gap-4">
                                        <a
                                            href="#"
                                            class="text-base font-medium text-gray-900 hover:text-gray-500"
                                            >Server</a
                                        >
                                        <a
                                            href="#"
                                            class="text-base font-medium text-gray-900 hover:text-gray-500"
                                            >Domain</a
                                        >
                                        <a
                                            href="#"
                                            class="text-base font-medium text-gray-900 hover:text-gray-500"
                                            >Solution</a
                                        >
                                        <a
                                            href="#"
                                            class="text-base font-medium text-gray-900 hover:text-gray-500"
                                            >Contact</a
                                        >
                                    </div>
                                    <div class="mt-6">
                                        <router-link
                                            to="/login"
                                            class="flex w-full items-center justify-center rounded-md border border-transparent bg-gradient-to-r from-green-500 to-green-700 bg-origin-border px-4 py-2 text-base font-medium text-white shadow-sm hover:from-green-700 hover:to-green-500"
                                            >Login</router-link
                                        >
                                    </div>
                                </div>
                            </div>
                        </PopoverPanel>
                    </transition>
                </Popover>
            </header>

            <main>
                <div
                    class="bg-white pt-10 sm:pt-16 lg:overflow-hidden lg:pt-8 lg:pb-14"
                >
                    <div class="mx-auto max-w-7xl lg:px-8">
                        <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                            <div
                                class="mx-auto max-w-md px-6 sm:max-w-2xl sm:text-center lg:flex lg:items-center lg:px-0 lg:text-left"
                            >
                                <div class="lg:py-24">
                                    <h1
                                        class="mt-4 text-4xl font-bold tracking-tight text-black sm:mt-5 sm:text-5xl lg:mt-5 xl:text-5xl"
                                    >
                                        <span class="block">Menyediakan</span>
                                        <span
                                            class="block bg-gradient-to-r from-green-500 to-green-700 bg-clip-text text-transparent sm:pb-5 mt-5"
                                            >Hosting Terbaik</span
                                        >
                                        <span
                                            class="block bg-gradient-to-r from-green-400 to-lime-500 bg-clip-text text-transparent sm:pb-5"
                                            >Untuk Website Anda</span
                                        >
                                    </h1>
                                    <p
                                        class="text-base text-slate-900 sm:text-xl lg:text-lg xl:text-xl"
                                    >
                                        PT. Data Andalan Utama menyediakan
                                        berbagai layanan hosting yang dapat
                                        membantu Anda untuk membangun website
                                        yang cepat, aman, dan handal.
                                    </p>
                                    <div class="mt-6">
                                        <router-link
                                            to="/dashboard"
                                            class="inline-flex rounded-md border border-transparent bg-gradient-to-r from-green-500 to-green-700 bg-origin-border px-8 py-2 text-base font-medium text-white shadow-sm hover:from-green-700 hover:to-green-500"
                                            >Get started</router-link
                                        >
                                    </div>
                                </div>
                            </div>
                            <div
                                class="mt-12 -mb-16 sm:-mb-48 lg:relative lg:m-0"
                            >
                                <div
                                    class="mx-auto max-w-md px-6 sm:max-w-2xl lg:max-w-none lg:px-0"
                                >
                                    <!-- Illustration taken from Lucid Illustrations: https://lucid.pixsellz.io/ -->
                                    <img
                                        class="w-full lg:absolute lg:inset-y-0 lg:left-0 lg:h-full lg:w-auto lg:max-w-none"
                                        src="@images/server.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>

<script setup>
import { defineComponent, h } from "vue";
import {
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
} from "@headlessui/vue";
import {
    ArrowUturnLeftIcon,
    Bars3Icon,
    ChatBubbleLeftEllipsisIcon,
    DocumentChartBarIcon,
    HeartIcon,
    PencilSquareIcon,
    TrashIcon,
    UsersIcon,
    XMarkIcon,
    ServerIcon,
    CloudIcon,
    ServerStackIcon,
    AtSymbolIcon,
    ComputerDesktopIcon,
} from "@heroicons/vue/24/outline";
import { ChevronDownIcon } from "@heroicons/vue/20/solid";

const hostings = [
    {
        name: "Cloud Hosting",
        description:
            "Get your server up and running in minutes and enjoy a truly reliable cloud computing experience.",
        href: "#",
        icon: CloudIcon,
    },
    {
        name: "Web Hosting",
        description:
            "Host your website with ease and experience a truly reliable cloud computing service.",
        href: "#",
        icon: ServerStackIcon,
    },
    {
        name: "VPS Hosting",
        description:
            "Ensure the safety and security of your customers' data with our reliable VPS hosting.",
        href: "#",
        icon: ComputerDesktopIcon,
    },
    {
        name: "Email Hosting",
        description:
            "Manage your emails seamlessly with our efficient email hosting service and enjoy a reliable cloud computing experience.",
        href: "#",
        icon: AtSymbolIcon,
    },
];
</script>
