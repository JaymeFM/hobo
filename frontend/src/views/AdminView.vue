<script setup>
    import { ref, reactive } from 'vue';
    import { useQuasar } from 'quasar'
    const $q = useQuasar()

    const users = reactive({table: {}});
    const searchQuery = ref("")


    async function updateUsers() {
        var fetchedData = await (await fetch(`http://localhost:8000/getUsers.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({search: searchQuery.value})
        })).json();
        users.table = {}
        for(const user of fetchedData) {
            user.loading = false
            users.table[user.KlantNr] = user
        }
    } 

    async function deleteUser(KlantNr) {
        users.table[KlantNr].loading = true
        var fetchedData = await (await fetch(`http://localhost:8000/deleteUser.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({KlantNr})
        })).json();

        users.table[KlantNr].loading = false
        if(fetchedData == true) {
            delete users.table[KlantNr]
        }
    }

    async function updateUser(KlantNr) {
        var fetchedData = await (await fetch(`http://localhost:8000/updateUser.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({KlantNr, data: users.table[KlantNr]})
        })).json();

        users.table[KlantNr].loading = false
        if(fetchedData == true) {

        } else {
            $q.notify('Data not saved, something went wrong.')
        }
    }


    updateUsers()

    console.log(users)

</script>

<template>
    <div>
        <div class="title">Admin User Managment</div>
        <q-input filled dark color="primary" squared v-model="searchQuery" @update:model-value="updateUsers" label="Search" class="q-mb-md"/>
        <div class="user q-pa-md q-mb-sm" v-for="(user, userNumber) in users.table" :key="userNumber">
            <div class="row q-col-gutter-sm items-center">
                <div class="col">
                    <label>KlantNr</label>
                    <q-input square filled bg-color="dark" label-color="white" v-model="user.KlantNr"></q-input>
                </div>
                <div class="col">
                    <label>AboID</label>
                    <q-input square filled bg-color="dark" label-color="white" v-model="user.AboID"></q-input>
                </div>
                <div class="col">
                    <label>Voornaam</label>
                    <q-input square filled bg-color="dark" label-color="white" v-model="user.Voornaam"></q-input>
                </div>
                <div class="col">
                    <label>Tussenvoegsel</label>
                    <q-input square filled bg-color="dark" label-color="white" v-model="user.Tussenvoegsel"></q-input>
                </div>
                <div class="col">
                    <label>Achternaam</label>
                    <q-input square filled bg-color="dark" label-color="white" v-model="user.Achternaam"></q-input>
                </div>
                <div class="col">
                    <label>Email</label>
                    <q-input square filled bg-color="dark" label-color="white" v-model="user.Email"></q-input>
                </div>
                <div class="col">
                    <label>Password</label>
                    <q-input square type="password" filled bg-color="dark" label-color="white" v-model="user.password"></q-input>
                </div>
                <div class="col">
                    <label>Genre</label>
                    <q-input square filled bg-color="dark" label-color="white" v-model="user.Genre"></q-input>
                </div>
                <div class="col">
                    <label>ContentManager</label>
                    <q-input square filled bg-color="dark" label-color="white" v-model="user.ContentManager"></q-input>
                </div>
                <div class="col">
                    <label>Admin</label>
                    <q-input square filled bg-color="dark" label-color="white" v-model="user.Admin"></q-input>
                </div>
                <div class="col">
                    <q-btn no-caps flat square class="save" :loading="user.loading" @click="updateUser(user.KlantNr)">Save</q-btn>
                </div>
                <div class="col">
                    <q-btn no-caps flat square class="delete" :loading="user.loading" @click="deleteUser(user.KlantNr)">Delete</q-btn>
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