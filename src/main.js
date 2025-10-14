import { createApp } from 'vue'
import App from './App.vue'
import Ponuda from './Stranice/Ponuda.vue'
import './index.css'
import VueSmoothScroll from 'vue3-smooth-scroll'
import { createRouter, createWebHistory } from 'vue-router';
import Pocetna from './Stranice/Pocetna.vue';
import { createVuetify } from 'vuetify';
import "vuetify/styles";
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';
import SvgIcon from '@jamescoyle/vue-icon';
import { mdiAccount } from '@mdi/js';
import '@mdi/font/css/materialdesignicons.css';
import NasRad from './Stranice/NasRad.vue';
import ONama from './Stranice/ONama.vue';
import Kontakt from './Stranice/Kontakt.vue';
import Blog from './Stranice/Blog.vue';
import BlogArtikal from './Stranice/BlogArtikal.vue';
import Naruci from './Stranice/Naruci.vue';
import UsloviNarudzbe from './Stranice/UsloviNarudzbe.vue';
import NemaStranice from './Stranice/NemaStranice.vue';

const vuetify = createVuetify({
  components,
  directives,
})

const routes = [
    {path: "/", name: "Pocetna", component: Pocetna},
    {path: "/Ponuda", name: "Ponuda", component: Ponuda},
    {path: "/Ponuda/Akcija/:id", name: "PonudaAkcija", component: Ponuda, props: true},
    {path: "/PJPrijedor", name: "NasRad", component: NasRad},
    {path: "/ONama", name: "ONama", component: ONama},
    {path: "/Kontakt", name: "Kontakt", component: Kontakt},
    {path: "/Blog", name: "Blog", component: Blog},
    {path: "/Blog/:idBlog", name: "BlogArtikal", component: BlogArtikal, props: true},
    {path: "/Narudzba/Akcija/:id" , name: "Naruci", component: Naruci, props: true},
    {path: "/Narudzba/UsloviNarudzbe" , name: "UsloviNarudzbe", component: UsloviNarudzbe},
    {path: '/:pathMatch(.*)*', name: 'NemaStranice', component: NemaStranice}
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes
})

const app = createApp(App)

app.use(VueSmoothScroll)
app.use(router)
app.use(vuetify)
app.mount('#app')
