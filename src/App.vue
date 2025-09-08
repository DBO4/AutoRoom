<template>

    <v-app style="background-color: black;">
     <div v-if="jeTelefon()" class = "rounded-2xl">

      <v-app-bar color="white" style="" app>
        <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
        <div class="items-center justify-between">
        <div style="object-fit: scale-down;">
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
        <!-- Mobile menu button -->
        <div @click="showMenu = !showMenu" class="flex md:hidden">
          <button
            type="button"
            class="text-gray-800 hover:text-gray-400 focus:outline-none focus:text-gray-400"
          >
            <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
              <path
                fill-rule="evenodd"
                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
              ></path>
            </svg>
          </button>
        </div>
      </div>
      <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
      <ul
        class="flex-col items-end  space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 px-10"
      >
        <li class="menu-button"><a href="#" @click="Pocetna()">Početna</a></li>
        <li class="menu-button"><a href="#work" @click="NasRad()" v-smooth-scroll>Naš rad</a></li>
        <li class="menu-button"><a href="" @click="Ponuda()">Naša ponuda</a></li>
        <li class="menu-button">
          <a href="#testimonial" v-smooth-scroll>Korisnici</a>
        </li>
        <li class="menu-button"><a href="#about" v-smooth-scroll>O nama</a></li>
      </ul>
    </nav>
    <!-- End Navbar -->
    </div>
      <v-main>
       <RouterView></RouterView>
    </v-main>
  </v-app>
  
   <v-footer class="text-center d-flex flex-column " style="background-color: black ;">
    <div class="banner-7">
    <div>
      <div class=" align-center justify-center place-items-center d-flex px-4">
        <div class="w-7/12 pt-8">
          <h2 class="text-white md:text-6xl text-2xl font-Eczar mb-0 font-bold">
            Javite nam se da zajedno izaberemo najbolje gume za
          </h2>
          <h2 class="text-gray-700 kraj md:text-6xl text-2xl font-Eczar mb-5 font-bold">
            vašeg metalnog ljubimca
          </h2>
        </div>
      </div>
    </div>
    <div>
      <v-btn class="m-3" rounded="xl" color="#ff0202" href="https://www.facebook.com/profile.php?id=100079561766763" target="_blank">
        <div style="object-fit: scale-down;">
          <img
            class="object-cover w-full h-8 "
            src="./assets/mreze/fb.png"
            alt="Facebook"
          />
        </div>
      </v-btn>
      <v-btn class="m-3" rounded="xl" color="#ff0202" href="https://www.instagram.com/auto_room_2025?igsh=YzljYTk1ODg3Zg==" target="_blank">
        <div style="object-fit: scale-down;">
          <img
            class="object-cover w-full h-8 "
            src="./assets/mreze/instagram.png"
            alt="Instagram"
          />
        </div>
      </v-btn>
      <v-btn class="m-3" rounded="xl" color="#ff0202" href="https://www.youtube.com/@AutoRoomPd" target="_blank">
        <div style="object-fit: scale-down;">
          <img
            class="object-cover w-full h-8 "
            src="./assets/mreze/yt.png"
            alt="YouTube"
          />
        </div>
      </v-btn>
      <v-btn class="m-3" rounded="xl" color="#ff0202" href="https://olx.ba/profil/Auto_Room_Pd" target="_blank">
        <div style="object-fit: scale-down;">
          <img
            class="object-cover w-full h-8 "
            src="./assets/mreze/olx.png"
            alt="Olx.ba"
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
  
</template>

<script setup>
import { ref, onMounted,shallowRef, toRef, watch  } from 'vue';
import { Carousel, Pagination, Navigation, Slide } from 'vue3-carousel';
import 'vue3-carousel/carousel.css';
import { useRouter } from 'vue-router';
const router = useRouter();
  const items = [
   { title: 'Početna',  route: '/' },
   { title: 'Naš rad',  route: '/NasRad' },
   { title: 'Naša ponuda',  route: '/Ponuda' },
   { title: 'Korisnici',  route: '' },
   { title: 'O nama',  route: '' },
  ];

  const drawer = ref(false);
  const group = ref(null);


function Pocetna(){
  router.push({ name: 'Pocetna'});
}

function Ponuda(){
  router.push({name: "Ponuda"});
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

</script>
