<template>
  <div class="banner-6">
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
            style="font-size: 10rem;"
          >
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
                <button class="bg-gray-800 submit-button-rad hidden md:block" style="font-size: 2rem;">
                  Pogledajte naš rad
                </button>
                <button
                  class="text-gray-800 submit-button " style="font-size: 2rem;">
                  Kontaktirajte nas
                </button>
            </div>
          </h1>
        </div>
      </div>
    </div>
  </div>

  <div class="banner-4 space-y-10 pb-20" id="work">
    <div class=" py-5 " style="border-radius: 54px; border-width: 15px; border-color:red; background-image: url('src/assets/tragovi.jpg'); background-size: 100%;
  background-repeat: no-repeat;
  background-position: center;">
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
    <div v-for="stakva in blog" :key="stakva.idBlog">
      <div class="card">
        <div class="space-y-5 py-8 px-8 md:py-16 md:px-20 md:w-1/2">
          <h4 class="project-title">{{ stakva.naslov }}</h4>
          <p class="font-work_sans pr-12">
            {{ stakva.tekst }}
          </p>
          <button class="submit-button-blog text-sky-800 font-bold text-2xl tracking-wider">
            {{stakva.dugme}}
          </button>
        </div>
        <div class="card-image">
          <img
            class="object-cover w-full h-72 md:h-96"
            :src="stakva.url"
          />
        </div>
      </div>
    </div>

    <div class="blog-kont">
      <button class="centar-blog submit-button" style="color: white; background-color: #db3030;">
        Otiđite na naš blog...
      </button>
    </div>

  </div>

  <div class="banner-5 px-10 py-10" id="testimonial">
    <div class="bg-white py-5" style="border-radius: 54px;">
      <div class="space-y-4 grid place-items-center mt-5">
        <h3 class="heading3">Riječi naših kupaca</h3>
        <p class="font-work_sans text-gray-600 font-semibold leading-relaxed">
          Samo dio uske selekcije komentara naših zadovoljnih kupaca
        </p>
      </div>
      <div class="px-8 py-2">
      <Carousel v-bind="config">
        <Slide v-for="image in images" :key="image.id">
          <div class="carousel__item border-2 border-gray-100 mx-8" style="width: 80%;" id="carousel">
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
    </div>
  </div>

  <div class="banner-2 md:flex items-center md:justify-evenly py-8" id="about">
    <iframe class = " border-4 border-gray-800"
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2368.6908003100257!2d16.708772736804814!3d44.96833191684829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4760cd000b87ae13%3A0x8bf179443b6b3452!2sAUTO%20ROOM!5e0!3m2!1ssr!2sba!4v1747567120361!5m2!1ssr!2sba" 
      width="600" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
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
      <button class="text-sky-800 font-bold text-2xl tracking-wider" style="color: red; text-decoration: underline;">
        O nama
      </button>
    </div>
  </div>

  <div class="banner-1">
    <div class=" flex h-full items-center">
      <div class="w-7/12 p-12">
      <h2 class="text-white md:text-6xl text-2xl font-Eczar mb-0 font-bold">
        Javite nam se da zajedno izaberemo najbolje gume za
      </h2>
      <h2 class="text-gray-700 kraj md:text-6xl text-2xl font-Eczar mb-5 font-bold">
        vašeg metalnog ljubimca
      </h2>

      <a class="underline text-2xl text-white font-work_sans pr-5"
        >info@autoroom.ba</a
      >
      <a class="underline text-2xl text-white font-work_sans"
        >+38755588855</a
      >
      </div>
      <div class="w-5/12 pr-28">
      <div class="flex flex-wrap justify-end gap-2">
        <button
          class="bg-gray-700 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded"
        >
          <svg
            class="w-4 h-4 md:w-10 md:h-10 lg:w-10 lg:h-10 xl:h-10 xl:w-10 fill-current"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
          >
            <path
              d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"
            />
          </svg>
        </button>

        <button
          class="bg-gray-700 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded"
        >
          <svg
            class="w-4 h-4 md:w-10 md:h-10 lg:w-10 lg:h-10 xl:h-10 xl:w-10 fill-current"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
          >
            <path
              d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"
            />
          </svg>
        </button>

        <button
          class="bg-gray-700 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded"
        >
          <svg
            class="w-4 h-4 md:w-10 md:h-10 lg:w-10 lg:h-10 xl:h-10 xl:w-10 fill-current"
            role="img"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M12 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0zm5.01 4.744c.688 0 1.25.561 1.25 1.249a1.25 1.25 0 0 1-2.498.056l-2.597-.547-.8 3.747c1.824.07 3.48.632 4.674 1.488.308-.309.73-.491 1.207-.491.968 0 1.754.786 1.754 1.754 0 .716-.435 1.333-1.01 1.614a3.111 3.111 0 0 1 .042.52c0 2.694-3.13 4.87-7.004 4.87-3.874 0-7.004-2.176-7.004-4.87 0-.183.015-.366.043-.534A1.748 1.748 0 0 1 4.028 12c0-.968.786-1.754 1.754-1.754.463 0 .898.196 1.207.49 1.207-.883 2.878-1.43 4.744-1.487l.885-4.182a.342.342 0 0 1 .14-.197.35.35 0 0 1 .238-.042l2.906.617a1.214 1.214 0 0 1 1.108-.701zM9.25 12C8.561 12 8 12.562 8 13.25c0 .687.561 1.248 1.25 1.248.687 0 1.248-.561 1.248-1.249 0-.688-.561-1.249-1.249-1.249zm5.5 0c-.687 0-1.248.561-1.248 1.25 0 .687.561 1.248 1.249 1.248.688 0 1.249-.561 1.249-1.249 0-.687-.562-1.249-1.25-1.249zm-5.466 3.99a.327.327 0 0 0-.231.094.33.33 0 0 0 0 .463c.842.842 2.484.913 2.961.913.477 0 2.105-.056 2.961-.913a.361.361 0 0 0 .029-.463.33.33 0 0 0-.464 0c-.547.533-1.684.73-2.512.73-.828 0-1.979-.196-2.512-.73a.326.326 0 0 0-.232-.095z"
            />
          </svg>
        </button>

        <button
          class="bg-gray-700 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded"
        >
          <svg
            class="w-4 h-4 md:w-10 md:h-10 lg:w-10 lg:h-10 xl:h-10 xl:w-10 fill-current"
            role="img"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.354-.629-2.758-1.379l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.607 0 11.985-5.365 11.985-11.987C23.97 5.39 18.592.026 11.985.026L12.017 0z"
            />
          </svg>
        </button>

        <button
          class="bg-gray-700 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded"
        >
          <svg
            class="w-4 h-4 md:w-10 md:h-10 lg:w-10 lg:h-10 xl:h-10 xl:w-10 fill-current"
            role="img"
            viewBox="0 0 256 256"
            xmlns="http://www.w3.org/2000/svg"
          >
            <g>
              <path
                d="M218.123122,218.127392 L180.191928,218.127392 L180.191928,158.724263 C180.191928,144.559023 179.939053,126.323993 160.463756,126.323993 C140.707926,126.323993 137.685284,141.757585 137.685284,157.692986 L137.685284,218.123441 L99.7540894,218.123441 L99.7540894,95.9665207 L136.168036,95.9665207 L136.168036,112.660562 L136.677736,112.660562 C144.102746,99.9650027 157.908637,92.3824528 172.605689,92.9280076 C211.050535,92.9280076 218.138927,118.216023 218.138927,151.114151 L218.123122,218.127392 Z M56.9550587,79.2685282 C44.7981969,79.2707099 34.9413443,69.4171797 34.9391618,57.260052 C34.93698,45.1029244 44.7902948,35.2458562 56.9471566,35.2436736 C69.1040185,35.2414916 78.9608713,45.0950217 78.963054,57.2521493 C78.9641017,63.090208 76.6459976,68.6895714 72.5186979,72.8184433 C68.3913982,76.9473153 62.7929898,79.26748 56.9550587,79.2685282 M75.9206558,218.127392 L37.94995,218.127392 L37.94995,95.9665207 L75.9206558,95.9665207 L75.9206558,218.127392 Z M237.033403,0.0182577091 L18.8895249,0.0182577091 C8.57959469,-0.0980923971 0.124827038,8.16056231 -0.001,18.4706066 L-0.001,237.524091 C0.120519052,247.839103 8.57460631,256.105934 18.8895249,255.9977 L237.033403,255.9977 C247.368728,256.125818 255.855922,247.859464 255.999,237.524091 L255.999,18.4548016 C255.851624,8.12438979 247.363742,-0.133792868 237.033403,0.000790807055"
              ></path>
            </g>
          </svg>
        </button>
      </div>
      </div>
    </div>
  </div>
  
  <div
    class="akcija"
     v-if="dialog"
  >
    <v-fade-transition hide-on-leave>
      <v-card
       
        append-icon="$close"
        class="mx-auto"
        elevation="16"
        max-width="40%"
        ref="dialog"
      >
        <template v-slot:append>
          Zatvori
          <v-btn icon="$close" variant="text" @click="ZatvoriAkciju()"></v-btn>
        </template>

        <div class="text-center">
          
          <v-img
            :src="srcVelikaAkcija"
            class="imaggg"
            ></v-img>
        </div>       
      </v-card>
    </v-fade-transition>

  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Carousel, Pagination, Navigation, Slide } from 'vue3-carousel';
import 'vue3-carousel/carousel.css';
import { useRouter } from 'vue-router';
import RijeciKupaca from '../assets/TekstFajlovi/RijeciKupaca.csv?raw';
import BlogCsv from '../assets/TekstFajlovi/Blog.csv?raw';
import Akcije from '../assets/TekstFajlovi/Akcije.csv?raw';
import { useFullscreen } from '@vueuse/core';
import { useTemplateRef } from 'vue';
import { useScroll } from '@vueuse/core'

const redovi = RijeciKupaca.split('\n');
const redoviBlog = BlogCsv.split('\n');
const redoviAkcija = Akcije.split('\n');
const router = useRouter();
const images = ref([]);
const blog = ref([]);
const slikeAkcije = ref([]);
const config = {
  itemsToShow: 3,
  gap: 5,
  mouseWheel: true,
  wrapAround: true,
};
const configAkcije = {
  itemsToShow: 6,
  gap: 0,
  mouseWheel: true,
  wrapAround: true,
};
const dialog = ref(false);
const props = defineProps({
  id: String
});
var imaVelikaAkcija = false, srcVelikaAkcija = "", vecVidioAkciju = false;

onMounted(async () => {
  const modules = import.meta.glob('../assets/Slike/MalaGalerija/*.*');
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
  }  

  //////

  const blogSlike = import.meta.glob('../assets/Slike/Blog/*.*');
  let idBlog = 0,rbrBlogCsv,naslovBlogCsv,tekstBlogCsv,dugmeBlogCsv,naslovnaBlogCsv;
  
  for (const pathBlog in blogSlike) {
    const urlBlog = await blogSlike[pathBlog]();
    rbrBlogCsv = redoviBlog[idBlog + 1].split(";")[0];
    naslovBlogCsv = redoviBlog[idBlog + 1].split(";")[1];
    tekstBlogCsv = redoviBlog[idBlog + 1].split(";")[2];
    dugmeBlogCsv = redoviBlog[idBlog + 1].split(";")[3];
    naslovnaBlogCsv = redoviBlog[idBlog + 1].split(";")[4];
    if (rbrBlogCsv == (idBlog + 1)){
      if (naslovnaBlogCsv.trim() == "D"){
        blog.value.push({ url: urlBlog.default, id: idBlog, naslov: naslovBlogCsv, tekst: tekstBlogCsv, dugme: dugmeBlogCsv});
      }
      ++idBlog;
    }
    else{console.log("rbrBlogCsv = " + rbrBlogCsv + "idBlog = " + idBlog);
    }
  }

  /////////////////////////

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
    }
      else{console.log("rbrAkcijeCsv = " + rbrAkcijeCsv + "id = " + idAkcije)
    }
  }

  vecVidioAkciju = getCookie("Akcija");

  if (!vecVidioAkciju) { imaSlika();}


});

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

</script>

<style>

.akcija {
  position: absolute;
  left:0;
  right:0;
  bottom:0;
  background-color: hsla(0, 0%, 0%, 0.8);
  width: 100%; /* Or a specific width */
  height: 100%; /* Or a specific height, or use aspect-ratio */
  overflow: hidden;
}
.imaggg {
  background-color: transparent;
   width: 100%;
  max-height: 100%;
}
</style>