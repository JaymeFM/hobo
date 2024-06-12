<script setup>
import { useRoute } from 'vue-router';
import { reactive, ref } from 'vue';

const route = useRoute();
const serieId = route.params.serieId;

const serie = reactive({
    table: {}
})

const seasonSelected = ref(1)

async function run() {
    var fetchedData = await (await fetch(`http://localhost:8000/getSerie.php?serieId=${serieId}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        }
    })).json();

   serie.table = fetchedData

   for(const season of serie.table.seasons) {
    season.Name = `Seizoen ${season.Rang}`;
   }
   console.log(fetchedData)
}

function getThumbnail() {
    var serieId = serie.table.serie[0].SerieID
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

    return `../serieImages/${imageId}.jpg`
}

console.log(serie.table)

run()
</script>

<template>
    <div class="q-pa-xl">
        <div class="q-pa-xl">
            <div class="margin">
                <iframe class="video" allow="fullscreen;"
                    :src="serie.table.serie[0].TrailerVideo">
                </iframe>
                <div class="q-pa-md infoContainer q-mt-xl">
                    <div class="row">
                        <div class="col-2">
                            <img class="thumbnail" :src="getThumbnail()">
                        </div>

                        <div class="col-6 q-px-md">
                            <div class="title">{{ serie.table.serie[0].SerieTitel }}</div>
                            <div class="genres row q-col-gutter-sm">
                                <div v-for="(genre, genreNummer) in serie.table.genres" :key="genreNummer"  class="col-2">
                                    <div class="genre">{{ genre.GenreNaam }}</div>
                                </div>
                            </div>
                            <div class="moreinformation">More information <a target="_blank" :href="serie.table.serie[0].IMDBLink">here</a></div>
                        </div>

                        <div class="col-4 seasonInfo">
                            <q-select
                                filled
                                square
                                dark
                                color="primary"
                                v-model="seasonSelected"
                                :options="serie.table.seasons"
                                option-value="Rang"
                                option-label="Name"
                                option-disable="inactive"
                                emit-value
                                map-options
                            />
                            <q-tab-panels v-model="seasonSelected" style="background: none"  class="q-mt-md">
                                <q-tab-panel v-for="(season, seasonId) in serie.table.seasons" :key="seasonId" :name="season.Rang" class="row q-pa-none q-col-gutter-xs">
                                    <div  class="col-6" v-for="(episode, episodeId) in season.Episodes" :key="episodeId">
                                        <q-btn :ripple="{ color: 'primary'}" flat no-caps dark align="left" class="seasonButton full-width">{{ episode.AflTitel }}</q-btn>
                                    </div>
                                </q-tab-panel>
                            </q-tab-panels>
                        </div>
                    </div>




                    
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">
.margin {
    width: 80%;
    margin: auto;
}

.infoContainer {
    background-color: #444444;
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.video {
    width: 100%;
    aspect-ratio: 16/9;
    border: 1px solid rgba(255, 255, 255, 0.3);
    width:100%;
    height:100%;
}

.thumbnail {
    width: 100%;
    border: 1px solid rgba(255,255,255,0.3);
}

.title {
    margin-top: -10px;
    color: white;
    font-size: 40px;
    font-weight: 200;
}

::v-deep .q-field {
    background-color: #292929;
}

::v-deep .q-field__native {
    color: white;
}

.q-btn {
    border-radius: 0;
    background-color: #383838;
    color: white;
}

::v-deep .q- {
    background-color: #383838;
}

.genre {
    text-align: center;
    color: white;
    background-color: $secondary;
    padding: 10px;
}

.moreinformation {
    margin-top: 10px;
    color: white;
    a {
        color: $primary;
    }
}
</style>