<template>
    <Head>
        <title>Create a User</title>
    </Head>
    <h1 class="text-lg mt-4 mb-4 font-bold">Create a New User</h1>

    <form class="max-w-md mx-auto mt-8" @submit.prevent="submit">
        <div class="mb-6">
            <label
                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="name">
                Name
            </label>
            <input
                id="name"
                v-model="form.name"
                class="border border-gray-400 p-2 w-full rounded-md"
                name="name"
                required
                type="text"
            >
        </div>
        <div class="mb-6">
            <label
                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="email">
                Email
            </label>
            <input
                id="email"
                v-model="form.email"
                class="border border-gray-400 p-2 w-full rounded-md"
                name="email"
                required
                type="email"
            >
        </div>
        <div class="mb-6">
            <label
                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="password">
                Password
            </label>
            <input
                id="password"
                v-model="form.password"
                class="border border-gray-400 p-2 w-full rounded-md"
                name="password"
                required
                type="password"
            >
        </div>
        <div class="mb-6">
            <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    type="submit">
                Submit
            </button>
        </div>
    </form>
</template>

<script setup>
import {reactive} from "vue";
import {Inertia} from "@inertiajs/inertia";

let form = reactive({
    'name': '',
    'email': '',
    'password': '',
});

let submit = () => {
    Inertia.post('/users', form);
}
</script>

<style scoped>

</style>
