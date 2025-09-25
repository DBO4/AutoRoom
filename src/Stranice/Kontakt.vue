<template>
    
   <div :class="[$vuetify.display.mobile ? 'pa-2 ma-2 rounded-xl' : 'pa-8 ma-6 rounded-xl']" style="background-image: url('src/assets/tragovi.jpg'); background-size: cover;">
    <div :style=" $vuetify.display.mobile ? 'font-size: 2rem;' : 'font-size: 4rem;'" class = "align-center text-center grid place-items-center">Kontaktirajte nas</div>
    <div class="banner-8 md:flex  grid place-items-center md:justify-evenly py-4" id="about">
        <iframe class = "border-4 border-gray-800" :height=kartaVisina :width=kartaSirina
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2368.6908003100257!2d16.708772736804814!3d44.96833191684829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4760cd000b87ae13%3A0x8bf179443b6b3452!2sAUTO%20ROOM!5e0!3m2!1ssr!2sba!4v1747567120361!5m2!1ssr!2sba" 
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>

        <div class="space-y-5 py-8 md:py-16 md:px-20">
            <h4 class="project-title item " style="color: white;">Kontakt informacije</h4>
            <p class="font-work_sans text-white" style="color: white;">
                Telefon: +38765867682
                <br />
                e-mail: 
                <p class="text-white">Adresa:jofsakjosak. 876+4+dsa</p>
                <p class="text-white">JIB: JWjdosajdaosdj
                <br/>
                fax: kdosadowkj
                <br/>
                Рadno vrijeme: <br/>
                pon: 08-16 <br/>
                uto: 08-16 <br/>
                sri: 08-16 <br/>
                čet: 08-16 <br/>
                pet: 08-16 <br/>
                sub: 08-14 <br/>
                pet: ne radimo <br/></p>
            </p>
            
            <v-btn class="text-sky-800 font-bold text-2xl tracking-wider" style="color: red; text-decoration: underline;">
            O nama
            </v-btn>
        </div>
    </div>
    <h3 class="text-h6 px-4 pt-10 text-center" >
        Izaberite vrstu komunikacije i popunite polja sa kontakt informacijama da Vas možemo kontaktirati
    </h3>
   
     <div class ="grid place-items-center pt-6">
         <v-radio-group inline v-model = "komunikacija" class="grid place-items-center px-5 bg-white mx-5" style="width: fit-content; height: fit-content;" v-on:change="onemoguci()">
            <v-radio label="E-mail" value="email"></v-radio>
            <v-radio label="Poziv" value="tel"></v-radio>
            <v-radio label="Viber" value="viber"></v-radio>
            <v-radio label="WhatsApp" value="wa"></v-radio>
            <v-radio label="Telegram" value="telegram   "></v-radio>
        </v-radio-group>
        <v-text-field
            v-model="email"
            :rules="[rules.required, rules.email]"
            label="E-mail"
            :disabled=!onemoguci()
            :width = "$vuetify.display.mobile ? 290 : 750"
                outline
                variant="solo"
        ></v-text-field>
        <v-text-field
            v-model="brtel"
            label="Broj telefona"
            :disabled=onemoguci()
            :width = "$vuetify.display.mobile ? 290 : 750"
            variant="solo"
        ></v-text-field>
    </div>

    <div class="px-6 ">
        <h3 class="text-h6 text-black px-5" style="text-align: left; font-size: 1.6rem; background-color: white; width: fit-content;">
            Vaša poruka:
        </h3>
        <v-textarea v-model="nap" label="Ovde upišite sve šta ste imali na umu da nas pitate..." variant="solo"></v-textarea>
    </div>
    <div class="grid place-items-center">
        <v-btn variant="flat" 
            rounded="xl" 
            size="x-large"
            class="ma-5 bg-red-300 hover:bg-red-600" 
            @click="posaljiMejl()"
            >
            Pošalji mejl
        </v-btn>
    </div>
   </div>


    <div v-if="jeTelefon()">
    <div
        class="ponuda pt-20"
        v-if="dialog"
    >
        <v-fade-transition hide-on-leave>
        <v-card
        
            append-icon="$close"
            class="mx-auto"
            elevation="16"
            max-width="60%"
            ref="dialog"
        >
            <template v-slot:append>
            Zatvori
            <v-btn icon="$close" variant="text" @click="ZatvoriAkciju()"></v-btn>
            </template>

            <div class="text-center  grid place-items-center">
            <h2  style="font-size: 2rem;">
                Vaša ponuda je zaprimljena, očekujte odgovor uskoro!
            </h2>
            <v-img
                src="src/assets/poslato.gif"
                class="imaggg"
                ></v-img>
            </div>       
        </v-card>
        </v-fade-transition>
    </div>
    </div>
    <div v-else>
    <div
        class="ponuda"
        v-if="dialog"
    >
        <v-fade-transition hide-on-leave>
        <v-card
        
            append-icon="$close"
            class="mx-auto"
            elevation="16"
            max-width="40%"
            ref="dialog"
        >
            <template v-slot:append>
            Zatvori
            <v-btn icon="$close" variant="text" @click="ZatvoriAkciju()"></v-btn>
            </template>

            <div class="text-center  grid place-items-center">
            <h2  style="font-size: 3rem;">
                Vaša ponuda je zaprimljena, očekujte odgovor uskoro!
            </h2>
            <v-img
                src="src/assets/poslato.gif"
                class="imaggg"
                ></v-img>
            </div>       
        </v-card>
        </v-fade-transition>
    </div>
    </div>

</template>

<script setup>
    import {ref, onMounted} from 'vue';
    import axios from 'axios';
    const nap = ref("");
    const brtel = ref("");
    const email = ref("");
    const kartaSirina = ref(jeTelefon() ? 350 : 500);
    const kartaVisina = ref(jeTelefon() ? 400 : 500);
    const dialog = ref(false);
    const rules = {
        required: value => (!!value || 'Required.'),
        counter: value => value.length <= 20 || 'Max 20 characters',
        email: value => {
        const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        return pattern.test(value) || 'Nevažeći e-mail.'
        },
    }
    const komunikacija = ref("email");

    function onemoguci(){
        if (komunikacija.value == "email"){
            return true;
        }
        else return false;
    }

    onMounted(async() =>{
        window.scrollTo(0, 0);
    })


     function jeTelefon(){
        /*if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            return true
        } else {
            return false
        }*/
        
        if (window.innerWidth > 800) return false;
        else return true;
    }

    function posaljiMejl(){
        if (komunikacija.value == "email" && email.value == "") {
            alert("<Email> polje je prazno");
            return;
        }
        else if (komunikacija.value != "email" && brtel.value == ""){
            alert("Polje <Broj Telefona> je prazno");
            return;
        }

        axios
        .get("http://localhost:3000/API/Kontakt.php?email=" + email.value + "&brtel=" + brtel.value + "&kanal=" + komunikacija.value + "&nap=" + nap.value )
        .then(function (response) {
            console.log(response.data);
            if (response.data.error) {
            this.errorMsg = response.data.message;
            } else {
            this.projects = response.data;
            }
        });
        window.scrollTo({ top: 0, behavior: 'smooth' });
        dialog.value = true;
        email.value = "";
        brtel.value = "";
        komunikacija.value = null;
        nap.value = "";
    }

    function ZatvoriAkciju(){
        dialog.value = false;
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
.ponuda {
  position:absolute;
  left:0;
  right:0;
  bottom:0;
  top: 0;
  background-color: hsla(0, 0%, 0%, 0.8);
  width: 100%; 
  height: 100%; 
  overflow:visible;
}
.imaggg {
  background-color: transparent;
   width: 50%;
}
</style>
