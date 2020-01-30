require('./bootstrap');

window.Vue = require('vue');

import '@mdi/font/css/materialdesignicons.css'

import Vue from 'vue'
import Vuetify from 'vuetify'




Vue.use(Vuetify)


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('table-com', require('./components/TableComponent.vue').default);

Vue.component('shop-cart', require('./components/ShopCart.vue').default);

Vue.component('app-layout', require('./components/ApplayoutComponent.vue').default);
Vue.component('temp', require('./components/TempComponent.vue').default);



const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
});

Vue.use(Vuetify, {
    iconfont: 'mdi',
})