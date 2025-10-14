<template>
    
   <div :class="[$vuetify.display.mobile ? 'ma-2 pa-2' : '', 'rounded-xl']" :style=" $vuetify.display.mobile ? 'border-radius: 20px; background-color: #FEF4F4; margin-top: 20px;' : ' margin-top: 20px; margin-left: 140px; margin-right: 140px; background-color: #FEF4F4;'"
>
    <div :style=" $vuetify.display.mobile ? 'font-size: 2rem; font-weight: bolder;' : 'font-size: 4rem; font-weight: bolder;'" class = "align-center text-center grid place-items-center">Naručite to što ste htjeli</div>

    <h3 class="text-h6 px-4 pt-10 text-center" >
        Poštarina 10KM
    </h3>
   
     <div class ="grid place-items-center pt-6">
        <div class ="align-center justify-center d-flex px-8 pt-6">
            <v-text-field
                v-model="artikal"
                label="Artikal"
                :width = "$vuetify.display.mobile ? 200 : 600"
                outline
                :disabled = true
                variant="solo"
            ></v-text-field>
            <v-text-field
                v-model="cijena"
                label="Cijena"
                :disabled= true
                :width = "$vuetify.display.mobile ? 90 : 150"
                outline
                variant="solo"
            ></v-text-field>
        </div>
        <v-text-field
            v-model="opis"
            label="Opis"
            :width = "$vuetify.display.mobile ? 290 : 750"
            outline
            :disabled= true
            variant="solo"
        ></v-text-field>
        <v-text-field
            v-model="imePr"
            label="Ime i prezime"
            :width = "$vuetify.display.mobile ? 290 : 750"
            outline
            variant="solo"
        ></v-text-field>
        <v-text-field
            v-model="brtel"
            label="Broj telefona"
            :width = "$vuetify.display.mobile ? 290 : 750"
            variant="solo"
        ></v-text-field>
        <v-text-field
            v-model="adresa"
            label="Adresa"
            :width = "$vuetify.display.mobile ? 290 : 750"
            variant="solo"
        ></v-text-field>
    </div>

    <div class="px-6 ">
        <h3 class="text-h6 text-black px-5" style="text-align: left; font-size: 1.6rem; background-color: white; width: fit-content;">
            Vaša napomena:
        </h3>
        <v-textarea v-model="nap" label="Ovde upišite dodatne informacije ako su potrebne" variant="solo"></v-textarea>
    </div>
    <div class="grid place-items-center" style="width: auto;">
         <v-checkbox
            v-model="prihvatam"
            label="Prihvatam uslove korištenja"   
        >
        </v-checkbox>
        <v-btn @click="UsloviKoristenja()">Pročitaj uslove korištenja</v-btn>
        <v-btn style="color: white; background-color: #520000; font-size: 1rem; text-align: center; vertical-align: middle;" rounded="lg" height="50px"
                                            class="mb-10 mt-5"
            @click="posaljiMejl()"
            >
            Naruči
        </v-btn>
    </div>
   </div>


     <div v-if="jeTelefon()">
    <div class="text-center" v-if="sheet">
       

        <v-bottom-sheet v-model="sheet">
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
                    <v-btn icon="$close" variant="text"  @click="sheet = !sheet"></v-btn>
                    </template>

                    <div class="text-center  grid place-items-center">
                    <h2  style="font-size: 3rem;">
                        Vaša ponuda je zaprimljena, očekujte odgovor uskoro!
                    </h2>
                    <v-img
                        src="src/assets/poslato.gif"
                        class="imaggg"
                        ></v-img>
                    </div>       
                </v-card>
            </div>
            </v-card-text>
        </v-card>
        </v-bottom-sheet>
    </div>
    <!--<div
        class="ponuda pt-20"
        v-if="dialog"
    >
        <v-fade-transition hide-on-leave>
        <v-card
        
            append-icon="$close"
            class="mx-auto"
            elevation="16"
            max-width="60%"
            ref="dialog"
        >
            <template v-slot:append>
            Zatvori
            <v-btn icon="$close" variant="text" @click="ZatvoriAkciju()"></v-btn>
            </template>

            <div class="text-center  grid place-items-center">
            <h2  style="font-size: 2rem;">
                Vaša ponuda je zaprimljena, očekujte odgovor uskoro!
            </h2>
            <v-img
                src="src/assets/poslato.gif"
                class="imaggg"
                ></v-img>
            </div>       
        </v-card>
        </v-fade-transition>
    </div>-->
  </div>
  <div v-else>
    <!--<div
    class="ponuda"
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

        <div class="text-center  grid place-items-center">
          <h2  style="font-size: 3rem;">
            Vaša ponuda je zaprimljena, očekujte odgovor uskoro!
          </h2>
          <v-img
            src="src/assets/poslato.gif"
            class="imaggg"
            ></v-img>
        </div>       
      </v-card>
    </v-fade-transition>
    </div>-->
    <div class="pa-8 text-center" v-if="sheet">
       

        <v-bottom-sheet v-model="sheet">
        <v-card class="text-center" height="200">
            <v-card-text>

            <br>
            <br>

            <div>
                
                <v-card
       
                    append-icon="$close"
                    class="mx-auto"
                    elevation="16"
                    max-width="40%"
                >
                    <template v-slot:append>
                    Zatvori
                    <v-btn icon="$close" variant="text"  @click="sheet = !sheet"></v-btn>
                    </template>

                    <div class="text-center  grid place-items-center">
                    <h2  style="font-size: 3rem;">
                        Vaša ponuda je zaprimljena, očekujte odgovor uskoro!
                    </h2>
                    <v-img
                        src="src/assets/poslato.gif"
                        class="imaggg"
                        ></v-img>
                    </div>       
                </v-card>
            </div>
            </v-card-text>
        </v-card>
        </v-bottom-sheet>
    </div>
  </div>

</template>

<script setup>
    import {ref, onMounted, shallowRef} from 'vue';
    import axios from 'axios';
    import SvgIcon from '@jamescoyle/vue-icon'
    import { mdiAccount } from '@mdi/js'
    import { useRouter } from 'vue-router';
    import Akcije from '../assets/TekstFajlovi/Akcije.csv?raw';

    const nap = ref("");
    const brtel = ref("");
    const dialog = ref(false);
    const router = useRouter();
    const props = defineProps({
        id: String
    });
    const artikal = ref("");
    const cijena = ref("");
    const opis = ref("");
    const imePr = ref("");
    const adresa = ref("");
    const sheet = shallowRef(false);
    const prihvatam = ref([''])

    var idAkcijeKlik = 0;

    onMounted(async() =>{
        window.scrollTo(0, 0);

        if (props.id != "999"){
            const redoviAkcija = Akcije.split('\n');
            const moduliAkcija = import.meta.glob('../assets/Slike/Akcije/*.*');
            let idAkcije = 0,rbrAkcijeCsv,imeAkcijeCsv,tekstAkcijeCsv,cijenaAkcijaCsv;

            for (const pathAkcija in moduliAkcija) {
                const urlAkcija = await moduliAkcija[pathAkcija]();
                rbrAkcijeCsv = redoviAkcija[idAkcije + 1].split(";")[0];
                imeAkcijeCsv = redoviAkcija[idAkcije + 1].split(";")[1];
                tekstAkcijeCsv = redoviAkcija[idAkcije + 1].split(";")[2];
                cijenaAkcijaCsv = redoviAkcija[idAkcije + 1].split(";")[3];
                idAkcije++;
                if(rbrAkcijeCsv == (props.id)){
                    artikal.value = imeAkcijeCsv;
                    cijena.value = cijenaAkcijaCsv + " KM";
                    opis.value = tekstAkcijeCsv;
                    idAkcijeKlik = idAkcije;
                }
                
            }  
        } else {
            artikal.value = "Glavna velika akcija";
            cijena.value = "po uputstvu";
            opis.value = "Glavna akcija";
            idAkcijeKlik = "999";
        }

    })


     function jeTelefon(){
        /*if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            return true
        } else {
            return false
        }*/
        
        if (window.innerWidth > 800) return false;
        else return true;
    }

    function posaljiMejl(){
        if (brtel.value == ""){
            alert("Polje <Broj Telefona> je prazno");
            return;
        }
        else if (imePr.value == ""){
            alert("Polje <Ime i prezime> je prazno");
            return;
        }
        else if (adresa.value == ""){
            alert("Polje <Broj Telefona> je prazno");
            return;
        }
        else if (prihvatam.value == false){
            alert("Odaberite <Prihvatam uslove korištenja>");
            return;
        }

        axios
        .get("http://localhost:3000/API/Narudzba.php?imePr=" + imePr.value + "&brtel=" + brtel.value + "&adresa=" + adresa.value + "&id=" + idAkcijeKlik + "&naziv=" + artikal.value + "&cijena=" + cijena.value + "&nap=" + nap.value)
        .then(function (response) {
            if (response.data.error) {
            console.log(response.data.message);
            }
        });
        window.scrollTo({ top: 0, behavior: 'smooth' });
        sheet.value = true;
    }

    function UsloviKoristenja(){
        router.push({name: "UsloviNarudzbe"});
    };

</script>

<style scoped>
.container {
    width: 100%;
    height: 100px;
    border: 1px solid black;
    display: flex;
    flex-direction: column; 
    align-items: center;
    justify-content: center;
    overflow: hidden; /* Hide overflow if text becomes too large */
}
.ponuda {
  position:absolute;
  left:0;
  right:0;
  bottom:0;
  top: 0;
  background-color: hsla(0, 0%, 0%, 0.8);
  width: 100%; 
  height: 100%; 
  overflow:visible;
}
.imaggg {
  background-color: transparent;
   width: 50%;
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