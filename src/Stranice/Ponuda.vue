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
            width="80%"
        >
            <v-slide-group
            v-model="model"
            selected-class="bg-red"
            show-arrows
            >
            <v-slide-group-item
                v-for="n in images"
                :key="n.id"
                v-slot="{ isSelected, toggle, selectedClass }"
                class="md:flex place-items-center"
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
                height="200"
            >
                <div v-if="model == 0">
                    <div class="d-flex fill-height align-center justify-center">
                        <h3 class="text-h6">
                            Unesite podatke o gumama koje vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                        </h3>
                    </div>
                    <div class ="align-center justify-center d-flex">
                     
                        <v-number-input
                            :reverse="false"
                            controlVariant="default"
                            label="Dimenzija A"
                            :hideInput="false"
                            :inset="false"
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
                            class="ma-4"
                            :max="100"
                            :min="30"
                            :model-value="50"
                        ></v-number-input>
                        
                    </div>
                </div>
            </v-sheet>
    </v-expand-transition>
  </v-sheet>

  </div>
      </div>
    </div>
    
  </div>
  
</template>


<script setup>
  import { ref, onMounted } from 'vue'
  import SvgIcon from '@jamescoyle/vue-icon';
  import { mdiAccount } from '@mdi/js';
  import Kategorije from '../assets/TekstFajlovi/Kategorije.csv?raw';

  const model = ref(null);
  const images = ref([]);
  const redoviKategorije = Kategorije.split('\n');
  const brKategorija = ref(redoviKategorije.length - 1);

  onMounted(async () => {
    const modules = import.meta.glob('../assets/Slike/Kategorije/*.*');
    let id = 0,nazivKatCsv,splitUrl;

    for (const path in modules) {
        let url = await modules[path]();
        splitUrl = url.default.split("?")[0];
        console.log(splitUrl);
        nazivKatCsv = redoviKategorije[id + 1].split(";")[1];
        images.value.push({ url: splitUrl, id: ++id, ime: nazivKatCsv});
        
    }
  })

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