<template>
    <Head>
        <title>Users Page - Inertia Boiler Plate App</title>
        <meta
            content="This is a test description for users page"
            head-key="description"
            type="description"
        />
    </Head>
    <div class="px-5 mt-4">
        <h1 class="text-xl tracking-wider mb-4">Users</h1>
    </div>
    <div class="w-full p-4">
        <ul>
            <li v-for="user in users" :key="user.id" v-text="user.name"></li>
        </ul>
    </div>
</template>

<script setup>
defineProps({users: Array});

</script>

<style scoped>

</style>
