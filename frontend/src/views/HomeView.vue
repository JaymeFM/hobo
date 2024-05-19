<script setup>
    import { reactive } from 'vue';

    const series = reactive({
        table: {}
    })

    async function run() {
        var fetchedData = await (await fetch('http://localhost:8000/getSeries.php', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            }
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

        series.table = fetchedData
    }

    run()
</script>

<template>
    <div>
        <router-link v-for="(serie, serieId) in series.table" :key="serieId" :to="`serie/${serie.SerieID}`">
            <img  :src="`serieImages/${serie.ImageID}.jpg`">
        </router-link>
    </div>
</template>