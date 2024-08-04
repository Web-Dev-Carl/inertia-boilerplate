<template>
    <div
        class="flex items-center justify-between border-t border-gray-200 bg-white pt-4 mb-4 sm:px-6">
        <div class="flex flex-1 justify-between sm:hidden">
            <Link
                :href="data.prev_page_url"
                class="relative inline-flex items-center rounded-l border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                Previous
            </Link>
            <Link
                :href="data.next_page_url"
                class="relative ml-3 inline-flex items-center rounded-r border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                Next
            </Link>
        </div>
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Showing
                    <span class="font-medium">{{ data.from }}</span>
                    to
                    <span class="font-medium">{{ data.from + data.per_page }}</span>
                    of
                    <span class="font-medium">{{ data.total }}</span>
                    results
                </p>
            </div>
            <div>
                <nav aria-label="Pagination"
                     class="isolate inline-flex -space-x-px rounded-md shadow-sm">
                    <Link
                        :href="data.prev_page_url"
                        class="relative ml-3 inline-flex items-center rounded-l border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                        <i class="fa-sharp fa-solid fa-angles-left mr-4"></i> Previous
                    </Link>
                    <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
                    <Link
                        v-for="link in data.links.slice(1, -1)"
                        :key="link.url"
                        :class="link.active ?
                                                'z-10 bg-indigo-600 text-white focus-visible:outline-offset-2 focus-visible:outline-indigo-600 outline-2 focus-visible:outline focus-visible:outline-2'
                                                : 'text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50'"
                        :href="link.url"
                        aria-current="link.active ? 'page' : false"
                        class="relative inline-flex items-center px-4 py-2 text-sm font-semibold focus:z-20 focus:outline-offset-0"
                        v-html="link.label">
                    </Link>
                    <Link
                        :href="data.next_page_url"
                        class="relative ml-3 inline-flex items-center rounded-r border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                        Next <i class="fa-sharp fa-solid fa-angles-right ml-4"></i>
                    </Link>
                </nav>
            </div>
        </div>
    </div>
    <!--    {{ data }}-->
</template>

<script>
export default {
    name: "Paginator",
    props: {
        'data': Object
    }
}
</script>

<style scoped>

</style>
