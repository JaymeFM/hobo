<script>
import { defineStore } from "pinia";
import { ref, reactive } from "vue";
import Cookies from 'js-cookie';

export const userStore = defineStore("userStore", () => {
    const loggedIn = ref(false);
    const data = reactive({})

    async function getUser() {
        const email = Cookies.get('email');
        const password = Cookies.get('password');

        var fetchedData = await (await fetch(`http://localhost:8000/getUser.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({email, password})
        })).json();

        if (fetchedData.success) {
            loggedIn.value = true
            Object.assign(data, fetchedData.data[0])
        }
    }

    getUser()

    return { loggedIn, data }
});
</script>