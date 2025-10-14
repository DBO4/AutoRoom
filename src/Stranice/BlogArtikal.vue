<template>
    <div :class="[$vuetify.display.mobile ? 'ma-2 pa-2' : 'pa-10', 'text-white rounded-xl']" :style=" $vuetify.display.mobile ? 'border-radius: 0px; margin-left: 20px; margin-right: 20px; background-color: #272727;' : 'margin-left: 140px; margin-top: 50px; margin-right: 140px; background-color: #272727;'">
        <div :style=" $vuetify.display.mobile ? 'font-size: 3rem; font-weight: bolder;' : 'font-size: 6rem; font-weight: bolder;'" class = "align-center grid place-items-center">{{ Blog.naslov }}</div>
            
        <br></br>
            
        <div :style=" $vuetify.display.mobile ? 'font-size: 1.5rem;' : 'font-size: 3rem;'" class = "align-center grid place-items-center">
            <a>
                {{ Blog.podnaslov }}
            </a>
        </div>
        <div class="py-3">
          <a>
            Datum: {{ Blog.datum }}
          </a>
          <br></br>
          <a>
            Autor: {{ Blog.autor }}
          </a>
        </div>
        <br></br><br>
        
        <div :style=" $vuetify.display.mobile ? 'font-size: 1.3rem; color: #FEF4F4;' : 'font-size: 1.8rem; color: #FEF4F4; margin: 10px;'"  class="pa-4 rounded-xl outline" v-html="Blog.tekst"></div>


        <br></br>
        <br></br>
        <div class="blog-kont">
          <v-btn style="color: white; background-color: #db3030; font-size: 1rem;" height="50px" rounded="lg" @click="Blogg()">
            Nazad
          </v-btn>
        </div>
        
        <br></br><br></br>
        
    </div>

 
</template>


<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';

const Blog = ref({});
const props = defineProps({
  idBlog: String
});
const router = useRouter()

onMounted(async () => {
  window.scrollTo(0, 0);
  if (props.idBlog && props.idBlog.trim() !== "") {
    try {
      const module = await import(
        `../assets/TekstFajlovi/BlogArtikli/${props.idBlog}.txt?raw`
      );

      const [naslovBlogCsv, podnaslovBlogCsv, tekstBlogCsv, datumCsv, autorCsv] = module.default.split(";");

      Blog.value = {
        naslov: naslovBlogCsv,
        podnaslov: podnaslovBlogCsv,
        tekst: tekstBlogCsv,
        datum: datumCsv,
        autor: autorCsv
      };
    } catch (err) {
      console.error("Грешка при учитавању блога:", err);
    }
  }
});

function jeTelefon() {
  return window.innerWidth <= 800;
};

function Blogg(){
  router.push({name: "Blog"});
};

</script>


<style>
@media (min-width: 769px){
.slika  {
  border-radius: 8px;
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 35%;
  align-items: center;
  text-align: center;
}

.slika:hover {
  transform: scaleX(-1);
}
}
@media (max-width: 770px){
.slika  {
  border-radius: 8px;
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 85%;
  align-items: center;
  text-align: center;
}

.slika:hover {
  transform: scaleX(-1);
}
}
</style>