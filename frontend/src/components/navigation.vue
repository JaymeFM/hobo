<template>
    <div class="navigation row q-pa-xs">
        <div class="col">
            <router-link to="../home">
                <img src="../assets/hobo.png">
            </router-link>
        </div>
        <div class="col text-right">
            <router-link to="../search">
                <img src="../assets/search.png">
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
    height: 60px;
}

</style>