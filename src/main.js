import { createApp } from 'vue'
import App from './App.vue'
import './index.css'
import VueSmoothScroll from 'vue3-smooth-scroll'
import { createRouter, createWebHistory } from 'vue-router';
import { createVuetify } from 'vuetify';
import "vuetify/styles";
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';
import '@mdi/font/css/materialdesignicons.css';

const vuetify = createVuetify({
  components,
  directives,
})

const routes = [
    {path: "/", name: "Pocetna", component: () => import('./Stranice/Pocetna.vue')},
    {path: "/Ponuda", name: "Ponuda", component: () => import('./Stranice/Ponuda.vue')},
    {path: "/Ponuda/Akcija/:id", name: "PonudaAkcija",  component: () => import('./Stranice/Ponuda.vue'), props: true},
    {path: "/PJPrijedor", name: "NasRad", component: () => import('./Stranice/NasRad.vue')},
    {path: "/ONama", name: "ONama", component: () => import('./Stranice/ONama.vue')},
    {path: "/Kontakt", name: "Kontakt", component: () => import('./Stranice/Kontakt.vue')},
    {path: "/Blog", name: "Blog", component: () => import('./Stranice/Blog.vue')},
    {path: "/Blog/:idBlog", name: "BlogArtikal", component: () => import('./Stranice/BlogArtikal.vue'), props: true},
    {path: "/Narudzba/Akcija/:id" , name: "Naruci", component: () => import('./Stranice/Naruci.vue'), props: true},
    {path: "/Narudzba/UsloviNarudzbe" , name: "UsloviNarudzbe", component: () => import('./Stranice/UsloviNarudzbe.vue')},
    {path: '/:pathMatch(.*)*', name: 'NemaStranice', component: () => import('./Stranice/NemaStranice.vue')}
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
