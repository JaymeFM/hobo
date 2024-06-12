<script setup>
    import { reactive } from 'vue';

    // const series = reactive({
    //     table: {}
    // })

    // async function run() {
    //     var fetchedData = await (await fetch('http://localhost:8000/getHome.php', {
    //         method: 'GET',
    //         headers: {
    //             'Content-Type': 'application/json',
    //         }
    //     })).json();

    //     for(const serie of fetchedData) {
    //         var serieId = serie.SerieID
    //         var imageId = ""


    //         if(serieId < 10000) {
    //             imageId += "0"
    //         }

    //         if(serieId < 1000) {
    //             imageId += "0"
    //         }

    //         if(serieId < 100) {
    //             imageId += "0"
    //         }
            
    //         if(serieId < 10) {
    //             imageId += "0"
    //         }

    //         imageId += serieId

    //         serie.ImageID = imageId

    //         console.log(serie)
    //     }

    //     series.table = fetchedData
    // }

    // run()

    const serverData = reactive({table: {}})

    async function getServerData() {
        var fetchedData = await (await fetch(`http://localhost:8000/getHome.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            }
        })).json();

        for(const genreName in fetchedData.genres) {
            const genre = fetchedData.genres[genreName]
            for(const serie of genre) {
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

            }

            serverData.table[genreName] = {}
            for (let i = 0; i < genre.length / 6; i++) {
                serverData.table[genreName][i] = []
                for(const serieNumber in genre) {
                    if(Math.floor(serieNumber / 6) == i) {
                        serverData.table[genreName][i].push(genre[serieNumber])
                    }
                }
            }
        }
        serverData.table = fetchedData;
    } 

    getServerData()

</script>

<template>
    <div>
        <!-- <div v-for="(genre, genreNumber) in genres.table" :key="genreID">
            <div class="title">{{ genre.GenreNaam }}</div>

        </div> -->

        <!-- <router-link v-for="(serie, serieId) in series.table" :key="serieId" :to="`serie/${serie.SerieID}`">
            <img  :src="`serieImages/${serie.ImageID}.jpg`">
        </router-link> -->
    </div>
</template>

<style scoped>
.title {
    font-size: 50px;
    color: white;
}
</style>