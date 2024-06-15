<script setup>
    import { userStore } from "../stores/userStore.vue";
    import { storeToRefs } from "pinia";
    import { reactive } from 'vue';
    import Cookies from 'js-cookie';

    const serverData = reactive({genres: {}, new: {}, continue: {}});

    const userData = storeToRefs(userStore());

    async function getServerData() {
        var fetchedData = await (await fetch(`http://localhost:8000/getHome.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({email: Cookies.get('email'), password: Cookies.get('password')})
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

            serverData.genres[genreName] = {page: '0', pages: {}}
            for (let i = 0; i < genre.length / 6; i++) {
                serverData.genres[genreName].pages[i] = []
                for(const serieNumber in genre) {
                    if(Math.floor(serieNumber / 6) == i) {
                        serverData.genres[genreName].pages[i].push(genre[serieNumber])
                    }
                }
            }
        }

        serverData.new = {page: '0', pages: {}}
        for(const serieNumber in fetchedData.new) {
            var serie = fetchedData.new[serieNumber]
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

            let page = Math.floor(serieNumber / 6)

            if (!serverData.new.pages[page]) {
                serverData.new.pages[page] = []
            }

            serverData.new.pages[page].push(serie)
        }

        console.log(fetchedData.continue)
        serverData.continue = {used: {}, list: [], pages: {}, page: '0'}
        for(const serie of fetchedData.continue) {
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
            
            if(!serverData.continue.used[serieId]) {
                serverData.continue.used[serieId] = true
                serverData.continue.list.push(serie)
            }
        }

        for(const serieNumber in serverData.continue.list) {
            var serie = serverData.continue.list[serieNumber]

            let page = Math.floor(serieNumber / 6)

            if (!serverData.continue.pages[page]) {
                serverData.continue.pages[page] = []
            }

            serverData.continue.pages[page].push(serie)
        }
        
        console.log(serverData.continue)
    } 

    getServerData()

</script>

<template>
    <div>
        <div>
            <div class="title">Continue Watching</div>
            <q-carousel
                v-model="serverData.continue.page"
                transition-prev="slide-right"
                transition-next="slide-left"
                swipeable
                animated
                control-color="white"
                arrows
                class="bg-dark"
            >
                <q-carousel-slide 
                v-for="(page, PageID) in serverData.continue.pages" :key="PageID"
                :name="PageID" class="row q-col-gutter-sm">
                    <router-link v-for="(serie, SerieNumber) in page" :key="SerieNumber" class="col-2" :to="userData.loggedIn.value ? `serie/${serie.SerieID}` : '../login'">
                        <img :src="`serieImages/${serie.ImageID}.jpg`">
                    </router-link>
                </q-carousel-slide>
            </q-carousel>
        </div>
        <div>
            <div class="title">New</div>
            <q-carousel
                v-model="serverData.new.page"
                transition-prev="slide-right"
                transition-next="slide-left"
                swipeable
                animated
                control-color="white"
                arrows
                class="bg-dark"
            >
                <q-carousel-slide 
                v-for="(page, PageID) in serverData.new.pages" :key="PageID"
                :name="PageID" class="row q-col-gutter-sm">
                    <router-link v-for="(serie, SerieNumber) in page" :key="SerieNumber" class="col-2" :to="userData.loggedIn.value ? `serie/${serie.SerieID}` : '../login'">
                        <img :src="`serieImages/${serie.ImageID}.jpg`">
                    </router-link>
                </q-carousel-slide>
            </q-carousel>
        </div>
        <div v-for="(genre, GenreName) in serverData.genres" :key="GenreName">
            <div v-if="Object.keys(genre.pages).length">
                <div class="title">{{ GenreName }}</div>
                <q-carousel
                    v-model="genre.page"
                    transition-prev="slide-right"
                    transition-next="slide-left"
                    swipeable
                    animated
                    control-color="white"
                    arrows
                    class="bg-dark"
                >
                <q-carousel-slide 
                v-for="(page, PageID) in genre.pages" :key="PageID"
                :name="PageID" class="row q-col-gutter-sm">
                    <router-link v-for="(serie, SerieNumber) in page" :key="SerieNumber" class="col-2" :to="userData.loggedIn.value ? `serie/${serie.SerieID}` : '../login'">
                        <img :src="`serieImages/${serie.ImageID}.jpg`">
                    </router-link>
                </q-carousel-slide>
            </q-carousel>
            </div>
        </div>
    </div>
</template>

<style scoped>
.title {
    font-size: 50px;
    color: white;
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

</style>