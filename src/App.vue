<template>
     <div class="banner-1">
    
    <!-- NavBar -->
    <nav
      class="banner-3 container px-0 mx-auto md:flex md:justify-between rounded-xl md:items-center"
    >
      <div class="items-center justify-between">
        <div class=" w-15 h-15">
          <img
            src="./assets/AutoRoom.svg"
            alt="Auto ROOM"
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
        <li class="menu-button"><a href="#work" v-smooth-scroll>Naš rad</a></li>
        <li class="menu-button"><a href="" @click="Ponuda()">Naša ponuda</a></li>
        <li class="menu-button">
          <a href="#testimonial" v-smooth-scroll>Korisnici</a>
        </li>
        <li class="menu-button"><a href="#about" v-smooth-scroll>O nama</a></li>
      </ul>
    </nav>
    <!-- End Navbar -->
     
    
     </div>
     <RouterView></RouterView>

</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Carousel, Pagination, Navigation, Slide } from 'vue3-carousel';
import 'vue3-carousel/carousel.css';

import { useRouter } from 'vue-router';

const router = useRouter();

function Pocetna(){
  router.push({ name: 'Pocetna'});
}

function Ponuda(){
  router.push({name: "Ponuda"});
}

</script>
