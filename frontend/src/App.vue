<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Navigation from './components/navigation.vue'
</script>

<template>
  <Navigation />
  <RouterView />
</template>

<style>
body{
  font-family: 'Neutra Text TF', sans-serif;
  margin: 0;
  background-image: url("../wallpaper.png");
}

@import url('https://fonts.cdnfonts.com/css/neutra-text-tf');
</style>