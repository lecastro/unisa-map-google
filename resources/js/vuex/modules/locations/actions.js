export default {
    async loadLocations({ commit }, params) {

        const resul = (await axios.get(`/api/v1/geomap/${params}`)).data;

        commit('LOAD_LOCATIONS', resul)

    },
}
