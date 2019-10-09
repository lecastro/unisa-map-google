<template>

<div class="container">
    <h4>Geolocalização google maps.</h4>
    <div id="search">
        <label>Filtro:</label>
        <select v-model="filter" @change="search">
            <option v-for="(item ,key) in sectionDescription" :key="key">{{item}}</option>
        </select>
    </div>
</div>
</template>

<script>
import sectionDescription from '../../Utils/SectionDescriptionList';

export default {
    data() {
        return {
            sectionDescription,
            filter: "",
        };
    },
    methods: {
        search() {
            this.$emit("searchGmapMarker", this.filter);
        }
    }
};
</script>

<style scoped>
h4 {
    font-size: 2.5em;
    text-align: center;
}

#search {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 15px;
}

#search label {
    font-size: 1.6em;
    margin: 0 15px;
}

#search select {
    font-size: 1em;
    border-radius: .3em;
    width: 300px;
    height: 25px;
    border: 1px solid transparent;
}
</style>
