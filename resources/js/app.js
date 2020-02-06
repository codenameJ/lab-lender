require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');

import '@mdi/font/css/materialdesignicons.css'

import Vue from 'vue'
import Vuetify from 'vuetify'




Vue.use(Vuetify)


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('table-com', require('./components/TableComponent.vue').default);

Vue.component('shop-cart', require('./components/ShopCart.vue').default);

Vue.component('app-layout', require('./components/ApplayoutComponent.vue').default);
Vue.component('temp', require('./components/TempComponent.vue').default);

Vue.component('equipment', require('./components/EquipComponent.vue').default);
Vue.component('equipment-admin', require('./components/EquipAdminComponent.vue').default);
Vue.component('user-admin', require('./components/UserComponent.vue').default);

Vue.component('welcome-card', require('./components/WelcomeCard.vue').default);

Vue.component('announce-add', require('./components/AnnounceAddComponent.vue').default);
Vue.component('announce-show', require('./components/AnnounceShowComponent.vue').default);

Vue.component('home-card', require('./components/Home_card.vue').default);
Vue.component('home-alert', require('./components/Home_alert.vue').default);

Vue.component('footer-lab', require('./components/FooterComponent.vue').default);


const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
});

Vue.use(Vuetify, {
    iconfont: 'mdi',
})