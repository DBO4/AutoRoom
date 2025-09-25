<template>
    <div :class="[$vuetify.display.mobile ? 'ma-5 pa-5' : 'ma-10 pa-10', 'text-white rounded-xl']" style="background-image: url('src/assets/tragovi-30.png'); background-blend-mode:exclusion; background-size: cover;">
        <div :style=" $vuetify.display.mobile ? 'font-size: 3rem;' : 'font-size: 6rem;'" class = "align-center grid place-items-center">Blog artikli</div>
            
        <br></br>
        <div v-if="loadingBlog">
            <div class="lds-circle" style="display: flex; justify-content: center; align-items: center;">
                <div></div>
            </div>
        </div>
        <div v-else>
            <div v-for="stakva in blog" :key="stakva.idBlog"
                    class="card mb-5 flex flex-col md:flex-row items-center justify-between">
                
                <!-- Текст -->
                <div class="space-y-5 py-2 px-8 w-full md:w-1/2">
                    <h4 class="project-title">{{ stakva.naslov }}</h4>
                    <p class="font-work_sans pr-0 md:pr-12">{{ stakva.tekst }}</p>
                    <button class="submit-button-blog text-sky-800 font-bold text-2xl tracking-wider"  
                            @click="idiBlogArtikal(stakva.putanja)">
                        {{stakva.dugme}}
                    </button>
                </div>

                <!-- Слика -->
                <div class="card-image w-full md:w-1/2 mt-4 md:mt-0">
                    <img class="object-cover w-full h-72 md:h-96" :src="stakva.url"/>
                </div>
            </div>
        </div>


        

    </div>

 
</template>



<script setup async>
import {ref, onMounted} from 'vue';
import { Carousel, Pagination, Navigation, Slide } from 'vue3-carousel';
import BlogCsv from '../assets/TekstFajlovi/Blog.csv?raw';
const counter = ref("");
const slikeKlijent = ref([]);
const redoviBlog = BlogCsv.split('\n');
const loadingBlog = ref(true);

  function jeTelefon(){
   /*if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
     return true
   } else {
     return false
   }*/
   
  if (window.innerWidth > 800) return false;
  else return true;
  }


const blog = ref([]);
const blogFolder = import.meta.glob('../assets/TekstFajlovi/BlogArtikli/*.*');


onMounted(async() =>{
    window.scrollTo(0, 0);
    await blogArtikli();
})

async function blogArtikli(){
    const blogSlike = import.meta.glob('../assets/Slike/Blog/*.*');
    let idBlog = 0,rbrBlogCsv,naslovBlogCsv,tekstBlogCsv,dugmeBlogCsv,naslovnaBlogCsv,putanjaBlogCsv;
    
    for (const pathBlog in blogSlike) {
        const urlBlog = await blogSlike[pathBlog]();
        rbrBlogCsv = redoviBlog[idBlog + 1].split(";")[0];
        naslovBlogCsv = redoviBlog[idBlog + 1].split(";")[1];
        tekstBlogCsv = redoviBlog[idBlog + 1].split(";")[2];
        dugmeBlogCsv = redoviBlog[idBlog + 1].split(";")[3];
        putanjaBlogCsv = redoviBlog[idBlog + 1].split(";")[4];
        naslovnaBlogCsv = redoviBlog[idBlog + 1].split(";")[5];
        if (rbrBlogCsv == (idBlog + 1)){
           
            blog.value.push({ url: urlBlog.default, id: idBlog, naslov: naslovBlogCsv, tekst: tekstBlogCsv, dugme: dugmeBlogCsv, putanja: putanjaBlogCsv});
           
            ++idBlog;
        }
        else{console.log("rbrBlogCsv = " + rbrBlogCsv + "idBlog = " + idBlog);
        }
    }
    loadingBlog.value = false;
}

</script>


<style>

</style>