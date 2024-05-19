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
}

run()
</script>

<template>
    <div class="q-pa-xl">
        <div class="q-pa-xl">
            <div class="q-pa-md container">
                <q-select
                    filled
                    v-model="seasonSelected"
                    :options="serie.table.seasons"
                    option-value="Rang"
                    option-label="Rang"
                    option-disable="inactive"
                    emit-value
                    map-options
                    style="min-width: 250px; max-width: 300px"
                />

                <q-tab-panels v-model="seasonSelected">
                    <q-tab-panel v-for="(season, seasonId) in serie.table.seasons" :key="seasonId" :name="season.Rang">
                        <button v-for="(episode, episodeId) in season.Episodes" :key="episodeId">{{ episode.AflTitel }}</button>
                    </q-tab-panel>
                </q-tab-panels>

                
            </div>
        </div>
    </div>
</template>

<style scoped>
.container {
    background-color: white;
}
</style>