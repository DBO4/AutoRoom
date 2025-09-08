<template>
<div :class="[$vuetify.display.mobile ? 'ma-4' : 'ma-15']">
<div class="space-y-4 grid place-items-center my-5 text-center">
    <h4 class=" text-white brzi">Trenuci sa nama</h4>
  </div>
  <v-row>
    <v-col
       v-for="slika in slike" 
      class="d-flex child-flex"
      :cols= "$vuetify.display.mobile ? 6 : 2"
    >
      <expandable-image
        :lazy-src="slika.url"
        :src="slika.url"
        aspect-ratio="1"
        class="bg-grey-lighten-2 rounded-xl"
        cover
      >
        <template v-slot:placeholder>
          <v-row
            align="center"
            class="fill-height ma-0"
            justify="center"
          >
            <v-progress-circular
              color="grey-lighten-5"
              indeterminate
            ></v-progress-circular>
          </v-row>
        </template>
    </expandable-image >
    </v-col>
  </v-row>
</div>
</template>

<script setup lang="js">
import { ref, onMounted } from 'vue';

const slike = ref([]);
const slikeFolder = import.meta.glob('../assets/Slike/NasRadGalerija/*.*');
const kolona = jeTelefon() ? 3 : 6;

import ExpandableImage from './ExpandableImage.vue'
let vueExpandableImage = {}

vueExpandableImage.install = function (Vue) {
  Vue.component('expandable-image', ExpandableImage)
}

if (typeof window !== 'undefined' && window.Vue) {
  window.Vue.use(vueExpandableImage)
}

onMounted(async () => {
    for (const folder in slikeFolder) {
        const urlFolder = await slikeFolder[folder]();
        slike.value.push({ url: urlFolder.default});
    }
});

function jeTelefon(){
   // return $vuetify.display.mobile;
}
</script>

<style scoped>
/* Dodatne lokalne stilove možeš dodati ovdje */
</style>
