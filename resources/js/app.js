require('./bootstrap');

import {InertiaApp} from '@inertiajs/inertia-vue'
import Vue from 'vue'

Vue.component('base-nav', require('./components/UI/BaseNav').default);
Vue.component('base-panel', require('./components/UI/BasePanel').default);
Vue.component('base-input', require('./components/UI/BaseInput').default);
Vue.component('base-sidebar', require('./components/UI/BaseSidebar').default);

Vue.use(InertiaApp)

const app = document.getElementById('app')

if (app) {
    new Vue({
        render: h => h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name => require(`./Pages/${name}`).default,
            },
        }),
    }).$mount(app)
}
