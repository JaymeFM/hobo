<script setup>
    import { ref, reactive } from 'vue';
    import { useQuasar } from 'quasar'
    const $q = useQuasar()

    const series = reactive({table: {}});
    const searchQuery = ref("")


    async function updateSeries() {
        var fetchedData = await (await fetch(`http://localhost:8000/contentGetSeries.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({search: searchQuery.value})
        })).json();
        series.table = {}
        for(const serie of fetchedData) {
            serie.loading = false
            series.table[serie.SerieID] = serie
        }
    } 

    async function deleteSerie(SerieID) {
        series.table[SerieID].loading = true
        var fetchedData = await (await fetch(`http://localhost:8000/deleteSerie.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({SerieID})
        })).json();

        series.table[SerieID].loading = false
        if(fetchedData == true) {
            delete series.table[SerieID]
        }
    }

    async function updateSerie(SerieID) {
        var fetchedData = await (await fetch(`http://localhost:8000/updateSerie.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({SerieID, data: series.table[SerieID]})
        })).json();

        series.table[SerieID].loading = false
        if(fetchedData == true) {

        } else {
            $q.notify('Data not saved, something went wrong.')
        }
    }


    updateSeries()

    console.log(series)

</script>

<template>
    <div>
        <div class="title">Content Managment</div>
        <q-input filled dark color="primary" squared v-model="searchQuery" @update:model-value="updateSeries" label="Search" class="q-mb-md"/>
        <div class="user q-pa-md q-mb-sm" v-for="(serie, serieNumber) in series.table" :key="serieNumber">
            <div class="row q-col-gutter-sm items-center">
                <div class="col">
                    <label>SerieID</label>
                    <q-input square filled bg-color="dark" label-color="white" v-model="serie.SerieID"></q-input>
                </div>
                <div class="col">
                    <label>SerieTitel</label>
                    <q-input square filled bg-color="dark" label-color="white" v-model="serie.SerieTitel"></q-input>
                </div>
                <div class="col">
                    <label>IMDBLink</label>
                    <q-input square filled bg-color="dark" label-color="white" v-model="serie.IMDBLink"></q-input>
                </div>
                <div class="col">
                    <label>Actief</label>
                    <q-input square filled bg-color="dark" label-color="white" v-model="serie.Actief"></q-input>
                </div>
                <div class="col">
                    <label>TrailerVideo</label>
                    <q-input square filled bg-color="dark" label-color="white" v-model="serie.TrailerVideo"></q-input>
                </div>
                <div class="col">
                    <label>description</label>
                    <q-input square filled bg-color="dark" label-color="white" v-model="serie.description"></q-input>
                </div>
                <div class="col">
                    <q-btn no-caps flat square class="save" :loading="serie.loading" @click="updateSerie(serie.SerieID)">Save</q-btn>
                </div>
                <div class="col">
                    <q-btn no-caps flat square class="delete" :loading="serie.loading" @click="deleteSerie(serie.SerieID)">Delete</q-btn>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">
* {
    color: white;
}

.user {
    background-color: rgb(41, 41, 41);
}

::v-deep .q-field__native {
    color: white;
}

.save, .delete {
    width: 100%;
}

.save {
    background-color: $secondary;
}

.delete {
    background-color: $negative;
}

.title {
    font-size: 30px;
}
</style>