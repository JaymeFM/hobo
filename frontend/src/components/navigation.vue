
<script setup>
    import { userStore } from "../stores/userStore.vue";
    import { storeToRefs } from "pinia";
    const userData = storeToRefs(userStore())
</script>

<template>
    <div class="navigation row q-pa-md">
        <div class="col">
            <router-link to="../home">
                <img src="../assets/hobo.png">
            </router-link>
        </div>
        <div class="col text-right">
            <router-link class="navbutton" to="../home">
                <q-btn color="primary" icon="home" />
            </router-link>
            <router-link class="navbutton" to="../search">
                <q-btn color="primary" icon="search" />
            </router-link>
            <router-link class="navbutton" to="../history">
                <q-btn color="primary" icon="history" />
            </router-link>
            <router-link class="navbutton" to="../account">
                <q-btn color="primary" icon="account_circle" />
            </router-link>
        </div>
    </div>
</template>

<style scoped>

.navigation {
    width: 100%;
    background-color: #1f1f1f;
    position: fixed;
    z-index: 99;
}

img {
    height: 40px;
}

.navbutton {
    margin-left: 20px;
}

</style>