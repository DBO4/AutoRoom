<template>
  <div
    :style=" $vuetify.display.mobile 
      ? 'border-radius: 15px; margin-left: 20px; margin-right: 20px; background-color: #272727; margin-top:25px; padding: 10px;' 
      : 'background-color: #272727; margin-left: 140px; margin-right: 140px; margin-top:25px; border-radius: 54px; padding: 20px;'"
  >
    <div class="space-y-4 grid place-items-center text-center">
      <h4 class="text-white brzi">Trenuci sa nama</h4>
    </div>

    <!-- Grid са сликама -->
    <v-row>
      <v-col
        v-for="(slika, i) in slike"
        :key="i"
        class="d-flex child-flex"
        :cols="$vuetify.display.mobile ? 6 : 2"
      >
        <img
          :src="slika.url"
          class="bg-grey-lighten-2 rounded-xl cursor-pointer"
          style="object-fit: cover; width: 100%; height: 100%;"
          @click="open(i)"
        />
      </v-col>
    </v-row>
  </div>

  <!-- Overlay lightbox -->
  <div 
    v-if="visible" 
    class="fixed inset-0 flex items-center justify-center z-50" :style=" $vuetify.display.mobile ? 'margin-top: 55px; background: rgba(0, 0, 0, 0.8);' : 'background: rgba(0, 0, 0, 0.8);'"
  >
    <!-- Strelica lijevo -->
    <button 
      @click="prev" 
      class="absolute left-5 text-white text-4xl pa-3"
      style="background-color: black;"
    >
      ⟨
    </button>

    <!-- Slika -->
    <img 
      :src="slike[index].url" 
      class="max-h-[90%] max-w-[90%] rounded-xl shadow-lg"
      style="object-fit: scale-down;"
    />

    <!-- Strelica desno -->
    <button 
      @click="next" 
      class="absolute right-5 text-white text-4xl pa-3"
      style="background-color: black;"
    >
      ⟩
    </button>

    <!-- Close dugme -->
    <button 
      @click="visible = false" 
      class="absolute top-5 right-5 text-white text-3xl"
    >
      ✕
    </button>
  </div>
</template>

<script setup lang="js">
import { ref, onMounted } from 'vue'

const slike = ref([])
const slikeFolder = import.meta.glob('../assets/Slike/NasRadGalerija/*.*')

// lightbox state
const visible = ref(false)
const index = ref(0)

function open(i) {
  index.value = i
  visible.value = true
}
function next() {
  index.value = (index.value + 1) % slike.value.length
}
function prev() {
  index.value = (index.value - 1 + slike.value.length) % slike.value.length
}

onMounted(async () => {
  window.scrollTo(0, 0)
  for (const folder in slikeFolder) {
    const urlFolder = await slikeFolder[folder]()
    slike.value.push({ url: urlFolder.default })
  }
})
</script>

<style scoped>
/* Можеш додати свој стил за overlay дугмад ако хоћеш */
</style>
