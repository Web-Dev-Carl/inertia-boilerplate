<template>
    <Head>
        <title>Login</title>
    </Head>
    <h1 class="text-lg mt-4 mb-4 font-bold">Login</h1>

    <form class="max-w-md mx-auto mt-8" @submit.prevent="submit">
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
            <div v-if="form.errors.email"
                 class="text-red-500 mt-4 text-xs"
                 v-text="form.errors.email">
            </div>
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
            <div v-if="form.errors.password"
                 class="text-red-500 mt-4 text-xs"
                 v-text="form.errors.password">
            </div>
        </div>
        <div class="mb-6">
            <button :disabled="form.processing"
                    :readonly="form.processing"
                    class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    type="submit">
                Login
            </button>
            <a class="bg-gray-200 text-slate-700 rounded py-3 px-4 hover:bg-gray-300 ml-4"
               href="/auth/google/redirect">
                <i class="fa-brands fa-google"></i> Login with Google
            </a>
        </div>
    </form>
</template>

<script>
import {useForm} from '@inertiajs/vue3'
import AuthLayout from '../../Shared/AuthLayout.vue'

export default {
    setup() {
        const form = useForm({
            email: '',
            password: '',
        })

        const submit = () => {
            form.post('/login')
        }

        return {
            form,
            submit
        }
    },
    layout: AuthLayout
}
</script>

<style scoped>
</style>
