<script setup>
import { userStore } from "../stores/userStore.vue";
import { storeToRefs } from "pinia";
import Cookies from 'js-cookie';
import { reactive, toRaw } from "vue";

const userData = storeToRefs(userStore())

const newPasswordData = reactive({
    oldPassword: '',
    newPassword: '',
    confirmPassword: '',
})

function logout() {
    Cookies.remove('email')
    Cookies.remove('password')
    window.location="../login";
}
</script>

<template>
    <div class="row q-col-gutter-md" >
        <div class="col-6">
            <div class="container q-pa-md">
                <div class="section q-mb-sm row">
                    <div class="col">

                        <div class="title">
                            Profiel
                        </div>
                        <p>Voornaam : {{ userData.data.value.Voornaam }}</p>
                        <p>Tussenvoegsel : {{ userData.data.value.Tussenvoegsel }}</p>
                        <p>Achternaam : {{ userData.data.value.Achternaam }}</p>
                    </div>
                    <div class="col row justify-end">
                        <div class="profileImage">
                            {{ userData.data.value.Voornaam.split('')[0].toUpperCase() }}
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div class="title">
                        Gegevens
                    </div>
                    <p>Email : {{ userData.data.value.Email }}</p>
                </div>
            </div>
            <div class="container q-pa-md q-mt-md">
                <q-btn class="logout" @click="logout" no-caps flat square>Logout</q-btn>
            </div>
        </div>
        <div class="col-6">
            <div class="container q-pa-md">
                <div class="title">Wachtwoord Aanpassen</div>
                <q-input filled dark color="primary" type="password" class="q-mt-sm" squared v-model="newPasswordData.oldPassword" label="Oud Wachtwoord" />
                <q-input filled dark color="primary" type="password" class="q-mt-sm" squared v-model="newPasswordData.newPassword" label="Nieuw Wachtwoord" />
                <q-input filled dark color="primary" type="password" class="q-mt-sm" squared v-model="newPasswordData.confirmPassword" label="Bevestig Nieuw Wachtwoord" />

            </div>
        </div>
        <div class="col-6">

        </div>
    </div>
</template>

<style scoped lang="scss">
.logout {
    width: 100%;
    padding: 10px;
    border: 1px solid #5c8333;
    background-color: #92d051;
    margin: 10px 0;
    color: white;
}

.container {
    background-color: rgb(48, 48, 48);
}

.title {
    color: white;
    font-size: 20px;
}

.section {
    color: rgb(194, 194, 194)
}

.section p {
    margin: 0;
}

.profileImage {
    width: 100px;
    height: 100px;
    background-color: $secondary;
    color: white;
    text-align: center;
    line-height: 100px;
    border-radius: 50%;
    font-size: 50px;
}
</style>