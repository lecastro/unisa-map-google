require('./bootstrap');
window.Vue = require('vue');

import * as VueGoogleMaps from "vue2-google-maps";

import store from './vuex/store';

Vue.use(VueGoogleMaps, {
    load: {
        key: env('GOOGLE_MAPS_GEOCODING_API_KEY'),
    }
});

Vue.component('map-component', require('./components/GoogleMapComponent.vue').default);


const app = new Vue({
    el: '#app',
    store
});
