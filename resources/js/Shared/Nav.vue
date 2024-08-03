<template>
    <nav class="p-2 bg-gray-200 w-full">
        <ul class="flex justify-between p-4">
            <slot/>
            <li class="">
                <Link :class="{'underline font-bold': $page.component === 'Home'}" href="/">
                    Home
                </Link>
            </li>
            <li class="">
                <Link :class="{'underline font-bold': $page.component === 'Users'}" href="/users">
                    Users
                </Link>
            </li>
            <li class="">
                <Link :class="{'underline font-bold': $page.component === 'Settings'}" href="/settings">
                    Settings
                </Link>
            </li>
            <li class="">
                <Link as="button" href="/logout" method="post">
                    Logout
                </Link>
            </li>
        </ul>
    </nav>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';

export default {
    name: "Nav",
    components: {Link}
}
</script>

<style scoped>

</style>
