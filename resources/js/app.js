import {createApp, h} from 'vue';
import {createInertiaApp, Link} from '@inertiajs/inertia-vue3';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {InertiaProgress} from '@inertiajs/progress';

import Layout from './Shared/Layout.vue';
import Nav from './Shared/Nav.vue';

createInertiaApp({
    resolve: async (name) => {
        const page = await resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'));
        page.default.layout = page.default.layout ?? Layout;
        return page;
    },
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .use(plugin)
            .component('Link', Link)
            .component('Nav', Nav)
            .mount(el);
    },
});

InertiaProgress.init({
    color: 'red',
    showSpinner: true,
});
