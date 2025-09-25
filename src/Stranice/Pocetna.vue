<template>
<div v-if="jeTelefon()" class="banner-6">
  <v-parallax src="src\assets\bg-30.png">
  <div class="space-y-4 grid place-items-center">
    <h3 class="hello-button text-gray-700 w-fit mt-5 rounded-lg font-semibold" style="font-size: 3rem;">
      👋 Pozdrav
    </h3>
    <h1
      style="font-size: 4rem;  text-align: center;"
       class="3xl:text-8xl 2xl:text-7xl xl:text-6xl lg:text-4xl md:text-3xl sm:text-3xl text-xl font-Eczar font-bold leading-tight text-white place-items-center">
       Dobrodošli u
       AutoROOM
    </h1>
    <div class="space-y-4 grid place-items-center mt-5 rounded-2xl">
      <v-btn style="color: white; background-color: #520000; font-size: 1rem;" @click="NasRad()">
        Pogledajte naš rad
      </v-btn>
      <v-btn class=" submit-button rounded-2xl" style="color: #520000; background-color: #db3030; font-size: 1rem;" @click="Kontaktiraj()">
        Kontaktirajte nas
      </v-btn>
    </div>
  </div>

     <div class ="align-center justify-center d-flex">
        <div class="ma-8 px-5">
          <iframe  height="600"
            class="border-2 border-gray-100" 
            src="src\assets\videoDejo.mp4" 
            title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
          </iframe>
        </div>
      </div>
      </v-parallax>
</div>
<div v-else class="banner-6">
  <v-parallax src="src\assets\bg-30.png">
  <div class="flex items-center">
    <div class="w-11/12 ">
      <div class ="align-center justify-center d-flex">
        <div class="ma-8 px-5">
          <iframe width="490" height="900"
            class="border-2 border-gray-100" 
            src="src\assets\videoDejo.mp4" 
            title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
          </iframe>
        </div>
        <h1
          class="3xl:text-8xl 2xl:text-7xl xl:text-6xl lg:text-4xl md:text-3xl sm:text-3xl text-xl font-Eczar font-bold leading-tight text-white"
          style="font-size: 10rem;">
          <h3
            class="hello-button text-gray-700 w-fit md:py-3 my-4 md:px-5 py-4 px-2 rounded-lg font-semibold font-work_sans"
            style="font-size: 6rem;"
          >
            👋 Pozdrav,
          </h3>
          Dobrodošli u
          <a
            href="https://www.linkedin.com/"
            target="_blank"
            class="hover:underline"
          >
            </a
          ><br />AutoROOM
            <div class="md:flex gap-1 md:gap-10">
              <button class="bg-gray-800 submit-button-rad hidden md:block" style="font-size: 2rem;" @click="NasRad()">
                Pogledajte naš rad
              </button>
              <button
                class="text-gray-800 submit-button " @click="Kontaktiraj()" style="font-size: 2rem;">
                Kontaktirajte nas
              </button>
            </div>
          </h1>
      </div>
    </div>
  </div>
  </v-parallax>
</div>

<div class="banner-4 space-y-10 pb-20" id="work">
   <div v-if="loadingMalaAkcija">
      <div class="lds-circle" style="display: flex; justify-content: center; align-items: center;">
          <div></div>
      </div>
  </div>
  <div v-else>
    <div class=" py-5 " style="border-radius: 54px; border-width: 15px; border-color:red; background-image: url('src/assets/tragovi.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center;" v-if="malaAkcijaPrikaz">
      <div class="space-y-4 grid place-items-center my-5">
        <h4 class="heading3">***Trenutne akcije***</h4>
      </div>
      <Carousel v-bind="configAkcije">
        <Slide v-for="image in slikeAkcije" :key="image.id" >
          <div class="carousel__item border-2 border-red-800 mx-2 bg-white"id="carousel" >
            <img :src="image.url" :alt="image.ime" id="slika" style="max-height:270px; width: 500px; border-color: red; border-width: 5px;"/>  
            <div class="px-2 py-1">
              <div id="ime">{{ image.ime }}</div>
              <div id="tekst" >{{ image.tekst }}</div>
              <div id="cijena" style=" color: gold; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-weight: 600; font-size:x-large; background-color: crimson; text-align: center; border-radius: 15%;">{{ image.cijena }} KM</div>
              <div class ="align-center justify-center d-flex pa-4">
                <v-btn rounded="xl" size="small" @click="naruciAkciju(image.id)" block>Naruči</v-btn>
              </div>
            </div>
          </div>
        </Slide>
        <template #addons>
          <Navigation />
          <Pagination />
        </template>
      </Carousel>
    </div>
  </div>

  <div v-if="loadingBlog3">
      <div class="lds-circle" style="display: flex; justify-content: center; align-items: center;">
          <div></div>
      </div>
  </div>
  <div v-else>
    <div v-for="stakva in blog" :key="stakva.idBlog"
            class="card mb-5 flex flex-col md:flex-row items-center justify-between">
        
        <!-- Текст -->
        <div class="space-y-5 py-2 px-8 w-full md:w-1/2">
            <h4 class="project-title">{{ stakva.naslov }}</h4>
            <p class="font-work_sans pr-0 md:pr-12">{{ stakva.tekst }}</p>
            <button class="submit-button-blog text-sky-800 font-bold text-2xl tracking-wider"  
                    @click="idiBlogArtikal(stakva.putanja)">
                {{stakva.dugme}}
            </button>
        </div>

        <!-- Слика -->
        <div class="card-image w-full md:w-1/2 mt-4 md:mt-0">
            <img class="object-cover w-full h-72 md:h-96" :src="stakva.url"/>
        </div>
    </div>
  </div>
  <div class="blog-kont">
    <v-btn class=" submit-button rounded-2xl" style="color: #520000; background-color: #db3030; font-size: 1rem;" @click="Blog()">
      Pogledajte ostatak ponude
    </v-btn>
  </div>

</div>


<div  :class="[$vuetify.display.mobile ? 'banner-5 px-6 mx-1 py-4 ' : 'banner-5 px-6 mx-10 py-4']" id="testimonial">
  <!--<div class="bg-white py-5" style="border-radius: 54px;">
    <div class="grid place-items-center mt-3">
      <h3 class="heading3">Riječi naših kupaca</h3>
      <p class="font-work_sans text-gray-600 font-semibold leading-relaxed" style="text-align: center;">
        Samo dio uske selekcije komentara naših zadovoljnih kupaca
      </p>
    </div>
    <div class="px-3 py-2">
    <Carousel v-bind="config">
      <Slide v-for="image in images" :key="image.id">
        <div class="carousel__item border-2 border-gray-100 mx-1" style="width: 80%;" id="carousel">
          <img :src="image.url" :alt="image.ime" id="slika"/>  
          <div class="px-5 py-3">
            <div id="ime">{{ image.ime }}</div>
            <div id="tekst">{{ image.tekst }}</div>
          </div>
        </div>
      </Slide>
      <template #addons>
        <Navigation />
        <Pagination />
      </template>
    </Carousel>
    </div>
  </div>-->
    <div v-if="loadingBrendovi">
      <div class="lds-circle" style="display: flex; justify-content: center; align-items: center;">
          <div></div>
      </div>
  </div>
  <div v-else>
    <div class="space-y-4 grid place-items-center my-5">
      <h4 class="project-title item " style="color: white;">O brendovima</h4>
    </div>
    <div v-if="$vuetify.display.mobile">
      <Carousel v-bind="configGuma">
      <Slide v-for="image in slikeBrendGuma" :key="image.id" >
        <div class=" rounded-2xl ma-8 mx-0" style="background-image: url('src/assets/tragovi-30.png'); background-size: cover; width: fit-content; height: fit-content;" >
          <div style="height: 350px;" class="grid place-items-center">
            <img :src="image.url" :alt="image.ime" id="slika" style="width: 350px; height: fit-content;"/>  
          </div>
          <div class="px-2 py-1">
            <div class ="align-center justify-center d-flex pa-4">
              <v-btn rounded="xl"  style="background-color: #520000; color: white;" @click="naruciAkciju(image.id)" block>Nauči nešto o brendu {{ image.ime }}</v-btn>
            </div>
          </div>
        </div>
      </Slide>
      <template #addons>
        <Navigation />
      </template>
    </Carousel>
    
    </div>
    <div v-else>
    
    <Carousel v-bind="configGuma" class="mx-10 pt-5">
      <Slide v-for="image in slikeBrendGuma" class="mx-10" :key="image.id" >
        <div class=" rounded-2xl mx-5" style="background-image: url('src/assets/tragovi.jpg'); background-size: cover;" >
          <div style="height: 250px; " class="grid place-items-center">
            <img :src="image.url" :alt="image.ime" id="slika" style="width: fit-content; height: fit-content; max-height: 250px; max-width: 450px; border-color: red; border-width: 5px;"/>  
          </div>
          <div class="px-2 py-1">
            <div class ="align-center justify-center d-flex pa-4">
              <v-btn rounded="xl" size="x-large" style="background-color: #520000; color: white;" @click="naruciAkciju(image.id)" block>Nauči nešto o brendu {{ image.ime }}</v-btn>
            </div>
          </div>
        </div>
      </Slide>
      <template #addons>
        <Navigation />
        <br></br>
        <br></br>
        <Pagination />
      </template>
    </Carousel>
    </div>
  </div>
</div>

<v-parallax src="src\assets\mehanicar.png" :height= "$vuetify.display.mobile ? '850' : '600'">
  <div class="banner-2 md:flex  grid place-items-center md:justify-evenly py-8" id="about">
    <iframe class = "border-4 border-gray-800" :height=kartaVisina :width=kartaSirina
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2368.6908003100257!2d16.708772736804814!3d44.96833191684829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4760cd000b87ae13%3A0x8bf179443b6b3452!2sAUTO%20ROOM!5e0!3m2!1ssr!2sba!4v1747567120361!5m2!1ssr!2sba" 
      allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>

    <div class="space-y-5 py-8 px-8 md:py-16 md:px-20 md:w-1/2">
      <h4 class="project-title item " style="color: white;">Ko smo mi</h4>
      <p class="font-work_sans" style="color: white;">Mi smo ti i ti radimo 100 godina.
        <br />
        I got featured various times on many big and small marketplaces,
        portfolio websites and blogs. I also received some awards and
        recognitions from some of the big and small award companies. Besides
        designing, I like to watch anime, read books and solve sudoku.
      </p>
      <v-btn class="text-sky-800 font-bold text-2xl tracking-wider" @click="Onama()" style="color: red; text-decoration: underline;">
        O nama
      </v-btn>
    </div>
  </div>
</v-parallax>
  <div class="text-center" v-if="dialog">
       

        <v-bottom-sheet v-model="dialog">
        <v-card class="text-center" height="200">
            <v-card-text>

            <br>
            <br>

            <div>
                
                <v-card
       
        append-icon="$close"
        class="mx-auto"
        elevation="16"
        max-width="90%"
        ref="dialog"
      >
        <template v-slot:append>
                    Zatvori
                    <v-btn icon="$close" variant="text"  @click="ZatvoriAkciju()"></v-btn>
                    </template>

        <div class="text-center">
          
          <v-img
            :src="srcVelikaAkcija"
            class="imaggg"
            ></v-img>
        </div>       
      </v-card>
            </div>
            </v-card-text>
        </v-card>
        </v-bottom-sheet>
    </div>
</template>

<script setup async>
import { ref, onMounted, shallowRef } from 'vue';
import { Carousel, Pagination, Navigation, Slide } from 'vue3-carousel';
import 'vue3-carousel/carousel.css';
import { useRouter } from 'vue-router';
import RijeciKupaca from '../assets/TekstFajlovi/RijeciKupaca.csv?raw';
import BlogCsv from '../assets/TekstFajlovi/Blog.csv?raw';
import Akcije from '../assets/TekstFajlovi/Akcije.csv?raw';
import BrendGuma from '../assets/TekstFajlovi/BrendoviGuma.csv?raw';
import BrendGuma2 from '../assets/TekstFajlovi/BrendoviGuma2.csv?raw';
import { useFullscreen } from '@vueuse/core';
import { useTemplateRef } from 'vue';
import { useScroll } from '@vueuse/core'
import ONama from './ONama.vue';
import Kontakt from './Kontakt.vue';

const redovi = RijeciKupaca.split('\n');
const redoviBlog = BlogCsv.split('\n');
const redoviAkcija = Akcije.split('\n');
const redoviBrendGuma = BrendGuma.split('\n');
const redoviBrendGuma2 = BrendGuma2.split('\n');
const router = useRouter();
const images = ref([]);
const blog = ref([]);
const slikeAkcije = ref([]);
const slikeBrendGuma = ref([]);
const slikeBrendGuma2 = ref([]);
const config = {
  itemsToShow: jeTelefon() ? 1 : 3,
  gap: 0,
  autoplay: 4000,
  wrapAround: true
};
const configAkcije = {
  itemsToShow: jeTelefon() ? 2 : 6,
  gap: 0,
  autoplay: 1500,
  wrapAround: true
};
const configGuma = {
  itemsToShow: jeTelefon() ? 1 : 4,
  gap: 5,
  autoplay: 1500,
  wrapAround: true,
  snapAlign: 'center',
  dir: 'ltr'
};
const configGuma2 = {
  itemsToShow: jeTelefon() ? 1 : 4,
  gap: 5,
  autoplay: 1500,
  wrapAround: true,
  snapAlign: 'center',
  dir: 'rtl'
};
const dialog = shallowRef(false);
const props = defineProps({
  id: String,
  idBlog: String
});
const malaAkcijaPrikaz = ref(false);
const kartaSirina = ref(jeTelefon() ? 350 : 500);
const kartaVisina = ref(jeTelefon() ? 400 : 500);
const loadingMalaAkcija = ref(true);
const loadingBlog3 = ref(true);
const loadingBrendovi = ref(true);

var imaVelikaAkcija = false, srcVelikaAkcija = "", vecVidioAkciju = false;

onMounted(async () => {
  window.scrollTo(0, 0);
  
  //riječi kupaca
  /*const modules = import.meta.glob('../assets/Slike/MalaGalerija/*.*');
  let id = 0,rbrCsv,imeCsv,tekstCsv;

  for (const path in modules) {
    const url = await modules[path]();
    rbrCsv = redovi[id + 1].split(";")[0];
    imeCsv = redovi[id + 1].split(";")[1];
    tekstCsv = redovi[id + 1].split(";")[2];
    if(rbrCsv == (id + 1)){
      images.value.push({ url: url.default, id: ++id, ime: imeCsv, tekst: tekstCsv });
    }
      else{console.log("rbrcsv = " + rbrCsv + "id = " + id)
    }
  } */
 //riječi kupaca 

  //////

  await blog3();

  /////////////////////////

  await malaAkcija();

  /////////////////////////////////

  await brendovi();
  
  /////////////////////////////////////

  vecVidioAkciju = getCookie("Akcija");

  if (!vecVidioAkciju) { imaSlika();}

});

async function malaAkcija() {
  const moduliAkcija = import.meta.glob('../assets/Slike/Akcije/*.*');
  let idAkcije = 0,rbrAkcijeCsv,imeAkcijeCsv,tekstAkcijeCsv,cijenaAkcijaCsv;

  for (const pathAkcija in moduliAkcija) {
    const urlAkcija = await moduliAkcija[pathAkcija]();
    rbrAkcijeCsv = redoviAkcija[idAkcije + 1].split(";")[0];
    imeAkcijeCsv = redoviAkcija[idAkcije + 1].split(";")[1];
    tekstAkcijeCsv = redoviAkcija[idAkcije + 1].split(";")[2];
    cijenaAkcijaCsv = redoviAkcija[idAkcije + 1].split(";")[3];
    if(rbrAkcijeCsv == (idAkcije + 1)){
      slikeAkcije.value.push({ url: urlAkcija.default, id: ++idAkcije, ime: imeAkcijeCsv, tekst: tekstAkcijeCsv, cijena: cijenaAkcijaCsv });
      malaAkcijaPrikaz.value = true;
    }
      else{console.log("rbrAkcijeCsv = " + rbrAkcijeCsv + "id = " + idAkcije)
    }
  }
  loadingMalaAkcija.value = false;
}

async function blog3() {
  const blogSlike = import.meta.glob('../assets/Slike/Blog/*.*');
  let idBlog = 0,rbrBlogCsv,naslovBlogCsv,tekstBlogCsv,dugmeBlogCsv,naslovnaBlogCsv,putanjaBlogCsv;
  
  for (const pathBlog in blogSlike) {
    const urlBlog = await blogSlike[pathBlog]();
    rbrBlogCsv = redoviBlog[idBlog + 1].split(";")[0];
    naslovBlogCsv = redoviBlog[idBlog + 1].split(";")[1];
    tekstBlogCsv = redoviBlog[idBlog + 1].split(";")[2];
    dugmeBlogCsv = redoviBlog[idBlog + 1].split(";")[3];
    putanjaBlogCsv = redoviBlog[idBlog + 1].split(";")[4];
    naslovnaBlogCsv = redoviBlog[idBlog + 1].split(";")[5];
   
      if (naslovnaBlogCsv.trim() == "D"){
        blog.value.push({ url: urlBlog.default, id: idBlog, naslov: naslovBlogCsv, tekst: tekstBlogCsv, dugme: dugmeBlogCsv, putanja: putanjaBlogCsv});
      }
      ++idBlog;
  }
  loadingBlog3.value = false;
}

async function brendovi() {
  const moduliBrendGuma = import.meta.glob('../assets/Slike/BrendoviGuma/*.*');
  let idBrendGuma = 0,rbrBrendGumaCsv = 0,imeBrendGumaCsv,tekstBrendGumaCsv;

  for (const pathAkcija in moduliBrendGuma) {
    const urlAkcija = await moduliBrendGuma[pathAkcija]();
    rbrBrendGumaCsv = parseInt(redoviBrendGuma[idBrendGuma + 1].split(";")[0]);
    imeBrendGumaCsv = redoviBrendGuma[idBrendGuma + 1].split(";")[1];
    tekstBrendGumaCsv = redoviBrendGuma[idBrendGuma + 1].split(";")[2];
    //if(rbrBrendGumaCsv == (idBrendGuma + 1)){
      slikeBrendGuma.value.push({ url: urlAkcija.default, id: rbrBrendGumaCsv, ime: imeBrendGumaCsv});
      ++idBrendGuma;
    /*}
      else{*/ //console.log("rbrBrendGumaCsv = " + rbrBrendGumaCsv + "id = " + idBrendGuma + " " + urlAkcija.default)
    //}
  }
  loadingBrendovi.value = false;
}

function naruciAkciju(idAkcije){
  router.push({name: "PonudaAkcija", params: {id: idAkcije}});
}

window.addEventListener("scroll", function (e) {
  if (dialog.value && imaVelikaAkcija && !vecVidioAkciju){
    window.scrollTo(0, 0);
  } 
});

async function imaSlika(){
  const velikaAkcijaPutanja = import.meta.glob('../assets/Slike/VelikaAkcija/*.*');
  for (const pathAkcija in velikaAkcijaPutanja) {
    const urlVAkcija = await velikaAkcijaPutanja[pathAkcija]();
    imaVelikaAkcija = true;
    dialog.value = true;
    srcVelikaAkcija = urlVAkcija.default;
  }
}

function ZatvoriAkciju(){
  dialog.value = false;
  document.cookie = "Akcija=true;";
}

function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
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

function NasRad(){
    router.push({name: "NasRad"});
  }

   function Onama(){
    router.push({name: "ONama"});
  }

  function Kontaktiraj(){
      router.push({name: "Kontakt"});
    }

  function idiBlogArtikal(putanja){
    router.push({ name: 'BlogArtikal', params: { idBlog: putanja } });
  }

  function Blog(){
    router.push({name: "Blog"});
  }
</script>

<style>

.akcija {
  position: absolute;
  left:0;
  right:0;
  bottom:0;
  background-color: hsla(0, 0%, 0%, 0.8);
  width: 100%; 
  height: 100%; 
  overflow: hidden;
}
.imaggg {
  background-color: transparent;
   width: 100%;
  max-height: 100%;
}
.lds-circle,
.lds-circle div {
  box-sizing: border-box;
}
.lds-circle {
  display: inline-block;
  transform: translateZ(1px);
}
.lds-circle > div {
  display: inline-block;
  width: 64px;
  height: 64px;
  margin: 8px;
  background: #ff0202;
  border-radius: 50%;
  animation: lds-circle 2.4s cubic-bezier(0, 0.2, 0.8, 1) infinite;
}
@keyframes lds-circle {
  0%, 100% {
    animation-timing-function: cubic-bezier(0.5, 0, 1, 0.5);
  }
  0% {
    transform: rotateY(0deg);
  }
  50% {
    transform: rotateY(1800deg);
    animation-timing-function: cubic-bezier(0, 0.5, 0.5, 1);
  }
  100% {
    transform: rotateY(3600deg);
  }
}


</style>