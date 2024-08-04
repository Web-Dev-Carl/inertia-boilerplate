<template>
    <Head>
        <title>Users Page - Inertia Boiler Plate App</title>
        <meta
            content="This is a test description for users page"
            head-key="description"
            type="description"
        />
    </Head>
    <div class="w-full md:mt-8">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Users</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including
                        their name,
                        title, email and role.</p>
                </div>
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <input
                        v-model="search"
                        class="border border-[1px] rounded-md py-2 px-4 md:mt-6"
                        placeholder="search..."
                        type="text"
                    />
                    <!--                    <button-->
                    <!--                        class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"-->
                    <!--                        type="button">-->
                    <!--                        Add user-->
                    <!--                    </button>-->
                </div>
            </div>

            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                            <tr>
                                <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0"
                                    scope="col">Name
                                </th>
                                <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900" scope="col">
                                    Email
                                </th>
                                <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900" scope="col">
                                    Status
                                </th>
                                <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900" scope="col">Role
                                </th>
                                <th class="relative py-3.5 pl-3 pr-4 sm:pr-0" scope="col">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="user in users.data" key="user.id">
                                <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                    <div class="flex items-center">
                                        <div class="h-11 w-11 flex-shrink-0">
                                            <img alt=""
                                                 class="h-11 w-11 rounded-full"
                                                 src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80">
                                        </div>
                                        <div class="ml-4">
                                            <div class="font-medium text-gray-900">{{ user.name }}</div>
                                            <div class="mt-1 text-gray-500">{{ user.email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                    <div class="text-gray-900">Front-end Developer</div>
                                    <div class="mt-1 text-gray-500">Optimization</div>
                                </td>
                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                    <span
                                        class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Active</span>
                                </td>
                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">Member</td>
                                <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                    <a class="text-indigo-600 hover:text-indigo-900" href="#">Edit<span class="sr-only">, Lindsay Walton</span></a>
                                </td>
                            </tr>

                            <!-- More people... -->
                            </tbody>
                        </table>
                        <Paginator :data="users"/>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script setup>
import Paginator from "../../Components/Paginator.vue";
import {ref, watch} from "vue";
import {Inertia} from "@inertiajs/inertia"

let props = defineProps({
    users: Object,
    filters: Object
});

let search = ref(props.filters.search);

watch(search, value => {
    Inertia.get('/users', {search: value}, {
        preserveState: true,
        replace: true, // prevents new history records
    });
});

</script>

<style scoped>

</style>
