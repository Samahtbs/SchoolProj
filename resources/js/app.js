require("./bootstrap");

import { createApp, h } from "vue";
import { App, plugin } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";

const el = document.getElementById("app");

InertiaProgress.init();

const app = createApp({
    render: () =>
        h(App, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
        }),
});

app.config.globalProperties.$route = window.route;
app.provide("$route", window.route);

app.use(plugin).mount(el);
