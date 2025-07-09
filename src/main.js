import { createApp } from 'vue'
import App from './App.vue'
import Ponuda from './Stranice/Ponuda.vue'
import './index.css'
import VueSmoothScroll from 'vue3-smooth-scroll'
import {VueCsvImportPlugin} from "vue-csv-import";
import { createRouter, createWebHistory } from 'vue-router';
import Pocetna from './Stranice/Pocetna.vue';
import 'vuetify/styles';
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import SvgIcon from '@jamescoyle/vue-icon'
import { mdiAccount } from '@mdi/js'
import '@mdi/font/css/materialdesignicons.css';

const vuetify = createVuetify({
  components,
  directives,
})

const routes = [
    {path: "/", name: "Pocetna", component: Pocetna},
    {path: "/Ponuda", name: "Ponuda", component: Ponuda}
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes
})

const app = createApp(App)

app.use(VueSmoothScroll)
app.use(router)
app.use(VueCsvImportPlugin)
app.use(vuetify)
app.mount('#app')
