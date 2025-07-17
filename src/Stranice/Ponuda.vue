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
                    <p class="text-h4 font-weight-black">{{n.ime}}</p>
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
                                :model-value="150"
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
                                :model-value="50"
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
                                :model-value="50"
                            ></v-number-input>
                            <v-radio-group inline label="Izaberite vrstu guma" v-model="tip">
                                <v-radio color="red" label="Zimske" value="Zimske"></v-radio>
                                <v-radio color="red" label="Ljetne" value="Ljetne"></v-radio>
                                <v-radio color="red" value="M+S" label="M+S"></v-radio>
                            </v-radio-group>                        
                        </div>
                        </div>
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
                                :rules="[rules.required]"
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
  import axios from 'axios';

  const model = ref(null);
  const images = ref([]);
  const redoviKategorije = Kategorije.split('\n');
  const brKategorija = ref(redoviKategorije.length - 1);
  const rules = {
    requiredEmail: value => (!!value || 'Required.') && !requiredTel,
    requiredTel: value => (!!value || 'Required.') && !requiredEmail,
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
  const brtel = ref(null);
  const email = ref("");

  onMounted(async () => {
    const modules = import.meta.glob('../assets/Slike/Kategorije/*.*');
    let id = 0,nazivKatCsv,splitUrl;

    for (const path in modules) {
        let url = await modules[path]();
        splitUrl = url.default.split("?")[0];
        nazivKatCsv = redoviKategorije[id + 1].split(";")[1];
        images.value.push({ url: splitUrl, id: ++id, ime: nazivKatCsv});    
    }
  })

  function onemoguci(){
    if (komunikacija.value == "email"){
        return true;
    }
    else return false;
  }

  function ZatraziPonudu(){
    axios
      .get("http://localhost:3000/mejl.php?email=" + email.value + "&brtel=" + brtel.value + "&kanal=" + komunikacija.value + "&dimA=" + dimA.value + "&dimB=" + dimB.value + "&dimC=" + dimC.value + "&tip=" + tip.value + "&nap=" + nap.value + "&model=" + model.value)
      .then(function (response) {
        console.log(response.data);
        if (response.data.error) {
          this.errorMsg = response.data.message;
        } else {
          this.projects = response.data.projects;
        }
      });
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