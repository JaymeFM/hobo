<script setup>
import {ref} from 'vue';

const searchQuery = ref("")
const genreQuery = ref("")

const series = reactive({table: {}})

async function updateSeries() {
    var fetchedData = await (await fetch(`http://localhost:8000/search.php?search=${searchQuery}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        }
    })).json();

    series.table = fetchedData;
}

updateSeries()

</script>

<template>
    <div class="row q-col-gutter-md">
        <div class="col-10">
            <q-input filled dark color="secondary" squared v-model="searchQuery" label="Search" />
        </div>
        <div class="col-2">
            <q-select
                filled
                square
                dark
                color="secondary"
                v-model="genreQuery"
                emit-value
                map-options
                label="Genre"
            />
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
</style>