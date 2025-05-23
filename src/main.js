import { createApp } from 'vue'
import App from './App.vue'
import './index.css'
import VueSmoothScroll from 'vue3-smooth-scroll'
import {VueCsvImportPlugin} from "vue-csv-import";

const app = createApp(App)


app.use(VueSmoothScroll)
app.use(VueCsvImportPlugin)
app.mount('#app')
