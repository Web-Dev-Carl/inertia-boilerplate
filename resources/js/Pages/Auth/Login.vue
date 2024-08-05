<template>
    <div class="p-4 md:p-0">
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
            <div class="mb-6 gap-4 md:flex w-full">
                <button :disabled="form.processing"
                        :readonly="form.processing"
                        class="bg-blue-400 text-white rounded hover:bg-blue-500 w-full md:w-1/3 text-sm px-3 py-4 md-4 md:mb-0"
                        type="submit">
                    Login
                </button>
                <a class="bg-gray-200 text-slate-700 rounded py-2 px-4 hover:bg-gray-300 pt-4 pb-4 md:pt-4 text-center md:t-4 md:ml-4 w-full text-sm block"
                   href="/auth/google/redirect">
                    <i class="fa-brands fa-google"></i> Login with Google
                </a>
                <div class="w-full text-center md:text-right md:pt-3">
                    <Link class="text-xs hover:text-blue-500 underline w-full md:w-1/3"
                          href="/password-reset">Forgot Your Credentials?
                    </Link>
                </div>
            </div>
        </form>
    </div>
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
