<template>

    <v-app>
     <div v-if="jeTelefon()" class = "rounded-2xl">

      <v-app-bar color="white" style="" app>
        <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
        <div class="items-center justify-between">
        <div style="object-fit: scale-down;">
          <img
            src="./assets/AutoRoom.svg"
            alt="Auto ROOM"
          />
        </div>
        </div>
      </v-app-bar>

      <v-navigation-drawer
        v-model="drawer"
        :location="$vuetify.display.mobile ? 'top' : undefined"
        temporary
      >
        <v-list
          :items="items"
        ></v-list>
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
      <v-main>
       <RouterView></RouterView>
    </v-main>
  </v-app>
</template>

<script setup>
import { ref, onMounted,shallowRef, toRef, watch  } from 'vue';
import { Carousel, Pagination, Navigation, Slide } from 'vue3-carousel';
import 'vue3-carousel/carousel.css';
import { Slide as Slider2 } from 'vue-burger-menu';
import { useRouter } from 'vue-router';

  const items = [
    {
      title: 'Foo',
      value: 'foo',
    },
    {
      title: 'Bar',
      value: 'bar',
    },
    {
      title: 'Fizz',
      value: 'fizz',
    },
    {
      title: 'Buzz',
      value: 'buzz',
    },
  ];

  const drawer = ref(false);
  const group = ref(null);

const router = useRouter();

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

</script>
