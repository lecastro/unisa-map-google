<template>
<div>
    <SearchComponent @searchGmapMarker="loadLocations"></SearchComponent>
    <GmapMap :center="sp" :zoom="7" style="width: 100%; height: 600px">
        <gmap-info-window :options="infoOptions" :position="infoPosition" :opened="infoOpened" @closeclick="infoOpened=false">
            <div id='title' style="width: 300px;">
                <h5>{{ this.infoName }}</h5>
                <section>
                    <p>Rua: {{this.infoStreet}}, {{this.infoNumber}} - {{this.infoCity}}/{{this.infoUf}}. {{this.infoComplement}}</p>
                </section>
            </div>
        </gmap-info-window>

        <gmap-marker :key="index.id" v-for="(v, index) in universities" :position="v.position" :icon="markerOptions" :title="v.position.title" />

        <gmap-marker v-for="(item, key) in locations" :key="key" :position="getPosition(item)" @click="modalInfor(item, key)" />

    </GmapMap>

</div>
</template>

<script>
import mapMarkerIcon from '../assets/unisa.jpg';
import SearchComponent from "../components/partials/SearchGmapMarkerComponent";

export default {
    data() {
        return {
            sp: {
                lat: -23.5489,
                lng: -46.6388
            },
            //polos unisa
            universities: [{
                position: {
                    title: "R. Prof. Enéas de Siqueira Neto, 340 - Jardim das Imbuias, São Paulo - SP, 04829-300, Brazil",
                    lat: -23.7303509,
                    lng: -46.7116761
                }
            }, {
                position: {
                    title: "R. João Gonçalves, 471 - Centro, Guarulhos - SP, 07010-010, Brazil",
                    lat: -23.4665491,
                    lng: -46.5292933
                }
            }, {
                position: {
                    title: "Rua Isabel Schmidt, 349 - Santo Amaro, São Paulo - SP, 04735-004, Brazil",
                    lat: -23.6510359,
                    lng: -46.7022645
                }
            }, {
                position: {
                    title: "Rua Dr. Gabriel dos Santos, 30 - Santa Cecilia, São Paulo - SP, 01231-010, Brazil",
                    lat: -23.5328106,
                    lng: -46.6581631
                }
            }, ],
            markerOptions: {
                url: mapMarkerIcon,
                size: {
                    width: 60,
                    height: 50,
                    f: 'px',
                    b: 'px',
                },
                scaledSize: {
                    width: 50,
                    height: 45,
                    f: 'px',
                    b: 'px',
                },
            },
            infoPosition: null,
            infoName: "",
            infoStreet: "",
            infoNumber: "",
            infoCity: "",
            infoUf: "",
            infoComplement: "",
            infoOpened: false,
            infoCurrentKey: null,
            infoOptions: {
                pixelOffset: {
                    width: 0,
                    height: -35
                }
            },
        };
    },

    created() {
        this.loadLocations();
    },
    computed: {
        locations() {
            return this.$store.state.locations.items;
        }
    },
    methods: {
        loadLocations(filter) {
            this.$store.dispatch("loadLocations", filter);
        },
        search(filter) {
            this.sectionDescription = filter;
        },
        getPosition(marker) {
            return {
                lat: parseFloat(marker.lat),
                lng: parseFloat(marker.lng)
            }
        },
        modalInfor(marker, key) {
            this.infoPosition = this.getPosition(marker);
            this.infoName = marker.name;
            this.infoStreet = marker.street;
            this.infoNumber = marker.number;
            this.infoCity = marker.city;
            this.infoUf = marker.uf;
            this.infoComplement = marker.complement;
            if (this.infoCurrentKey == key) {
                this.infoOpened = !this.infoOpened
            } else {
                this.infoOpened = true
                this.infoCurrentKey = key
            }
        },
    },
    components: {
        SearchComponent
    },
};
</script>

<style>
#title h5 {
    text-align: center;
    font-size: 1.5em;
}

#title section p {
    font-size: 1.2em;
}
</style>
