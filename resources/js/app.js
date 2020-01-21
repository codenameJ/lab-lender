require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import Vuetify from 'vuetify'

import '@mdi/font/css/materialdesignicons.css'


Vue.use(Vuetify)


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('navbar', require('./components/NavbarComponent.vue').default);
Vue.component('table-com', require('./components/TableComponent.vue').default);
Vue.component('nahee', require('./components/NaheeComponent.vue').default);
Vue.component('esus', require('./components/NavesusComponent.vue').default);

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
});

Vue.use(Vuetify, {
    iconfont: 'mdi'
})