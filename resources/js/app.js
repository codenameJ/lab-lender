require('./bootstrap');

window.Vue = require('vue');

import '@mdi/font/css/materialdesignicons.css'

import Vue from 'vue'
import Vuetify from 'vuetify'




Vue.use(Vuetify)


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('table-com', require('./components/TableComponent.vue').default);

Vue.component('nav-ta', require('./components/Nav_TA.vue').default);
Vue.component('navtest', require('./components/navtest.vue').default);
Vue.component('shop-cart', require('./components/ShopCart.vue').default);

Vue.component('Header', require('./components/HeaderComponent.vue').default);
Vue.component('Layout', require('./components/LayoutComponent.vue').default);



const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
});

Vue.use(Vuetify, {
    iconfont: 'mdi',
})