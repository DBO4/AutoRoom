<template>
    <div class="banner-5 px-10 py-10" id="testimonial">
    <div class="bg-white py-5" style="border-radius: 54px;">
      <div class="space-y-4 grid place-items-center mt-5">
        <h3 class="heading3">Izaberite kategoriju</h3>
        <p class="font-work_sans text-gray-600 font-semibold leading-relaxed">
          Samo dio uske selekcije blalablalf,flsflbldsmblamlablablalbalbalbalblbalblabla
        </p>
      </div>
      <div class="px-8 py-2">
        <div class="text-center">
        <v-sheet
            class="mx-auto"
            elevation="8"
            width="80%">
            
            <v-slide-group
            v-model="model"
            selected-class="bg-red"
            show-arrows>

            <v-slide-group-item
                v-for="n in images"
                :key="n.id"
                v-slot="{ isSelected, toggle, selectedClass }"
                >

                <v-card
                :class="['ma-4', selectedClass, 'container', 'py-6']"
                :color="isSelected ? 'red' : 'grey-lighten-2'"
                height="200"
                width="200"
                @click="toggle"
                >
                    <p class="text-h5 font-weight-black">{{n.ime}}</p>
                    <div class="d-flex fill-height align-center justify-center">
                        <img :src="n.url" :alt="n.id" id="slika"></img> 
                    </div>
                </v-card>
            </v-slide-group-item>
            </v-slide-group>
            <v-expand-transition>
            <v-sheet
                v-if="model != null"
            >
                <div v-if="model == 0" class="pa-6">
                        <div class="d-flex fill-height align-center justify-center">
                            <h3 class="text-h6">
                                Unesite podatke o gumama koje vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                            </h3>
                        </div>
                        <v-expansion-panels class="px-15">
                            <v-expansion-panel
                            title="Uputstvo za dimezije guma">
                                <v-expansion-panel-text>
                                    <v-row no-gutters>
                                        <v-spacer></v-spacer>
                                        <v-col cols="12">
                                            <div class="flex">
                                                <v-img
                                                height="450"
                                                src="src\assets\Tire-Size.jpg"
                                                ></v-img>
                                            </div>
                                        </v-col>    
                                    </v-row>
                                </v-expansion-panel-text>
                            </v-expansion-panel>
                            <v-expansion-panel
                                title="Šta možete očekivati od naše ponude?"
                                text="Možete očekivati brendove Matador, Pireli, Mischelin, Tigar Ling Long, Ćin Ćong, gume za aute, kamione, motore, tačke, kolica za bebe, informacije o načinima i vremenima isporuke bla bla bla"
                            >
                            </v-expansion-panel>
                        </v-expansion-panels>
                        <div class ="align-center justify-center d-flex px-8 pt-6">
                            <v-number-input
                                :reverse="false"
                                controlVariant="default"
                                label="Dimenzija A"
                                :hideInput="false"
                                :inset="false"
                                v-model="dimA"
                                width="200"
                                class="ma-4"
                                :max="300"
                                :min="150"
                            ></v-number-input>
                            <v-number-input
                                :reverse="false"
                                controlVariant="default"
                                label="Dimenzija B"
                                :hideInput="false"
                                :inset="false"
                                v-model="dimB"
                                width="200"
                                class="ma-4"
                                :max="100"
                                :min="30"
                            ></v-number-input>
                            <v-number-input
                                :reverse="false"
                                controlVariant="default"
                                label="Dimenzija C"
                                :hideInput="false"
                                :inset="false"
                                width="200"
                                v-model="dimC"
                                class="ma-4"
                                :max="100"
                                :min="30"
                            ></v-number-input>
                            <v-text-field
                                :reverse="false"
                                controlVariant="default"
                                label="Dot"
                                :hideInput="false"
                                :inset="false"
                                width="200"
                                v-model="dot"
                                class="ma-4"
                            ></v-text-field>
                            <v-radio-group inline label="Izaberite vrstu guma" v-model="tip">
                                <v-radio color="red" label="Zimske" value="Zimske"></v-radio>
                                <v-radio color="red" label="Ljetne" value="Ljetne"></v-radio>
                                <v-radio color="red" value="M+S" label="M+S"></v-radio>
                            </v-radio-group>                        
                        </div>
                </div>
                <div v-if="model == 1" class="pa-4">
                    <div class="d-flex fill-height align-center justify-center">
                        <h3 class="text-h6">
                            Unesite podatke o felugama koje vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                        </h3>
                    </div>
                    <div class ="align-center justify-center d-flex px-8">
                        <v-combobox
                            v-model="brendovi"
                            :items="items"
                            label="Brendovi"
                        ></v-combobox>
                        <v-number-input
                            :reverse="false"
                            controlVariant="default"
                            label="Veličina feluge"
                            :hideInput="false"
                            :inset="false"
                            width="200"
                            v-model="cola"
                            class="ma-4"
                            :max="30"
                            :min="5"
                        ></v-number-input>
                        <v-number-input
                            :reverse="false"
                            controlVariant="default"
                            label="Broj rupa"
                            :hideInput="false"
                            :inset="false"
                            width="200"
                            v-model="rupa"
                            class="ma-4"
                            :max="10"
                            :min="1"
                        ></v-number-input>
                        <v-number-input
                            :reverse="false"
                            controlVariant="default"
                            label="Promjer rupa"
                            :hideInput="false"
                            :inset="false"
                            width="200"
                            v-model="promjer"
                            class="ma-4"
                            :max="300"
                            :min="1"
                        ></v-number-input>
                    </div>
                </div>
                <div v-if="model == 2" class="pa-4">
                    <div class="d-flex fill-height align-center justify-center">
                        <h3 class="text-h6">
                            Unesite podatke o kozmetici koja vas interesuje, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                        </h3>
                    </div>
                </div>
                <div v-if="model == 3" class="pa-4">
                    <div class="d-flex fill-height align-center justify-center">
                        <h3 class="text-h6">
                            Unesite podatke o moto opremi koja vas interesuje, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                        </h3>
                    </div>
                    <div class ="align-center justify-center d-flex px-8">
                        <v-combobox
                            v-model="cmbMotoOprema"
                            :items="stavkeMotoOprema"
                            label="Moto oprema"
                            class = "ma-4"
                        ></v-combobox>
                        <v-combobox
                            v-model="cmbVelicina"
                            :items="stavkeVelicina"
                            label="Veličina"
                            class = "ma-4"
                        ></v-combobox>
                    </div>
                </div>
                <div v-if="model == 4" class="pa-4">
                    <div class="d-flex fill-height align-center justify-center">
                        <h3 class="text-h6">
                            Unesite podatke o ratkapnama koje vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                        </h3>
                    </div>
                    <div class ="align-center justify-center d-flex px-8">
                         <v-combobox
                            v-model="brendovi"
                            :items="items"
                            label="Brendovi"
                        ></v-combobox>
                        <v-number-input
                            :reverse="false"
                            controlVariant="default"
                            label="Veličina feluge"
                            :hideInput="false"
                            :inset="false"
                            width="200"
                            v-model="cola"
                            class="ma-4"
                            :max="30"
                            :min="5"
                        ></v-number-input>
                    </div>
                </div>
                <div v-if="model == 5" class="pa-4">
                    <div class="d-flex fill-height align-center justify-center">
                        <h3 class="text-h6">
                            Unesite podatke o auto dijelovima ili uljima koje vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                        </h3>
                    </div>
                </div>
                <div v-if="model == 6" class="pa-4">
                    <div class="d-flex fill-height align-center justify-center">
                        <h3 class="text-h6">
                            Unesite podatke o moto dijelovima ili uljima koje vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                        </h3>
                    </div>
                </div>
                <div v-if="model == 7" class="pa-4">
                    <div class="d-flex fill-height align-center justify-center">
                        <h3 class="text-h6">
                            Unesite podatke o akumulatorima koji vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                        </h3>
                    </div>
                </div>
                <div v-if="model == 8" class="pa-4">
                    <div class="d-flex fill-height align-center justify-center">
                        <h3 class="text-h6">
                            Unesite podatke o svemu ostalom što niste pronašli i što vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                        </h3>
                    </div>
                </div>
                <div>
                        <div class="px-11 pb-10">
                            <h3 class="text-h6" style="text-align: left;">
                                Dodatna napomena:
                            </h3>
                            <v-textarea v-model="nap" label="Ovde upišite sve dodatne detalje npr. brend koji favorizujete, specifičnu dimenziju koju niste našli, gume za druga vozila (osim automobila)..." variant="outlined"></v-textarea>
                        </div>
                        <h3 class="text-h5">
                            Izaberite vrstu komunikacije i popunite polja sa kontakt informacijama da Vas možemo kontaktirati
                        </h3>
                        <v-radio-group inline v-model = "komunikacija" class="d-flex justify-center align-center" v-on:change="onemoguci()">
                            <v-radio label="E-mail" value="email"></v-radio>
                            <v-radio label="Poziv" value="tel"></v-radio>
                            <v-radio label="Viber" value="viber"></v-radio>
                            <v-radio label="WhatsApp" value="wa"></v-radio>
                            <v-radio label="Telegram" value="telegram   "></v-radio>
                        </v-radio-group>
                        <div class ="align-center justify-center d-flex px-8 pt-6">
                            <v-text-field
                                v-model="email"
                                :rules="[rules.required, rules.email]"
                                label="E-mail"
                                class="px-8"
                                :disabled=!onemoguci()
                                variant = "solo"
                            ></v-text-field>
                            <v-text-field
                                v-model="brtel"
                                label="Broj telefona"
                                class="px-8"
                                :disabled=onemoguci()
                            ></v-text-field>
                        </div>
                        <v-btn variant="flat" 
                               rounded="xl" 
                               size="x-large"
                               color="success"
                               class="ma-5"
                               @click="ZatraziPonudu()" >
                            Zatraži ponudu
                        </v-btn>
                </div>
                
<!--
    <v-fade-transition hide-on-leave>
      <v-card
        v-if="dialog"
        append-icon="$close"
        class="mx-auto"
        elevation="16"
        max-width="500"
        title="Send a receipt"
      >
        <template v-slot:append>
          <v-btn icon="$close" variant="text" @click="dialog = false"></v-btn>
        </template>

        <v-divider></v-divider>

        <div class="py-12 text-center">
          <v-icon
            class="mb-6"
            color="success"
            icon="mdi-check-circle-outline"
            size="128"
          ></v-icon>

          <div class="text-h4 font-weight-bold">This receipt was sent</div>
        </div>

        <v-divider></v-divider>

        <div class="pa-4 text-end">
          <v-btn
            class="text-none"
            color="medium-emphasis"
            min-width="92"
            variant="outlined"
            rounded
            @click="dialog = false"
          >
            Close
          </v-btn>
        </div>
      </v-card>
    </v-fade-transition>-->
            </v-sheet>
    </v-expand-transition>
  </v-sheet>

  </div>
      </div>
    </div>
    
  </div>
  
</template>


<script setup>
  import { ref, onMounted } from 'vue';
  import Kategorije from '../assets/TekstFajlovi/Kategorije.csv?raw';
  import Brendovi from '../assets/TekstFajlovi/Brendovi.csv?raw';
  import MotoOprema from '../assets/TekstFajlovi/MotoOprema.csv?raw';
  import Velicine from '../assets/TekstFajlovi/Velicine.csv?raw';
  import Poslato from '../assets/Poslato.gif'
  import Akcije from '../assets/TekstFajlovi/Akcije.csv?raw';
  import axios from 'axios';

  const model = ref(null);
  const images = ref([]);
  const redoviKategorije = Kategorije.split('\n');
  const brKategorija = ref(redoviKategorije.length - 1);
  const rules = {
    required: value => (!!value || 'Required.'),
    counter: value => value.length <= 20 || 'Max 20 characters',
    email: value => {
    const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    return pattern.test(value) || 'Nevažeći e-mail.'
    },
  }
  const komunikacija = ref("email");
  const dimA = ref(150);
  const dimB = ref(50);
  const dimC = ref(50);
  const tip = ref();
  const nap = ref("");
  const brtel = ref("");
  const email = ref("");
  const d = new Date();
  const dot = ref("Svi");
  const items = Brendovi.split('\n');
  const brendovi = ref('Svi');
  const cola = ref();
  const rupa = ref();
  const promjer = ref();
  const cmbMotoOprema = ref("Sve");
  const cmbVelicina = ref("Sve");
  const stavkeMotoOprema = MotoOprema.split('\n');
  const stavkeVelicina = Velicine.split('\n');
  const dialog = ref(false);

  const props = defineProps({
    id: String
  })

  onMounted(async () => {
    const modules = import.meta.glob('../assets/Slike/Kategorije/*.*');
    let idStavke = 0,nazivKatCsv,splitUrl;
    for (const path in modules) {
        let url = await modules[path]();
        splitUrl = url.default.split("?")[0];
         nazivKatCsv = redoviKategorije[idStavke + 1].split(";")[1];
        images.value.push({ url: splitUrl, id: ++idStavke, ime: nazivKatCsv});    
    }
    if (props.id > 0){
        model.value = 8;
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
                nap.value = "Želim da vam pošaljem zahtjev za zvaničnu ponudu sa sektora 'Trenutna akcija' \nZanima me: " + imeAkcijeCsv + " " + 
                tekstAkcijeCsv + " sa cijenom od " + cijenaAkcijaCsv + 
                "KM.\nDodatne napomene: (dodaj još).\nUkoliko ste spremni da naručite upišite sljedeće podatke:\nIme i prezime:\nAdresa:\nIspod odaberite opciju 'Poziv' i upišite Vaš broj telefona i kliknite na dugme 'Zatraži ponudu'\nHvala!." ;
            }
            
        }  
    }
  })

  function onemoguci(){
    if (komunikacija.value == "email"){
        return true;
    }
    else return false;
  }

  function ZatraziPonudu(){
    if (komunikacija.value == "email" && email.value == "") {
        alert("<Email> polje je prazno");
        return;
    }
    else if (komunikacija.value != "email" && brtel.value == ""){
        alert("Polje <Broj Telefona> je prazno");
        return;
    }

    if (model.value == 0){
        axios
        .get("http://localhost:3000/API/Gume.php?email=" + email.value + "&brtel=" + brtel.value + "&kanal=" + komunikacija.value + "&dimA=" + dimA.value + "&dimB=" + dimB.value + "&dimC=" + dimC.value + "&tip=" + tip.value + "&nap=" + nap.value + "&dot=" + dot.value)
        .then(function (response) {
            console.log(response.data);
            if (response.data.error) {
            this.errorMsg = response.data.message;
            } else {
            this.projects = response.data;
            }
        });
        dimA.value = 150;
        dimB.value = 150;
        dimC.value = 150;
        tip.value = "";
        dot.value = "";
      }
    else if (model.value == 1){
        axios
        .get("http://localhost:3000/API/Feluge.php?email=" + email.value + "&brtel=" + brtel.value + "&kanal=" + komunikacija.value + "&brend=" + brendovi.value + "&vel=" + cola.value + "&rupa=" + rupa.value + "&promjer=" + promjer.value + "&nap=" + nap.value )
        .then(function (response) {
            console.log(response.data);
            if (response.data.error) {
            this.errorMsg = response.data.message;
            } else {
            this.projects = response.data;
            }
        });
        brendovi.value = "Svi";
        cola.value = null;
        rupa.value = null;
        promjer.value = null;
    }
    else if (model.value == 2){
        axios
        .get("http://localhost:3000/API/Kozmetika.php?email=" + email.value + "&brtel=" + brtel.value + "&kanal=" + komunikacija.value + "&nap=" + nap.value )
        .then(function (response) {
            console.log(response.data);
            if (response.data.error) {
            this.errorMsg = response.data.message;
            } else {
            this.projects = response.data;
            }
        });
    }
    else if (model.value == 3){
        axios
        .get("http://localhost:3000/API/MotoOprema.php?email=" + email.value + "&brtel=" + brtel.value + "&kanal=" + komunikacija.value + "&nap=" + nap.value + "&oprema=" + cmbMotoOprema.value + "&vel=" + cmbVelicina.value)
        .then(function (response) {
            console.log(response.data);
            if (response.data.error) {
            this.errorMsg = response.data.message;
            } else {
            this.projects = response.data;
            }
        });
        cmbMotoOprema.value = "Svi";
        cmbVelicina.value = "Svi";
    }
    else if (model.value == 4){
        axios
        .get("http://localhost:3000/API/Ratkape.php?email=" + email.value + "&brtel=" + brtel.value + "&kanal=" + komunikacija.value + "&brend=" + brendovi.value + "&vel=" + cola.value )
        .then(function (response) {
            console.log(response.data);
            if (response.data.error) {
            this.errorMsg = response.data.message;
            } else {
            this.projects = response.data;
            }
        });
        brendovi.value = "Svi";
        cola.value = "Svi";
    }
    else if (model.value == 5){
        axios
        .get("http://localhost:3000/API/AutoDijelovi.php?email=" + email.value + "&brtel=" + brtel.value + "&kanal=" + komunikacija.value + "&nap=" + nap.value )
        .then(function (response) {
            console.log(response.data);
            if (response.data.error) {
            this.errorMsg = response.data.message;
            } else {
            this.projects = response.data;
            }
        });
    }
    else if (model.value == 6){
        axios
        .get("http://localhost:3000/API/MotoDijelovi.php?email=" + email.value + "&brtel=" + brtel.value + "&kanal=" + komunikacija.value + "&nap=" + nap.value )
        .then(function (response) {
            console.log(response.data);
            if (response.data.error) {
            this.errorMsg = response.data.message;
            } else {
            this.projects = response.data;
            }
        });
    }
    else if (model.value == 7){
        axios
        .get("http://localhost:3000/API/Akumulatori.php?email=" + email.value + "&brtel=" + brtel.value + "&kanal=" + komunikacija.value + "&nap=" + nap.value )
        .then(function (response) {
            console.log(response.data);
            if (response.data.error) {
            this.errorMsg = response.data.message;
            } else {
            this.projects = response.data;
            }
        });
    }
    else if (model.value == 8){
        axios
        .get("http://localhost:3000/API/Ostalo.php?email=" + email.value + "&brtel=" + brtel.value + "&kanal=" + komunikacija.value + "&nap=" + nap.value )
        .then(function (response) {
            console.log(response.data);
            if (response.data.error) {
            this.errorMsg = response.data.message;
            } else {
            this.projects = response.data;
            }
        });
    }
    
    email = ref("");
    brtel.value = "";
    komunikacija.value = null;
    nap.value = "";
    dialog.value = !dialog;
    alert("Hvala na interesovanju! Vaš upit je uspješno poslan! Očekujte odgovor ubrzo.");
  }



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
</style>