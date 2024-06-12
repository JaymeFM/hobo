<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Navigation from './components/navigation.vue'
</script>

<template>
  <Navigation />
  <div class="q-pa-xl">
    <div class="q-pa-xl">
      <div class="q-pa-xl">
        <RouterView />
      </div>
    </div>
  </div>
</template>

<style lang="scss">
body{
  font-family: 'Neutra Text TF', sans-serif;
  margin: 0;
  background-color: $dark;
}

@import url('https://fonts.cdnfonts.com/css/neutra-text-tf');
</style>