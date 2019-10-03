import axios from 'axios';

export default {
    state: {
        items: {
            data: []
        }
    },
    mutations: {
        LOAD_LOCATIONS(state, locations) {
            state.items = locations;
        }
    },
    actions: {
        loadLocations(context, params) {
            console.log(params);
            axios
                .get(`/api/v1/geomap/${params}`)
                .then(Response => {
                    context.commit('LOAD_LOCATIONS', Response.data);
                })

                .catch(Response => {
                    console.log(Response);
                })
        }
    },

}
