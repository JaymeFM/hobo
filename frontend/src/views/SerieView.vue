<script setup>
import { useRoute } from 'vue-router';
import { reactive } from 'vue';

const route = useRoute();

const serieId = route.params.serieId;

async function run() {
    var fetchedData = await (await fetch(`http://localhost:8000/getSerie.php?serieId=${serieId}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        }
    })).json();

    console.log(fetchedData)
}

run()
</script>

<template>
    <div>
      <q-select filled v-model="model" :options="options" label="Filled" />
    </div>
</template>