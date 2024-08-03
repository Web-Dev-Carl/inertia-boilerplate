<template>
    <header class="flex w-full">
        <Nav>
            <h1 class="font-bold text-lg">My App</h1>
        </Nav>
    </header>
    <div class="max-w-3xl mx-auto">
        <slot/>
    </div>
</template>

<script>
import Nav from "./Nav.vue";

export default {
    name: "Layout",
    components: {Nav}
}
</script>

<style scoped>

</style>
