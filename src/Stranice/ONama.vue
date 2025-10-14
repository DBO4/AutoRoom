<template>
    <div :class="[$vuetify.display.mobile ? 'ma-2 pa-2' : 'pa-10', 'text-white rounded-xl']" :style=" $vuetify.display.mobile ? 'border-radius: 0px; margin-left: 20px; margin-right: 20px; background-image: url(src/assets/tragovi-30.png); background-blend-mode:exclusion; background-size: cover;' : 'margin-left: 140px; margin-right: 140px; margin-top: 50px; background-image: url(src/assets/tragovi-30.png); background-blend-mode:exclusion; background-size: cover;'" >
        <div :style=" $vuetify.display.mobile ? 'font-size: 3rem; font-weight: bolder;' : 'font-size: 6rem; font-weight: bolder;'" class = "align-center grid place-items-center">O nama</div>
        <div :style=" $vuetify.display.mobile ? 'font-size: 1.3rem;' : 'font-size: 1.8rem;'" >
            <b>Kompanija Agrohim&Kemoimpex doo prisutna je u automobilskoj industriji od 09.10.1991. 
                godine kako kroz prodaju guma za sve vrste vozila tako i kroz prodaju i servisiranje novih i polovnih automobila iz
                putničkog i komercijalnog programa.</b>
                <br></br>
            </div>
        <br></br>
        
        <div :class="[$vuetify.display.mobile ? ' font-Eczar ma-5 rounded-xl outline font-bold leading-tight align-center grid place-items-center align-center text-red text-center outline' :
        ' px-8 rounded-xl mx-8 text-red md:flex gap-1 text-center outline md:gap-10 grid place-items-center flex items-center align-center justify-center d-flex 3xl:text-7xl  font-Eczar font-bold leading-tight align-center grid place-items-center pt-6']"
            :style="$vuetify.display.mobile ? 'font-size: 3rem; background-color: white; width: fit-content;' : ' outline font-size: 4rem; background-color: white; width: fit-content;'"
            style="background-color: hsla(0, 0%, 100%, 0.7);">
            <vue3-autocounter ref='counter' 
            :startAmount='0' 
            :endAmount= brojac1.broj 
            :duration='3' 
            :prefix= brojac1.naziv
            :suffix= brojac1.jedmj 
            separator='' 
            decimalSeparator='.' 
            class="py-5"
            :decimals='0' 
            :autoinit='true' />

            <vue3-autocounter ref='counter' 
            :startAmount='0' 
            :endAmount= brojac2.broj 
            :duration='3' 
            :prefix= brojac2.naziv
            :suffix= brojac2.jedmj 
            separator='' 
            decimalSeparator='.' 
            class="py-5"
            :decimals='0' 
            :autoinit='true' />

            <vue3-autocounter ref='counter' 
            :startAmount='0' 
            :endAmount= brojac3.broj 
            :duration='3' 
            :prefix= brojac3.naziv
            :suffix= brojac3.jedmj 
            separator='' 
            decimalSeparator='.' 
            class="py-5"
            :decimals='0' 
            :autoinit='true' />
        </div>
    
        <div style="font-size: 6rem;" class = "align-center grid place-items-center">
            <img src="../assets/igor.jpg" class="mx-5 mt-5 outline rounded-xl" :style="$vuetify.display.mobile ? 'height: fit-content; width: fit-content; object-fit: scale-down;' : 'height: 500px; width: fit-content; object-fit: scale-down;'"></img>
        </div>
    <br></br><br>
    
        <div :style=" $vuetify.display.mobile ? 'font-size: 1.3rem;' : 'font-size: 1.8rem;'"  class ="pa-4 rounded-xl outline">
        <a>
            Bi compamy zvanicno postoji od 2023god. Firma se bavi prodajom i prometom auto guma, dijelova i opreme za auta, motore, kvadove, traktore, industrijske masine i slicno. Pored toga bacimo se i izradom predmeta od drveta, odnosno izradom djecijih igraonica. 

U Martu smo otvorili vrata svog prvog Maloprodajnog objekta u Prijedoru AutoRoom prodavnice koja je specijalizovana za prodaju guma i opreme za automobile i motocikle. 

Kompanija od osnivanja biljezi rast, te je ove godine za prvih 7mjeseci vec premasila proslogodisnji promet.

Vodjeni entuzijazmom za poslom, cilj i vizija je da se i dalje napreduje u svim segmentima poslovanja.
</a>
    </div>


    <br></br>
 
    <br></br>


       <div style="background-color: white;" :class="[$vuetify.display.mobile ? 'ma-2 pt-3 pa-2 rounded-xl outline' : 'ma-5 pa-5 rounded-xl outline']">
        <div :style=" $vuetify.display.mobile ? 'font-size: 2rem; font-weight: bolder;' : 'font-size: 4rem; font-weight: bolder;'" class = "text-black align-center text-center grid place-items-center pa-5">Naši partneri</div>
        <Carousel v-bind="configAkcije">
            <Slide v-for="image in slike" >
                <div class="carousel__item mx-2 bg-white"id="carousel" >
                    <img :src="image.url"  id="slika" style="max-height:270px; width: fit-content; border-color: red; border-width: 5px;"/>  
                </div>
            </Slide>
            <template #addons>
                <Navigation />
                <Pagination />
            </template>
        </Carousel>
    </div>


     <br></br><br></br>

     <div>
       <div  style = "width: fit-content;" class ="pa-4 rounded-xl outline">
            <a>
                JIB: 5274568459845
            </a>
            <br></br>
            <a>
                Radno vrijene: 15-99
            </a>
            <br></br>
            <a>
                Adresa:trdftzghujioiuzft 852
            </a>
            <br></br>
            <a>
                sdadsadsa
            </a>
        </div>
     </div>
    </div>

 
</template>





<script setup>
import Vue3Autocounter from 'vue3-autocounter';
import {ref, onMounted, reactive} from 'vue';
import { Carousel, Pagination, Navigation, Slide } from 'vue3-carousel';
import Brojac from '../assets/TekstFajlovi/BrojacStatistikaONama.csv?raw';

const counter = ref("");
const slikeKlijent = ref([]);
const redoviBrojac = Brojac.split('\n');

const configAkcije = reactive({
  itemsToShow: jeTelefon() ? 2 : 6,
  gap: 0,
  autoplay: 1500,
  wrapAround: true,
  pauseAutoplayOnHover: true,
});

  function jeTelefon(){
   /*if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
     return true
   } else {
     return false
   }*/
   
  if (window.innerWidth > 800) return false;
  else return true;
}

const slike = ref([]);
const slikeFolder = import.meta.glob('../assets/Slike/klijenti/*.*');

const brojac1 = ref({
  naziv: redoviBrojac[1].split(";")[0],
  broj: Number(redoviBrojac[1].split(";")[1]),
  jedmj: redoviBrojac[1].split(";")[2]
});

const brojac2 = ref({
  naziv: redoviBrojac[2].split(";")[0],
  broj: Number(redoviBrojac[2].split(";")[1]),
  jedmj: redoviBrojac[2].split(";")[2]
});

const brojac3 = ref({
  naziv: redoviBrojac[3].split(";")[0],
  broj: Number(redoviBrojac[3].split(";")[1]),
  jedmj: redoviBrojac[3].split(";")[2]
});

onMounted(async() =>{
    window.scrollTo(0, 0);

    
    

    for (const folder in slikeFolder) {
        const urlFolder = await slikeFolder[folder]();
        slike.value.push({ url: urlFolder.default});
    }
});


window.addEventListener('resize', function() {

  const currentWidth = window.innerWidth;


  if (currentWidth > 1800) {
    configAkcije.itemsToShow = jeTelefon() ? 1.2 : 6;
  }
  else if (currentWidth <= 1800 && currentWidth > 1600) {
    configAkcije.itemsToShow = jeTelefon() ? 1.2 : 5;
  }  
  else if (currentWidth <= 1600 && currentWidth > 1400) {
    configAkcije.itemsToShow = jeTelefon() ? 1.2 : 4;
  } 
  else if (currentWidth <= 1400 && currentWidth > 1200) {
    configAkcije.itemsToShow = jeTelefon() ? 1.2 : 3.5;
  } 
  else if (currentWidth <= 1200 && currentWidth > 1000) {
    configAkcije.itemsToShow = jeTelefon() ? 1.2 : 3;
  } 
  else if (currentWidth <= 1000 && currentWidth > 800) {
    configAkcije.itemsToShow = jeTelefon() ? 1.2 : 2;
  } 
  else if (currentWidth <= 800 && currentWidth > 650) {
    configAkcije.itemsToShow = jeTelefon() ? 1.2 : 1.5;
  } 
  else if (currentWidth <= 650 && currentWidth > 450) {
    configAkcije.itemsToShow = jeTelefon() ? 1.2 : 1;
  } 
});


</script>