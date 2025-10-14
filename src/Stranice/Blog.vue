<template>
  <div
    :class="[$vuetify.display.mobile ? 'ma-2 pa-2' : '', 'text-white rounded-xl']"
    :style="
      $vuetify.display.mobile
        ? 'border-radius: 0px; margin-left: 20px; margin-right: 20px; background-image: url(src/assets/tragovi-30.png); background-blend-mode:exclusion; background-size: cover;'
        : 'background-image: url(src/assets/tragovi-30.png); background-blend-mode:exclusion; background-size: cover; margin-left: 140px; margin-right: 140px; margin-top: 50px; padding: 40px;'
    "
  >
    <div
      :style="
        $vuetify.display.mobile
          ? 'font-size: 3rem; font-weight: bolder;'
          : 'font-size: 6rem; font-weight: bolder;'
      "
      class="align-center grid place-items-center"
    >
      Blog artikli
    </div>

    <br />

    <div v-if="loadingBlog">
      <div
        class="lds-circle"
        style="display: flex; justify-content: center; align-items: center;"
      >
        <div></div>
      </div>
    </div>

    <div v-else>
      <div
        v-for="stakva in prikazaniBlogovi"
        :key="stakva.idBlog"
        class="card mb-5 flex flex-col md:flex-row items-center justify-between"
      >
        <!-- Текст -->
        <div class="space-y-5 py-2 px-8 w-full md:w-1/2">
          <div class="pb-5" style="font-weight: bolder; font-size: 44px;">
            {{ stakva.naslov }}
          </div>
          <p class="font-work_sans pb-5 md:pr-12">{{ stakva.tekst }}</p>
          <v-btn
            class="submit-button-blog font-bold text-2xl tracking-wider"
            height="50"
            rounded="lg"
            color="#CFD8DC"
            @click="idiBlogArtikal(stakva.putanja)"
          >
            {{ stakva.dugme }}
          </v-btn>
        </div>

        <!-- Слика -->
        <div class="card-image w-full md:w-1/2 ma-2 md:mt-0">
          <img class="object-cover w-full h-72 md:h-96" :src="stakva.url" />
        </div>
      </div>

      <!-- ✅ Vuetify пагинација -->
      <div class="d-flex justify-center mt-10">
        <v-pagination
          v-model="trenutnaStranica"
          :length="ukupnoStranica"
          color="#CFD8DC"
          total-visible="5"
        ></v-pagination>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import BlogCsv from '../assets/TekstFajlovi/Blog.csv?raw';
import { useRouter } from 'vue-router';

const blog = ref([]);
const loadingBlog = ref(true);
const router = useRouter();

const redoviBlog = BlogCsv.split('\n');
const blogFolder = import.meta.glob('../assets/TekstFajlovi/BlogArtikli/*.*');

// --- Пагинација ---
const trenutnaStranica = ref(1)
const blogovaPoStranici = 5 // број блогова по страни

// израчунавање колико има страница
const ukupnoStranica = computed(() =>
  Math.ceil(blog.value.length / blogovaPoStranici)
)

// приказани блогови у зависности од странице
const prikazaniBlogovi = computed(() => {
  const start = (trenutnaStranica.value - 1) * blogovaPoStranici
  const end = start + blogovaPoStranici
  return blog.value.slice(start, end)
})

onMounted(async () => {
  window.scrollTo(0, 0)
  await blogArtikli()
})

async function blogArtikli() {
  const blogSlike = import.meta.glob('../assets/Slike/Blog/*.*')
  let idBlog = 0
  for (const pathBlog in blogSlike) {
    const urlBlog = await blogSlike[pathBlog]()
    const red = redoviBlog[idBlog + 1]?.split(';')
    if (!red) continue
    const [rbr, naslov, tekst, dugme, putanja, naslovna] = red

    if (rbr == idBlog + 1) {
      blog.value.push({
        url: urlBlog.default,
        idBlog: idBlog,
        naslov,
        tekst,
        dugme,
        putanja
      })
      ++idBlog
    }
  }
  loadingBlog.value = false
}

function idiBlogArtikal(putanja) {
  router.push({ name: 'BlogArtikal', params: { idBlog: putanja } })
}
</script>
