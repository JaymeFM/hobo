<script setup>
import {ref, reactive} from 'vue';

const searchQuery = ref("")
const genreQuery = ref("")

const genres = reactive({table: {}})
const series = reactive({table: {}})

async function getGenres() {
    var fetchedData = await (await fetch(`http://localhost:8000/getGenres.php`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        }
    })).json();

    genres.table = fetchedData;
}

async function updateSeries() {
    console.log('test')
    var fetchedData = await (await fetch(`http://localhost:8000/search.php`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({search: searchQuery.value, genre: genreQuery.value})
    })).json();

    for(const serie of fetchedData) {
        var serieId = serie.SerieID
        var imageId = ""


        if(serieId < 10000) {
            imageId += "0"
        }

        if(serieId < 1000) {
            imageId += "0"
        }

        if(serieId < 100) {
            imageId += "0"
        }
        
        if(serieId < 10) {
            imageId += "0"
        }

        imageId += serieId

        serie.ImageID = imageId

        console.log(serie)
    }

    series.table = fetchedData;

    console.log(fetchedData)
}

getGenres()
updateSeries()

</script>

<template>
<div>
    <div class="row q-col-gutter-sm">
        <div class="col-10">
            <q-input filled dark color="secondary" squared v-model="searchQuery" @update:model-value="updateSeries" label="Search" />
        </div>
        <div class="col-2">
            <q-select
            filled
            square
            dark
            color="secondary"
            :options="genres.table"
            v-model="genreQuery"
            option-value="GenreNaam"
            option-label="GenreNaam"
            emit-value
            map-options
            clearable
            label="Genre"
            @update:model-value="updateSeries" 
            />
        </div>
    </div>
    <div class="row q-col-gutter-sm q-mt-md">
        <div class="col-2" v-for="(serie, serieId) in series.table" :key="serieId">
            <router-link :to="`serie/${serie.SerieID}`">
                <img :src="`serieImages/${serie.ImageID}.jpg`">
            </router-link>
        </div>
    </div>
</div>
</template>

<style scoped>
::v-deep .q-field {
    background-color: #292929;
}
::v-deep .q-field__native {
    color: white;
}

img {
    width: 100%;
}
</style>