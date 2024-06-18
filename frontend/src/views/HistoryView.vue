<script setup>
    import { userStore } from "../stores/userStore.vue";
    import { storeToRefs } from "pinia";
    import { reactive } from 'vue';
    import Cookies from 'js-cookie';

    const serverData = reactive({history: [], stats: []});

    const userData = storeToRefs(userStore());

    async function getServerData() {
        var fetchedData = await (await fetch(`http://localhost:8000/getHistory.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({email: Cookies.get('email'), password: Cookies.get('password')})
        })).json();


        for(const serie of fetchedData.history) {
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

        serverData.history = fetchedData.history;
        serverData.stats = fetchedData.stats;
    } 


    getServerData()

    function translateTime(timeInSeconds) {
        if(timeInSeconds < 60) {
            return `${timeInSeconds} Seconden`
        }

        if(Math.round(timeInSeconds / 60) < 2) {
            return `${Math.round(timeInSeconds / 60)} Minuut`
        }

        return `${Math.round(timeInSeconds / 60)} Minuten`
    }

</script>

<template>
<div>
    <div class="row q-col-gutter-md">
        <div class="col-6">
            <div class="title q-mb-md">Kijk Geschiedenis</div>
            <router-link v-for="(serie, SerieNumber) in serverData.history" :key="SerieNumber" class="col-2 row container q-mb-lg q-pa-md q-col-gutter-md" :to="userData.loggedIn.value ? `serie/${serie.SerieID}` : '../login'">
                <div class="col-2"> 
                    <img :src="`serieImages/${serie.ImageID}.jpg`">
                </div>
                <div class="col-3">
                    <p class="title">Serie</p>
                    <p>{{ serie.SerieTitel }}</p>
                    <p class="title">Aflevering</p>
                    <p>{{ serie.AflTitel }}</p>
                </div>
                <div class="col-3">
                    <p class="title">StartTijd</p>
                    <p>{{ serie.d_start }}</p>
                    <p class="title">EindTijd</p>
                    <p>{{ serie.d_eind }}</p>
                </div>
                <div class="col-3">
                    <p class="title">Duur</p>
                    <p>{{ translateTime(serie.duration_seconds) }}</p>
                </div>
            </router-link>
        </div>
        <div class="col-6">
            <div class="title">Statistieken</div>
            <div class="container q-pa-md">
                <p class="title">Favoriet Serie</p>
                <p>Serie Naam : <router-link class="link" :to="`serie/${serverData.stats.favorite.SerieID}`">{{ serverData.stats.favorite.SerieTitel }}</router-link></p>
                <p>Totaal gekeken : {{ translateTime(serverData.stats.favorite.TotalDuration) }}</p>

                <p class="title">Globaal</p>
                <p>Totaal gekeken : {{ translateTime(serverData.stats.global.TotalWatchTime) }}</p>
                <p>Gemiddelde duur kijk sessie : {{ translateTime(serverData.stats.global.AverageWatchSession ) }}</p>
            </div>
        </div>
    </div>
</div>
</template>

<style scoped lang="scss">

.container {
    background-color: rgb(48, 48, 48);
}

div.title {
    font-size: 50px;
    color: white;
}

p {
    font-size: 20px;
    text-decoration: none;
    color: rgb(173, 173, 173);
    margin: 0;
}

p.title {
    color: white;
    margin-bottom: 2px;
}

img {
    width: 100%;
}

::v-deep .q-carousel__slide {
    padding: 0;
}

::v-deep .q-panel {
    overflow: hidden;
}

a:link { 
  text-decoration: none; 
} 
a:visited { 
  text-decoration: none; 
} 
a:hover { 
  text-decoration: none; 
} 
a:active { 
  text-decoration: none; 
}

.link {
    color: $primary;
    text-decoration: underline;
}

</style>