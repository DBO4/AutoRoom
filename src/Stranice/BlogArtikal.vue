<template>
    <div :class="[$vuetify.display.mobile ? 'ma-5 pa-5' : 'ma-10 pa-10', 'text-white rounded-xl']" style="background-image: url('src/assets/tragovi-30.png'); background-blend-mode:exclusion; background-size: cover;">
        <div :style=" $vuetify.display.mobile ? 'font-size: 3rem;' : 'font-size: 6rem;'" class = "align-center grid place-items-center">{{ Blog.naslov }}</div>
            
        <br></br>
            
        <div :style=" $vuetify.display.mobile ? 'font-size: 1.5rem;' : 'font-size: 3rem;'" class = "align-center grid place-items-center">
            <a>
                {{ Blog.podnaslov }}
            </a>
        </div>
        <br></br><br>
        
        <div style="font-size: 1.3rem" class="pa-4 rounded-xl outline" v-html="Blog.tekst"></div>


        <br></br>
        <br></br>
        <br></br><br></br>

    </div>

 
</template>


<script setup>
import { ref, onMounted } from 'vue';

const Blog = ref({});
const props = defineProps({
  idBlog: String
});

onMounted(async () => {
  window.scrollTo(0, 0);
  if (props.idBlog && props.idBlog.trim() !== "") {
    try {
      const module = await import(
        `../assets/TekstFajlovi/BlogArtikli/${props.idBlog}.txt?raw`
      );

      const [naslovBlogCsv, podnaslovBlogCsv, tekstBlogCsv] = module.default.split(";");

      Blog.value = {
        naslov: naslovBlogCsv,
        podnaslov: podnaslovBlogCsv,
        tekst: tekstBlogCsv
      };
    } catch (err) {
      console.error("Грешка при учитавању блога:", err);
    }
  }
});

function jeTelefon() {
  return window.innerWidth <= 800;
}
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