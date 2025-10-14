<template>

    <v-app style="background-color: black;">
     <div v-if="jeTelefon()" class = "rounded-2xl">

      <v-app-bar color="white" style="" app>
        <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
        <div class="items-center justify-between">
        <div style="object-fit:cover;">
          <img 
            src="./assets/AutoRoom.svg"
            alt="Auto ROOM"
            @click="Pocetna()"
          />
        </div>
        </div>
      </v-app-bar>

      <v-navigation-drawer
        v-model="drawer"
        :location="$vuetify.display.mobile ? 'top' : undefined"
        temporary
         class="mobile-drawer"
        >
        <v-list>
          <v-list-item
            v-for="item in items"
            :key="item.title"
            :to="item.route"
            link>
              <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-navigation-drawer>

     

    </div>
    <div v-else  class="banner-1">
    <!-- NavBar -->
    <nav
      class="banner-3 container px-0 mx-auto md:flex md:justify-between rounded-xl md:items-center"
    >
      <div class="items-center justify-between">
        <div class=" w-15 h-15">
          <img
            src="./assets/AutoRoom.svg"
            alt="Auto ROOM"
             @click="Pocetna()"
          />
        </div>

      </div>
      <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
      <ul
        class="flex-col items-end  space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 px-10"
      >
        <li class="menu-button"><a @click="Pocetna()">Početna</a></li>
        <li class="menu-button"><a href="" @click="Ponuda()">Naša ponuda</a></li>
        <li class="menu-button"><a href="" @click="Blog()">Blog</a></li>
        <li class="menu-button"><a href="#work" @click="NasRad()" v-smooth-scroll>Poslovna jedinica Prijedor</a></li>
        <li class="menu-button"><a href="#about" v-smooth-scroll @click="Onama()">O nama</a></li>
        <li class="menu-button">
          <a @click="Kontakt()">Kontakt</a>
        </li>
        
      </ul>
    </nav>
    <!-- End Navbar -->
    </div>
      <v-main>
       <RouterView></RouterView>
       <div class="floating-buttons">

        
  <v-btn
    v-show="prikaziVADugme"
    icon="mdi-sale"
    color="#520000"
    size="x-large"
    class="mb-4"
    @click="prikaziAkciju()"
  ></v-btn>

  <v-btn
    v-show="prikaziScrollBtn"
    icon="mdi-arrow-up"
    color="#ff0202"
    size="x-large"
    @click="scrollToTop()"
  ></v-btn>

</div>


    </v-main>
  </v-app>
  
   <v-footer class="text-center d-flex flex-column " style="background-color: black ;">
    <div class="banner-7">
    <div>
      <div class=" align-center justify-center place-items-center d-flex px-4">
        <div class="w-7/12 pt-8">
          <h2 class="text-white md:text-6xl text-2xl font-Eczar mb-0 font-bold">
            AutoROOM
          </h2>
          <h2 class="text-gray-700 kraj md:text-6xl text-2xl font-Eczar mb-5 font-bold">
            Sigurno na drum
          </h2>
        </div>
      </div>
    </div>
    <div>
      <v-btn class="m-3" rounded="xl" color="transparent" href="https://www.facebook.com/profile.php?id=100079561766763" target="_blank">
        <div style="object-fit: scale-down;">
          <img
            class="object-cover w-full h-8 "
            src="./assets/mreze/fb.png"
            alt="Facebook"
          />
        </div>
      </v-btn>
      <v-btn class="m-3" rounded="xl" color="transparent" href="https://www.instagram.com/auto_room_2025?igsh=YzljYTk1ODg3Zg==" target="_blank">
        <div style="object-fit: scale-down;">
          <img
            class="object-cover w-full h-8 "
            src="./assets/mreze/instagram.png"
            alt="Instagram"
          />
        </div>
      </v-btn>
      <v-btn class="m-3" rounded="xl" color="transparent" href="https://www.youtube.com/@AutoRoomPd" target="_blank">
        <div style="object-fit: scale-down;">
          <img
            class="object-cover w-full h-8 "
            src="./assets/mreze/yt.png"
            alt="YouTube"
          />
        </div>
      </v-btn>
      <v-btn class="m-3" rounded="xl" color="transparent" href="https://olx.ba/profil/Auto_Room_Pd" target="_blank">
        <div style="object-fit: scale-down;">
          <img
            class="object-cover w-full h-8 "
            src="./assets/mreze/olx.png"
            alt="Olx.ba"
          />
        </div>
      </v-btn>
      <v-btn class="m-3" rounded="xl" color="transparent" href="viber://chat?number=+38765867682" target="_blank">
        <div style="object-fit: scale-down;">
          <img
            class="object-cover w-full h-8 "
            src="./assets/mreze/vib.png"
            alt="Viber"
          />
        </div>
      </v-btn>
      <v-btn class="m-3" rounded="xl" color="transparent" href="https://wa.me/+38765867682?text=Pozdrav,%20interesuju%20me%20gume%20sa%20sajta%20" target="_blank">
        <div style="object-fit: scale-down;">
          <img
            class="object-cover w-full h-8 "
            src="./assets/mreze/wa.png"
            alt="Viber"
          />
        </div>
      </v-btn>
    </div>
    <v-divider class="my-2" thickness="4" ></v-divider>
    <div class="text-caption font-weight-regular  opacity-60" style="color: white;">
      Phasellus feugiat arcu sapien, et iaculis ipsum elementum sit amet. Mauris cursus commodo interdum. Praesent ut risus eget metus luctus accumsan id ultrices nunc. Sed at orci sed massa consectetur dignissim a sit amet dui. Duis commodo vitae velit et faucibus. Morbi vehicula lacinia malesuada. Nulla placerat augue vel ipsum ultrices, cursus iaculis dui sollicitudin. Vestibulum eu ipsum vel diam elementum tempor vel ut orci. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
    </div>
    <v-divider class="my-2" thickness="4"></v-divider>
    <div style="color: white;">
      Copyright © 2023 - {{ new Date().getFullYear() }} — <strong>AutoROOM</strong>
    </div>
    </div>
  </v-footer>
  
<div 
  v-if="visible" 
  class="fixed inset-0 flex flex-col items-center justify-center z-50"
  :style="$vuetify.display.mobile ? 'margin-top: 55px; background: rgba(0, 0, 0, 0.8);' : 'background: rgba(0, 0, 0, 0.8);'"
>
  <!-- Slika -->
  <img 
    :src="srcVelikaAkcija" 
    class="max-h-[80%] max-w-[90%] rounded-xl shadow-lg"
    style="object-fit: scale-down;"
  />

  <!-- Dugme ispod slike -->
  <v-btn
    class="mt-4"
    style="color: white; background-color: #520000; font-size: 1rem; text-align: center; vertical-align: middle;" rounded="lg" height="50px"
    @click="naruciAkciju()"
  >
    Naruči ovu akciju
  </v-btn>

  <!-- Close dugme -->
  <button 
    @click="ZatvoriAkciju()" 
    class="absolute top-5 right-5 text-white text-3xl"
  >
    ✕
  </button>
</div>

</template>

<script setup>
import { ref, onMounted,shallowRef, toRef, watch, onUnmounted  } from 'vue';
import { Carousel, Pagination, Navigation, Slide } from 'vue3-carousel';
import 'vue3-carousel/carousel.css';
import { useRouter } from 'vue-router';
import { vi } from 'vuetify/locale';

const router = useRouter();
  const items = [
   { title: 'Početna',  route: '/' },
   { title: 'Naša ponuda',  route: '/Ponuda' },
   { title: 'Blog', route: '/Blog'},
   { title: 'Poslovna jedinica Prijedor',  route: '/PJPrijedor' },
   { title: 'O nama',  route: '/ONama' },
   { title: 'Kontakt',  route: '/Kontakt' }
  ];
const currentWidth1 = window.innerWidth;
const drawer = ref(false);
const group = ref(null);
const prikaziScrollBtn = ref(false)
const prikaziVADugme = ref(false);
const dialog = shallowRef(false);
const props = defineProps({
  id: String
});
var imaVelikaAkcija = false, srcVelikaAkcija = "", vecVidioAkciju = false;

const visible = ref(false);

function Pocetna(){
  router.push({ path: '/'});
}

function Ponuda(){
  router.push({name: "Ponuda"});
}

function Blog(){
  router.push({name: "Blog"});
}

function jeTelefon(){
   /*if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
     return true
   } else {
     return false
   }*/
   
  if (window.innerWidth > 800) return false;
  else return true;
}

watch(group, () => {
  drawer.value = false
});

function NasRad(){
  router.push({name: "NasRad"});
}

function Onama(){
  router.push({name: "ONama"});
}

function Kontakt(){
  router.push({name: "Kontakt"});
}

window.addEventListener('resize', function() {
  
  const currentWidth = window.innerWidth;

  if ((currentWidth1 <= 800 && currentWidth > 800) || (currentWidth1 > 800 && currentWidth <= 800)) {
    location.reload();
  } 
});


function scrollToTop() {
  window.scrollTo({ top: 0, behavior: 'smooth' })
}

function provjeriScroll() {
  prikaziScrollBtn.value = window.scrollY > 300
}

onMounted(() => {
  window.addEventListener('scroll', provjeriScroll)
  vecVidioAkciju = getCookie("Akcija");
  imaSlika();

})

onUnmounted(() => {
  window.removeEventListener('scroll', provjeriScroll)
})

async function imaSlika(){
  const velikaAkcijaPutanja = import.meta.glob('./assets/Slike/VelikaAkcija/*.*');
  for (const pathAkcija in velikaAkcijaPutanja) {
    const urlVAkcija = await velikaAkcijaPutanja[pathAkcija]();
    imaVelikaAkcija = true;
    if (vecVidioAkciju){
      visible.value = false;
      prikaziVADugme.value = true;
    }else {
      visible.value = true;
    }
    srcVelikaAkcija = urlVAkcija.default;
    
  }
}

function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
}

function ZatvoriAkciju(){
  visible.value = false;
  prikaziVADugme.value = true;
  document.cookie = "Akcija=true;";
}

function prikaziAkciju(){
  visible.value = !visible.value;
}

function naruciAkciju(){
  visible.value = false;
  router.push({name: "Naruci", params: {id: "999"}});
}

</script>

<style scoped>
.scroll-to-top-btn {
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 999;
  background-color: #CFD8DC;
  color: #272727;
  box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.3);
  border-radius: 50%;
  transition: all 0.3s ease;
}

.scroll-to-top-btn2 {
  position: fixed;
  bottom: 40px;
  right: 20px;
  z-index: 99;
  background-color: #CFD8DC;
  color: #272727;
  box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.3);
  border-radius: 50%;
  transition: all 0.3s ease;
}

.scroll-to-top-btn:hover {
  background-color: #90A4AE;
  transform: translateY(-2px);
}

.fade-enter-active, .fade-leave-active {
  transition: opacity 0.3s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
.floating-buttons {
  position: fixed;
  bottom: 20px;
  right: 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
  z-index: 999;
}

.floating-buttons v-btn {
  margin-bottom: 10px;
  transition: transform 0.3s ease;
}

.floating-buttons v-btn:hover {
  transform: translateY(-2px);
}

.imaggg {
  background-color: transparent;
   width: 100%;
  max-height: 100%;
}

.mobile-drawer {
  top: 10px !important; /* висина appbara */
  width: 100% !important;
  left: 0;
  border-radius: 0 0 20px 20px;
  background-color: white !important;
  height: fit-content !important;
  max-height: none !important;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
  overflow: hidden !important;
  transition: all 0.3s ease;
}

.v-navigation-drawer__content {
  padding: 0 !important;
}


/* Када је drawer отворен */
.mobile-drawer.v-navigation-drawer--active {
  transform: translateY(0);
  opacity: 1;
  pointer-events: auto;
  padding-top: 50px;
}


/* Када је склопљен */
.mobile-drawer.v-navigation-drawer--temporary.v-navigation-drawer--close {
  transform: translateY(-100%) !important;
  opacity: 0 !important;
  pointer-events: none;
  height: 0px;
  padding-bottom: 100px;
}


</style>