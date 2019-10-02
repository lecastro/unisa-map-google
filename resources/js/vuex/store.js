import Vue from 'vue';
import Vuex from 'vuex';

import locations from './modules/locations/locations.js';

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        locations
    }
});

export default store;
