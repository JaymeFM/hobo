
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
            <router-link v-if="userData.loggedIn.value ? (userData.data.value.Admin ? true : false) : false" class="navbutton" to="../admin">
                <q-btn color="secondary" icon="shield" />
            </router-link>
            <router-link v-if="userData.loggedIn.value ? (userData.data.value.ContentManager ? true : false) : false" class="navbutton" to="../contentManagment">
                <q-btn color="secondary" icon="edit" />
            </router-link>
            <router-link class="navbutton" to="../home">
                <q-btn color="primary" icon="home" />
            </router-link>
            <router-link class="navbutton" to="../search">
                <q-btn color="primary" icon="search" />
            </router-link>
            <router-link v-if="userData.loggedIn.value" class="navbutton" to="../history">
                <q-btn color="primary" icon="history" />
            </router-link>
            <router-link class="navbutton" :to="userData.loggedIn.value ? '../account' : '../login'">
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
    box-shadow: 0px 15px 5px rgba(0, 0, 0, 0.647);
}

img {
    height: 50px;
}

.navbutton {
    margin-left: 20px;
    box-shadow: 0px 15px 5px rgb(0, 0, 0);
}

</style>