import {createApp, h} from 'vue';
import {createInertiaApp, Link} from '@inertiajs/inertia-vue3';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {InertiaProgress} from "@inertiajs/progress";

import Nav from "./Shared/Nav.vue";

createInertiaApp({
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .use(plugin)
            .component('Link', Link) // allows registration of global components, to add more just duplicate the line
            .component('Nav', Nav)
            .mount(el)
    },
});

InertiaProgress.init({
    color: 'red',
    showSpinner: true
});
