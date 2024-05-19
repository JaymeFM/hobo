import { createApp } from 'vue'
import { Quasar } from 'quasar'
import { createPinia } from 'pinia'

// Import Icons
import '@quasar/extras/material-icons/material-icons.css'

import App from './App.vue'
import router from './router'

const app = createApp(App)

app.use(Quasar, {
    plugins: {}, // import Quasar plugins and add here
})
app.use(createPinia())
app.use(router)

app.mount('#app')
