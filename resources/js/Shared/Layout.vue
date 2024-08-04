<template>
    <header class="flex w-full">
        <Nav>
            <h1 class="font-bold text-lg">My App</h1>
            <p>Welcome back {{ $page.props.auth.user.username }}</p>
        </Nav>
    </header>
    <div class="max-w-4xl mx-auto">
        <slot/>
    </div>
</template>

<script>

export default {
    name: "Layout",
}
</script>

<style scoped>

</style>
