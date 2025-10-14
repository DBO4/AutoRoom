    <!-- NotFoundPage.vue -->
    <template>
      <div>
       <div class=" align-center justify-center place-items-center d-flex px-4">
        <div class=" pt-8">
          <h2 class="text-white md:text-6xl text-2xl font-Eczar mb-0 font-bold">
            404 - Stranica nije Pronađena
          </h2>
        </div>
       </div>
        <div class="blog-kont">
            <v-btn class=" submit-button" style="color: white; background-color: #db3030; font-size: 1rem; margin-top: 5%;" height="50px" rounded="lg" @click="Pocetna()">
                Nazad na početnu
            </v-btn>
        </div>
      </div>
    </template>

    <script setup>
    import { useRouter } from 'vue-router';

    const router = useRouter();

    function Pocetna(){
        router.push({ path: '/'});
    }
    </script>