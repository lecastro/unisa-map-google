require('./bootstrap');
window.Vue = require('vue');

import * as VueGoogleMaps from "vue2-google-maps";

import store from './vuex/store';

import './Reset.css';

Vue.use(VueGoogleMaps, {
    load: {
        key: process.env.MIX_GOOGLE_MAPS_GEOCODING_API_KEY
    }
});

Vue.component('map-component', require('./components/GoogleMapComponent.vue').default);


const app = new Vue({
    el: '#app',
    store
});
