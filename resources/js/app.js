require('./bootstrap');

window.Vue = require('vue');

import '@mdi/font/css/materialdesignicons.css'

import Vue from 'vue'
import Vuetify from 'vuetify'




Vue.use(Vuetify)


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('navbar', require('./components/NavbarComponent.vue').default);
Vue.component('table-com', require('./components/TableComponent.vue').default);
Vue.component('nahee', require('./components/NaheeComponent.vue').default);
Vue.component('esus', require('./components/NavesusComponent.vue').default);

Vue.component('nav-ta', require('./components/Nav_TA.vue').default);
Vue.component('navtest', require('./components/navtest.vue').default);
Vue.component('shop-cart', require('./components/ShopCart.vue').default);


const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
});

Vue.use(Vuetify, {
    iconfont: 'mdi',
})