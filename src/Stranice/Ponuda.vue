<template>
    <div class="banner-5 py-5">
        <div v-if ="jeTelefon()" class=" mx-7 pb-10 " style="border-radius: 54px; border-width: 7px; border-color:red; background-color:  rgba(255, 255, 255, 0.35); background-size: cover; background-repeat: no-repeat; background-position: center;">   
            <div v-if="loadingOLX">
                <div class="lds-circle" style="display: flex; justify-content: center; align-items: center;">
                    <div></div>
                </div>
            </div>
            <div v-else-if="greskaOLX">
                <p>{{ error }}</p>
            </div>
            <div v-else>
                <div class="space-y-4 grid text-center place-items-center my-5">
                    <h4 class="text-white" style="font-weight: bolder; font-size: 24px;">Pogledajte našu ponudu na OLX shopu</h4>
                </div>
                <Carousel v-bind="configOLX">
                    <Slide v-for="stavka in stavkeOLX" :key="stavka.id" >
                        <div class="carousel__item border-2 border-red-800 mx-2 bg-white"id="carousel" >
                        <img :src="stavka.image" :alt="stavka.title" id="slika" style="max-height:270px; width: 500px;  border-radius: 0px;"/>  
                        <div class="px-2 py-1">
                            <div id="ime">{{ stavka.title }}</div>
                            <div id="cijena" style=" color: gold; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-weight: 600; font-size:x-large; background-color: crimson; text-align: center; ">{{ stavka.display_price }}</div>
                            <div class ="align-center justify-center d-flex pa-4">
                            <v-btn class=" submit-button rounded-2xl" style="color: white; background-color: #db3030; font-size: 1rem;" height="50px" rounded="lg" size="small" @click="naruciOLX(stavka.id)" block>Naruči na OLX</v-btn>
                            </div>
                        </div>
                        </div>
                    </Slide>
                    <template #addons>
                        <Navigation />
                    </template>
                </Carousel>
            </div>
        </div>
        <div v-else class=" px-6" style="border-radius: 54px; margin-left: 140px; margin-right: 140px; border-width: 7px; border-color:red; background-color:  rgba(255, 255, 255, 0.35); background-size: cover; background-repeat: no-repeat; background-position: center;">
            <div v-if="loadingOLX">
                <div class="lds-circle" style="display: flex; justify-content: center; align-items: center;">
                    <div></div>
                </div>
            </div>
            <div v-else-if="greskaOLX">
                <p>{{ error }}</p>
            </div>
            <div v-else >
                <div class="space-y-4 grid place-items-center my-5 text-center">
                    <h4 class="text-white" style="font-weight: bolder; font-size: 54px;">Pogledajte našu ponudu na OLX shopu</h4>
                </div>
                <Carousel v-bind="configOLX">
                    <Slide v-for="stavka in stavkeOLX" :key="stavka.id" >
                        <div class="carousel__item border-2 border-red-800 mx-2 bg-white"id="carousel" >
                        <img :src="stavka.image" :alt="stavka.title" id="slika" style="max-height:270px; width: 500px; border-radius: 0px;"/>  
                        <div class="px-2 py-1">
                            <div id="ime">{{ stavka.title }}</div>
                            <div id="cijena" style=" color: gold; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-weight: 600; font-size:x-large; background-color: crimson; text-align: center; ">{{ stavka.display_price }}</div>
                            <div class ="align-center justify-center d-flex pa-4">
                            <v-btn class=" submit-button rounded-2xl" style="color: white; background-color: #db3030; font-size: 1rem;" height="50px" rounded="lg" size="small" @click="naruciOLX(stavka.id)" block>Naruči na OLX</v-btn>
                            </div>
                        </div>
                        </div>
                    </Slide>
                    <template #addons>
                        <Navigation />
                        <br></br>
                        <Pagination />
                    </template>
                </Carousel>
            </div>
        </div>
        <br></br>
        <div class="bg-white py-5" :style=" $vuetify.display.mobile ? 'border-radius: 0px;' : 'border-radius: 54px; margin-left: 140px; margin-right: 140px;'">
            <div class="py-2" v-if="jeTelefon()">
                <div v-if="loadingKat">
                    <div class="lds-circle" style="display: flex; justify-content: center; align-items: center;">
                        <div></div>
                    </div>
                </div>
                <div v-else>
                    <div class="space-y-4 grid place-items-center mt-5">
                        <h3  style="font-weight: bolder; font-size: 34px;">Izaberite kategoriju</h3>
                        <p class="font-work_sans text-gray-600 font-semibold leading-relaxed text-center pb-6">
                            Samo dio uske selekcije kategorija naših proizvoda
                        </p>
                    </div>
                    <div class="text-center">
                        <v-sheet
                            class="mx-auto"
                            elevation="8"
                            width="90%">
                            
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
                                    height="170"
                                    width="170"
                                    @click="toggle"
                                    >
                                        <p class="text-h5 font-weight-black">{{n.ime}}</p>
                                        <div class="d-flex fill-height align-center justify-center">
                                            <img :src="n.url" :alt="n.id" id="slika"></img> 
                                        </div>
                                    </v-card>
                                </v-slide-group-item>
                            </v-slide-group>
                            <v-expand-transition>
                                <v-sheet v-if="model != null">
                                    <div v-if="model == 0" class="pa-6">
                                        <div class="d-flex fill-height align-center justify-center py-2">
                                            <h4 class="text-h7">
                                                Unesite podatke o gumama koje vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                                            </h4>
                                        </div>
                                        <v-expansion-panels class="px-2">
                                            <v-expansion-panel title="Uputstvo za dimezije guma">
                                                <v-expansion-panel-text>
                                                    <v-row no-gutters>
                                                        <v-spacer></v-spacer>
                                                        <v-col cols="12">
                                                            <div class="flex">
                                                                <v-img
                                                                height="250"
                                                                src="src\assets\Tire-Size.jpg"
                                                                ></v-img>
                                                            </div>
                                                        </v-col>    
                                                    </v-row>
                                                </v-expansion-panel-text>
                                            </v-expansion-panel>
                                            <v-expansion-panel
                                                title="Šta možete očekivati od naše ponude?"
                                                text="Možete očekivati brendove Matador, Pireli, Mischelin, Tigar Ling Long, Ćin Ćong, gume za aute, kamione, motore, tačke, kolica za bebe, informacije o načinima i vremenima isporuke bla bla bla">
                                            </v-expansion-panel>
                                        </v-expansion-panels>
                                            <div class ="align-center grid place-items-center pt-6">
                                                <v-number-input
                                                    :reverse="false"
                                                    controlVariant="default"
                                                    label="Dimenzija A"
                                                    :hideInput="false"
                                                    :inset="false"
                                                    v-model="dimA"
                                                    width="200"
                                                    :max="300"
                                                    :min="150"
                                                ></v-number-input>
                                                <v-number-input
                                                    :reverse="false"
                                                    controlVariant="default"
                                                    label="Dimenzija B"
                                                    :hideInput="false"
                                                    :inset="false"
                                                    v-model="dimB"
                                                    width="200"
                                                    :max="100"
                                                    :min="30"
                                                ></v-number-input>
                                                <v-number-input
                                                    :reverse="false"
                                                    controlVariant="default"
                                                    label="Dimenzija C"
                                                    :hideInput="false"
                                                    :inset="false"
                                                    width="200"
                                                    v-model="dimC"
                                                    :max="100"
                                                    :min="30"
                                                ></v-number-input>
                                                <v-radio-group inline label="Izaberite vrstu guma" v-model="tip" class="grid place-items-center">
                                                    <v-radio color="red" label="Zimske" value="Zimske"></v-radio>
                                                    <v-radio color="red" label="Ljetne" value="Ljetne"></v-radio>
                                                    <v-radio color="red" value="Cjelogodišnje" label="Cjelogodišnje"></v-radio>
                                                </v-radio-group>                        
                                            </div>
                                    </div>
                                    <div v-if="model == 1" class="pa-4">
                                        <div class="d-flex fill-height align-center justify-center">
                                            <h3 class="text-h6">
                                                Unesite podatke o felugama koje vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                                            </h3>
                                        </div>
                                        <div class ="align-center grid place-items-center pt-6">
                                            <v-combobox
                                                v-model="brendovi"
                                                :items="items"
                                                label="Vozila"
                                                width="250"
                                            ></v-combobox>
                                            <v-number-input
                                                :reverse="false"
                                                controlVariant="default"
                                                label="Veličina feluge"
                                                :hideInput="false"
                                                :inset="false"
                                                width="250"
                                                v-model="cola"
                                                :max="30"
                                                :min="5"
                                            ></v-number-input>
                                            <v-number-input
                                                :reverse="false"
                                                controlVariant="default"
                                                label="Centralna rupa"
                                                :hideInput="false"
                                                :inset="false"
                                                width="250"
                                                v-model="rupa"
                                                :max="10"
                                                :min="1"
                                            ></v-number-input>
                                            <v-number-input
                                                :reverse="false"
                                                controlVariant="default"
                                                label="Promjer rupa"
                                                :hideInput="false"
                                                :inset="false"
                                                width="250"
                                                v-model="promjer"
                                                :max="300"
                                                :min="1"
                                            ></v-number-input>
                                        </div>
                                    </div>
                                    <div v-if="model == 2" class="pa-4">
                                        <div class="d-flex fill-height align-center justify-center">
                                            <h3 class="text-h6">
                                                Unesite podatke o kozmetici koja vas interesuje, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                                            </h3>
                                        </div>
                                    </div>
                                    <div v-if="model == 3" class="pa-4">
                                        <div class="d-flex fill-height align-center justify-center">
                                            <h3 class="text-h6">
                                                Unesite podatke o moto opremi koja vas interesuje, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                                            </h3>
                                        </div>
                                        <div class ="align-center grid place-items-center pt-6">
                                            <v-combobox
                                                v-model="cmbMotoOprema"
                                                :items="stavkeMotoOprema"
                                                label="Moto oprema"
                                                width = "250"
                                            ></v-combobox>
                                            <v-combobox
                                                v-model="cmbVelicina"
                                                :items="stavkeVelicina"
                                                label="Veličina"
                                                width = "250"
                                            ></v-combobox>
                                        </div>
                                    </div>
                                    <div v-if="model == 4" class="pa-4">
                                        <div class="d-flex fill-height align-center justify-center">
                                            <h3 class="text-h6">
                                                Unesite podatke o ratkapnama koje vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                                            </h3>
                                        </div>
                                        <div class ="align-center grid place-items-center pt-6">
                                            <v-combobox
                                                v-model="brendovi"
                                                :items="items"
                                                label="Brendovi"
                                                width = "250"
                                            ></v-combobox>
                                            <v-number-input
                                                :reverse="false"
                                                controlVariant="default"
                                                label="Veličina ratkape"
                                                :hideInput="false"
                                                :inset="false"
                                                width="250"
                                                v-model="cola"
                                                :max="30"
                                                :min="5"
                                            ></v-number-input>
                                        </div>
                                    </div>
                                    <div v-if="model == 5" class="pa-4">
                                        <div class="d-flex fill-height align-center justify-center">
                                            <h3 class="text-h6">
                                                Unesite podatke o auto dijelovima koje vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                                            </h3>
                                        </div>
                                    </div>
                                    <div v-if="model == 6" class="pa-4">
                                        <div class="d-flex fill-height align-center justify-center">
                                            <h3 class="text-h6">
                                                Unesite podatke o uljima koje vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                                            </h3>
                                        </div>
                                    </div>
                                    <div v-if="model == 7" class="pa-4">
                                        <div class="d-flex fill-height align-center justify-center">
                                            <h3 class="text-h6">
                                                Unesite podatke o moto dijelovima ili uljima koje vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                                            </h3>
                                        </div>
                                    </div>
                                    <div v-if="model == 8" class="pa-4">
                                        <div class="d-flex fill-height align-center justify-center">
                                            <h3 class="text-h6">
                                                Unesite podatke o akumulatorima koji vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                                            </h3>
                                        </div>
                                    </div>
                                    <div v-if="model == 9" class="pa-4">
                                        <div class="d-flex fill-height align-center justify-center">
                                            <h3 class="text-h6">
                                                Upišite šta vas interesuje od Quad i Off road programa, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                                            </h3>
                                        </div>
                                    </div>
                                    <div v-if="model == 10" class="pa-4">
                                        <div class="d-flex fill-height align-center justify-center">
                                            <h3 class="text-h6">
                                                Unesite podatke o svemu ostalom što niste pronašli i što vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                                            </h3>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="px-6 ">
                                            <h3 class="text-h6" style="text-align: left;">
                                                Dodatna napomena:
                                            </h3>
                                            <v-textarea v-model="nap" label="Ovde upišite sve dodatne detalje npr. brend koji favorizujete, specifičnu dimenziju koju niste našli, gume za druga vozila (osim automobila)..." variant="outlined"></v-textarea>
                                        </div>
                                        <h3 class="text-h6 px-4">
                                            Izaberite vrstu komunikacije i popunite polja sa kontakt informacijama da Vas možemo kontaktirati
                                        </h3>
                                        <v-radio-group inline v-model = "komunikacija" class="grid place-items-center px-5" v-on:change="onemoguci()">
                                            <v-radio label="E-mail" value="email"></v-radio>
                                            <v-radio label="Poziv" value="tel"></v-radio>
                                            <v-radio label="Viber" value="viber"></v-radio>
                                            <v-radio label="WhatsApp" value="wa"></v-radio>
                                            <v-radio label="Telegram" value="telegram   "></v-radio>
                                        </v-radio-group>
                                        <div class ="grid place-items-center pt-6">
                                            <v-text-field
                                                v-model="email"
                                                :rules="[rules.required, rules.email]"
                                                label="E-mail"
                                                :disabled=!onemoguci()
                                                width = "250"
                                                outline
                                            ></v-text-field>
                                            <v-text-field
                                                v-model="brtel"
                                                label="Broj telefona"
                                                :disabled=onemoguci()
                                                width = "250"
                                            ></v-text-field>
                                        </div>
                                        <v-btn style="color: white; background-color: #520000; font-size: 1rem; text-align: center; vertical-align: middle;" rounded="lg" height="50px"
                                            class="ma-5"
                                            @click="ZatraziPonudu()" >
                                            Zatraži ponudu
                                        </v-btn>
                                    </div>
                                    
                                </v-sheet>
                            </v-expand-transition>
                        </v-sheet>

                    </div>
                </div>
            </div>
            <div class="px-8 py-2" v-else>
                <div v-if="loadingKat">
                    <div class="lds-circle" style="display: flex; justify-content: center; align-items: center;">
                        <div></div>
                    </div>
                </div>
                <div v-else>
                    <div class="space-y-4 grid place-items-center mt-5">
                        <h3 class="heading3">Izaberite kategoriju</h3>
                        <p class="font-work_sans text-gray-600 font-semibold leading-relaxed">
                        Samo dio uske selekcije blalablalf,flsflbldsmblamlablablalbalbalbalblbalblabla
                        </p>
                    </div>
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
                                        <p class="text-h5 font-weight-black">{{n.ime}}</p>
                                        <div class="d-flex fill-height align-center justify-center">
                                            <img :src="n.url" :alt="n.id" id="slika"></img> 
                                        </div>
                                    </v-card>
                                </v-slide-group-item>
                            </v-slide-group>
                            <v-expand-transition>
                                <v-sheet v-if="model != null">
                                    <div v-if="model == 0" class="pa-6">
                                        <div class="d-flex fill-height align-center justify-center">
                                            <h3 class="text-h6">
                                                Unesite podatke o gumama koje vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                                            </h3>
                                        </div>
                                        <v-expansion-panels class="px-15">
                                            <v-expansion-panel title="Uputstvo za dimezije guma">
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
                                                text="Možete očekivati brendove Matador, Pireli, Mischelin, Tigar Ling Long, Ćin Ćong, gume za aute, kamione, motore, tačke, kolica za bebe, informacije o načinima i vremenima isporuke bla bla bla">
                                            </v-expansion-panel>
                                        </v-expansion-panels>
                                            <div class ="align-center justify-center d-flex px-11 pt-6">
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
                                                ></v-number-input>                                            
                                                <v-radio-group inline label="Izaberite vrstu guma" v-model="tip">
                                                    <v-radio color="red" label="Zimske" value="Zimske"></v-radio>
                                                    <v-radio color="red" label="Ljetne" value="Ljetne"></v-radio>
                                                    <v-radio color="red" value="Cjelogodišnje" label="Cjelogodišnje"></v-radio>
                                                </v-radio-group>                        
                                            </div>
                                    </div>
                                    <div v-if="model == 1" class="pa-4">
                                        <div class="d-flex fill-height align-center justify-center">
                                            <h3 class="text-h6">
                                                Unesite podatke o felugama koje vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                                            </h3>
                                        </div>
                                        <div class ="align-center justify-center d-flex px-16">
                                            <v-combobox
                                                v-model="brendovi"
                                                :items="items"
                                                label="Vozila"
                                            ></v-combobox>
                                            <v-number-input
                                                :reverse="false"
                                                controlVariant="default"
                                                label="Veličina feluge"
                                                :hideInput="false"
                                                :inset="false"
                                                width="200"
                                                v-model="cola"
                                                class="ma-4"
                                                :max="30"
                                                :min="5"
                                            ></v-number-input>
                                            <v-number-input
                                                :reverse="false"
                                                controlVariant="default"
                                                label="Centralna rupa"
                                                :hideInput="false"
                                                :inset="false"
                                                width="200"
                                                v-model="rupa"
                                                class="ma-4"
                                                :max="10"
                                                :min="1"
                                            ></v-number-input>
                                            <v-number-input
                                                :reverse="false"
                                                controlVariant="default"
                                                label="Promjer rupa"
                                                :hideInput="false"
                                                :inset="false"
                                                width="200"
                                                v-model="promjer"
                                                class="ma-4"
                                                :max="300"
                                                :min="1"
                                            ></v-number-input>
                                        </div>
                                    </div>
                                    <div v-if="model == 2" class="pa-4">
                                        <div class="d-flex fill-height align-center justify-center">
                                            <h3 class="text-h6">
                                                Unesite podatke o kozmetici koja vas interesuje, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                                            </h3>
                                        </div>
                                    </div>
                                    <div v-if="model == 3" class="pa-4">
                                        <div class="d-flex fill-height align-center justify-center">
                                            <h3 class="text-h6">
                                                Unesite podatke o moto opremi koja vas interesuje, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                                            </h3>
                                        </div>
                                        <div class ="align-center justify-center d-flex px-14">
                                            <v-combobox
                                                v-model="cmbMotoOprema"
                                                :items="stavkeMotoOprema"
                                                label="Moto oprema"
                                                class = "ma-4"
                                            ></v-combobox>
                                            <v-combobox
                                                v-model="cmbVelicina"
                                                :items="stavkeVelicina"
                                                label="Veličina"
                                                class = "ma-4"
                                            ></v-combobox>
                                        </div>
                                    </div>
                                    <div v-if="model == 4" class="pa-4">
                                        <div class="d-flex fill-height align-center justify-center">
                                            <h3 class="text-h6">
                                                Unesite podatke o ratkapnama koje vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                                            </h3>
                                        </div>
                                        <div class ="align-center justify-center d-flex px-16">
                                            <v-combobox
                                                v-model="brendovi"
                                                :items="items"
                                                label="Brendovi"
                                            ></v-combobox>
                                            <v-number-input
                                                :reverse="false"
                                                controlVariant="default"
                                                label="Veličina ratkape"
                                                :hideInput="false"
                                                :inset="false"
                                                width="200"
                                                v-model="cola"
                                                class="ma-4"
                                                :max="30"
                                                :min="5"
                                            ></v-number-input>
                                        </div>
                                    </div>
                                    <div v-if="model == 5" class="pa-4">
                                        <div class="d-flex fill-height align-center justify-center">
                                            <h3 class="text-h6">
                                                Unesite podatke o auto dijelovima koje vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                                            </h3>
                                        </div>
                                    </div>
                                    <div v-if="model == 6" class="pa-4">
                                        <div class="d-flex fill-height align-center justify-center">
                                            <h3 class="text-h6">
                                                Unesite podatke o auto-uljima koje vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                                            </h3>
                                        </div>
                                    </div>
                                    <div v-if="model == 7" class="pa-4">
                                        <div class="d-flex fill-height align-center justify-center">
                                            <h3 class="text-h6">
                                                Unesite podatke o moto dijelovima ili uljima koje vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                                            </h3>
                                        </div>
                                    </div>
                                    <div v-if="model == 8" class="pa-4">
                                        <div class="d-flex fill-height align-center justify-center">
                                            <h3 class="text-h6">
                                                Unesite podatke o akumulatorima koji vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                                            </h3>
                                        </div>
                                    </div>
                                    <div v-if="model == 9" class="pa-4">
                                        <div class="d-flex fill-height align-center justify-center">
                                            <h3 class="text-h6">
                                                Upišite šta vas interesuje od Quad i Off road programa, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                                            </h3>
                                        </div>
                                    </div>
                                    <div v-if="model == 10" class="pa-4">
                                        <div class="d-flex fill-height align-center justify-center">
                                            <h3 class="text-h6">
                                                Unesite podatke o svemu ostalom što niste pronašli i što vas interesuju, nakon toga kliknite na dugme "Zatraži ponudu" i u najbržem mogućem roku ćete dobiti ponudu odgovarajuću vašim potrebama
                                            </h3>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <div class="px-16 ">
                                            <h3 class="text-h6 px-5" style="text-align: left;">
                                                Dodatna napomena:
                                            </h3>
                                            <v-textarea class="px-5" v-model="nap" label="Ovde upišite sve dodatne detalje npr. brend koji favorizujete, specifičnu dimenziju koju niste našli, gume za druga vozila (osim automobila)..." variant="outlined"></v-textarea>
                                        </div>
                                        <h3 class="text-h5">
                                            Izaberite vrstu komunikacije i popunite polja sa kontakt informacijama da Vas možemo kontaktirati
                                        </h3>
                                        <v-radio-group inline v-model = "komunikacija" class="d-flex justify-center align-center" v-on:change="onemoguci()">
                                            <v-radio label="E-mail" value="email"></v-radio>
                                            <v-radio label="Poziv" value="tel"></v-radio>
                                            <v-radio label="Viber" value="viber"></v-radio>
                                            <v-radio label="WhatsApp" value="wa"></v-radio>
                                            <v-radio label="Telegram" value="telegram   "></v-radio>
                                        </v-radio-group>
                                        <div class ="align-center justify-center d-flex px-12 pt-6">
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
                                                label="Broj telefona"
                                                class="px-8"
                                                :disabled=onemoguci()
                                            ></v-text-field>
                                        </div>
                                        <v-btn style="color: white; background-color: #520000; font-size: 1rem; text-align: center; vertical-align: middle;" rounded="lg" height="50px"
                                            class="ma-5"
                                            @click="ZatraziPonudu()" >
                                            Zatraži ponudu
                                        </v-btn>
                                    </div>
                                    
                                </v-sheet>
                            </v-expand-transition>
                        </v-sheet>

                    </div>
                </div>
            </div>
        </div>

    </div>

  <div v-if="jeTelefon()">
    <div class="text-center" v-if="sheet">
       

        <v-bottom-sheet v-model="sheet">
        <v-card class="text-center" height="200">
            <v-card-text>

            <br>
            <br>

            <div>
                
                <v-card
       
                    append-icon="$close"
                    class="mx-auto"
                    elevation="16"
                    max-width="90%"
                    ref="dialog"
                >
                    <template v-slot:append>
                    Zatvori
                    <v-btn icon="$close" variant="text"  @click="sheet = !sheet"></v-btn>
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
            </div>
            </v-card-text>
        </v-card>
        </v-bottom-sheet>
    </div>
    <!--<div
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
    </div>-->
  </div>
  <div v-else>
    <!--<div
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
    </div>-->
    <div class="pa-8 text-center" v-if="sheet">
       

        <v-bottom-sheet v-model="sheet">
        <v-card class="text-center" height="200">
            <v-card-text>

            <br>
            <br>

            <div>
                
                <v-card
       
                    append-icon="$close"
                    class="mx-auto"
                    elevation="16"
                    max-width="40%"
                    ref="dialog"
                >
                    <template v-slot:append>
                    Zatvori
                    <v-btn icon="$close" variant="text"  @click="sheet = !sheet"></v-btn>
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
            </div>
            </v-card-text>
        </v-card>
        </v-bottom-sheet>
    </div>
  </div>

  
</template>


<script setup>
  import { ref, onMounted, reactive } from 'vue';
  import Kategorije from '../assets/TekstFajlovi/Kategorije.csv?raw';
  import Brendovi from '../assets/TekstFajlovi/Brendovi.csv?raw';
  import MotoOprema from '../assets/TekstFajlovi/MotoOprema.csv?raw';
  import Velicine from '../assets/TekstFajlovi/Velicine.csv?raw';
  import Poslato from '../assets/Poslato.gif'
  import Akcije from '../assets/TekstFajlovi/Akcije.csv?raw';
  import axios from 'axios';
  import { Carousel, Pagination, Navigation, Slide } from 'vue3-carousel';
  import { shallowRef } from 'vue';

  const model = ref(null);
  const images = ref([]);
  const redoviKategorije = Kategorije.split('\n');
  const brKategorija = ref(redoviKategorije.length - 1);
  const rules = {
    required: value => (!!value || 'Required.'),
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
  const brtel = ref("");
  const email = ref("");
  const d = new Date();
  const items = Brendovi.split('\n');
  const brendovi = ref('Svi');
  const cola = ref();
  const rupa = ref();
  const promjer = ref();
  const cmbMotoOprema = ref("Sve");
  const cmbVelicina = ref("Sve");
  const stavkeMotoOprema = MotoOprema.split('\n');
  const stavkeVelicina = Velicine.split('\n');
  const dialog = ref(false);
  const props = defineProps({
    id: String
  });
  const OLX = ref([]);
  const configOLX = reactive({
    itemsToShow: jeTelefon() ? 1.2 : 5,
    gap: 4,
    autoplay: 1500,
    wrapAround: true,
    pauseAutoplayOnHover: true,
  });
  const stavkeOLX = ref([]);
  const sheet = shallowRef(false);
  const loadingOLX = ref(true);
  const greskaOLX = ref(false);
  const loadingKat = ref(true);

  onMounted(async () => {
    window.scrollTo(0, 0);
    const modules = import.meta.glob('../assets/Slike/Kategorije/*.*');
    let idStavke = 0,nazivKatCsv,splitUrl;
    for (const path in modules) {
        let url = await modules[path]();
        splitUrl = url.default.split("?")[0];
        nazivKatCsv = redoviKategorije[idStavke + 1].split(";")[1];
        images.value.push({ url: splitUrl, id: ++idStavke, ime: nazivKatCsv});    
    }
    loadingKat.value = false;
    if (props.id > 0){
        model.value = 10;
        const redoviAkcija = Akcije.split('\n');
        const moduliAkcija = import.meta.glob('../assets/Slike/Akcije/*.*');
        let idAkcije = 0,rbrAkcijeCsv,imeAkcijeCsv,tekstAkcijeCsv,cijenaAkcijaCsv;

        for (const pathAkcija in moduliAkcija) {
            const urlAkcija = await moduliAkcija[pathAkcija]();
            rbrAkcijeCsv = redoviAkcija[idAkcije + 1].split(";")[0];
            imeAkcijeCsv = redoviAkcija[idAkcije + 1].split(";")[1];
            tekstAkcijeCsv = redoviAkcija[idAkcije + 1].split(";")[2];
            cijenaAkcijaCsv = redoviAkcija[idAkcije + 1].split(";")[3];
            idAkcije++;
            if(rbrAkcijeCsv == (props.id)){
                nap.value = "Želim da vam pošaljem zahtjev za zvaničnu ponudu sa sektora 'Trenutna akcija' \nZanima me: " + imeAkcijeCsv + " " + 
                tekstAkcijeCsv + " sa cijenom od " + cijenaAkcijaCsv + 
                "KM.\nDodatne napomene: (dodaj još).\nUkoliko ste spremni da naručite upišite sljedeće podatke:\nIme i prezime:\nAdresa:\nIspod odaberite opciju 'Poziv' i upišite Vaš broj telefona i kliknite na dugme 'Zatraži ponudu'\nHvala!." ;
            }
            
        }  
    }
    await ucitajOLX();
  })

  function onemoguci(){
    if (komunikacija.value == "email"){
        return true;
    }
    else return false;
  }

  function ZatraziPonudu(){
    if (komunikacija.value == "email" && email.value == "") {
        alert("<Email> polje je prazno");
        return;
    }
    else if (komunikacija.value != "email" && brtel.value == ""){
        alert("Polje <Broj Telefona> je prazno");
        return;
    }

    

    if (model.value == 0){
        axios
        .get("http://localhost:3000/API/Gume.php?email=" + email.value + "&brtel=" + brtel.value + "&kanal=" + komunikacija.value + "&dimA=" + dimA.value + "&dimB=" + dimB.value + "&dimC=" + dimC.value + "&tip=" + tip.value + "&nap=" + nap.value )
        .then(function (response) {
            if (response.data.error) {
            console.log(response.data.message);
            }
        });
        dimA.value = 150;
        dimB.value = 150;
        dimC.value = 150;
        tip.value = "";
        window.scrollTo({ top: 0, behavior: 'smooth' });
        sheet.value = true;
        email.value = "";
        brtel.value = "";
        komunikacija.value = null;
        nap.value = "";
      }
    else if (model.value == 1){
        axios
        .get("http://localhost:3000/API/Feluge.php?email=" + email.value + "&brtel=" + brtel.value + "&kanal=" + komunikacija.value + "&brend=" + brendovi.value + "&vel=" + cola.value + "&rupa=" + rupa.value + "&promjer=" + promjer.value + "&nap=" + nap.value )
        .then(function (response) {
            if (response.data.error) {
            console.log(response.data.message);
            }
        });
        brendovi.value = "Svi";
        cola.value = null;
        rupa.value = null;
        promjer.value = null;
        window.scrollTo({ top: 0, behavior: 'smooth' });
        sheet.value = true;
        email.value = "";
        brtel.value = "";
        komunikacija.value = null;
        nap.value = "";
    }
    else if (model.value == 2){
        axios
        .get("http://localhost:3000/API/Kozmetika.php?email=" + email.value + "&brtel=" + brtel.value + "&kanal=" + komunikacija.value + "&nap=" + nap.value )
        .then(function (response) {
             if (response.data.error) {
            console.log(response.data.message);
            }
        });
        window.scrollTo({ top: 0, behavior: 'smooth' });
        sheet.value = true;
        email.value = "";
        brtel.value = "";
        komunikacija.value = null;
        nap.value = "";
    }
    else if (model.value == 3){
        axios
        .get("http://localhost:3000/API/MotoOprema.php?email=" + email.value + "&brtel=" + brtel.value + "&kanal=" + komunikacija.value + "&nap=" + nap.value + "&oprema=" + cmbMotoOprema.value + "&vel=" + cmbVelicina.value)
        .then(function (response) {
            if (response.data.error) {
            console.log(response.data.message);
            }
        });
        cmbMotoOprema.value = "Svi";
        cmbVelicina.value = "Svi";
        window.scrollTo({ top: 0, behavior: 'smooth' });
        sheet.value = true;
        email.value = "";
        brtel.value = "";
        komunikacija.value = null;
        nap.value = "";
    }
    else if (model.value == 4){
        axios
        .get("http://localhost:3000/API/Ratkape.php?email=" + email.value + "&brtel=" + brtel.value + "&kanal=" + komunikacija.value + "&brend=" + brendovi.value + "&vel=" + cola.value )
        .then(function (response) {
            if (response.data.error) {
            console.log(response.data.message);
            }
        });
        brendovi.value = "Svi";
        cola.value = "Svi";
        window.scrollTo({ top: 0, behavior: 'smooth' });
        sheet.value = true;
        email.value = "";
        brtel.value = "";
        komunikacija.value = null;
        nap.value = "";
    }
    else if (model.value == 5){
        axios
        .get("http://localhost:3000/API/AutoDijelovi.php?email=" + email.value + "&brtel=" + brtel.value + "&kanal=" + komunikacija.value + "&nap=" + nap.value )
        .then(function (response) {
            if (response.data.error) {
            console.log(response.data.message);
            }
        });
        window.scrollTo({ top: 0, behavior: 'smooth' });
        sheet.value = true;
        email.value = "";
        brtel.value = "";
        komunikacija.value = null;
        nap.value = "";
    }
    else if (model.value == 6){
        axios
        .get("http://localhost:3000/API/Auto-Ulja.php?email=" + email.value + "&brtel=" + brtel.value + "&kanal=" + komunikacija.value + "&nap=" + nap.value )
        .then(function (response) {
             if (response.data.error) {
            console.log(response.data.message);
            }
        });
        window.scrollTo({ top: 0, behavior: 'smooth' });
        sheet.value = true;
        email.value = "";
        brtel.value = "";
        komunikacija.value = null;
        nap.value = "";
    }
    else if (model.value == 7){
        axios
        .get("http://localhost:3000/API/MotoDijelovi.php?email=" + email.value + "&brtel=" + brtel.value + "&kanal=" + komunikacija.value + "&nap=" + nap.value )
        .then(function (response) {
             if (response.data.error) {
            console.log(response.data.message);
            }
        });
        window.scrollTo({ top: 0, behavior: 'smooth' });
        sheet.value = true;
        email.value = "";
        brtel.value = "";
        komunikacija.value = null;
        nap.value = "";
    }
    else if (model.value == 8){
        axios
        .get("http://localhost:3000/API/Akumulatori.php?email=" + email.value + "&brtel=" + brtel.value + "&kanal=" + komunikacija.value + "&nap=" + nap.value )
        .then(function (response) {
            if (response.data.error) {
            console.log(response.data.message);
            }
        });
        window.scrollTo({ top: 0, behavior: 'smooth' });
        sheet.value = true;
        email.value = "";
        brtel.value = "";
        komunikacija.value = null;
        nap.value = "";
    }
    else if (model.value == 9){
        axios
        .get("http://localhost:3000/API/QuadOffRoad.php?email=" + email.value + "&brtel=" + brtel.value + "&kanal=" + komunikacija.value + "&nap=" + nap.value )
        .then(function (response) {
           if (response.data.error) {
            console.log(response.data.message);
            }
        });
        window.scrollTo({ top: 0, behavior: 'smooth' });
        sheet.value = true;
        email.value = "";
        brtel.value = "";
        komunikacija.value = null;
        nap.value = "";
    }
    else if (model.value == 10){
        axios
        .get("http://localhost:3000/API/Ostalo.php?email=" + email.value + "&brtel=" + brtel.value + "&kanal=" + komunikacija.value + "&nap=" + nap.value )
        .then(function (response) {
             if (response.data.error) {
            console.log(response.data.message);
            }
        });
        window.scrollTo({ top: 0, behavior: 'smooth' });
        sheet.value = true;
        email.value = "";
        brtel.value = "";
        komunikacija.value = null;
        nap.value = "";
    }
    
    
  }

function jeTelefon(){
   /*if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
     return true
   } else {
     return false
   }*/
   
  if (window.innerWidth > 800) return false;
  else return true;
}

async function ucitajOLX(){
    var i;
    try{
        await axios
        .get("http://localhost:3000/API/OLX.php")
        .then(response => {
            for (const OLXdata in response.data.data) {
                i = response.data.data[OLXdata];
                stavkeOLX.value.push({image: i.image, id: i.id, title: i.title, display_price: i.display_price});
            }
        });
    } 
    catch (error){
        greskaOLX.value = "Greška: " + error;
    }
    finally {
        loadingOLX.value = false;
    }
}

function naruciOLX(id){
    window.open("https://olx.ba/artikal/" + id, '_blank');
}

window.addEventListener('resize', function() {

  const currentWidth = window.innerWidth;

  if (currentWidth > 1600) {
    configOLX.itemsToShow = jeTelefon() ? 1.2 : 5;
  } 
  else if (currentWidth <= 1600 && currentWidth > 1400) {
    configOLX.itemsToShow = jeTelefon() ? 1.2 : 4;
  } 
  else if (currentWidth <= 1400 && currentWidth > 1200) {
    configOLX.itemsToShow = jeTelefon() ? 1.2 : 3.5;
  } 
  else if (currentWidth <= 1200 && currentWidth > 1000) {
    configOLX.itemsToShow = jeTelefon() ? 1.2 : 3;
  } 
  else if (currentWidth <= 1000 && currentWidth > 800) {
    configOLX.itemsToShow = jeTelefon() ? 1.2 : 2;
  } 
  else if (currentWidth <= 800 && currentWidth > 650) {
    configOLX.itemsToShow = jeTelefon() ? 1.2 : 1.5;
  } 
  else if (currentWidth <= 650 && currentWidth > 450) {
    configOLX.itemsToShow = jeTelefon() ? 1.2 : 1;
  } 
});

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

.lds-circle,
.lds-circle div {
  box-sizing: border-box;
}
.lds-circle {
  display: inline-block;
  transform: translateZ(1px);
}
.lds-circle > div {
  display: inline-block;
  width: 64px;
  height: 64px;
  margin: 8px;
  background: #ff0202;
  border-radius: 50%;
  animation: lds-circle 2.4s cubic-bezier(0, 0.2, 0.8, 1) infinite;
}
@keyframes lds-circle {
  0%, 100% {
    animation-timing-function: cubic-bezier(0.5, 0, 1, 0.5);
  }
  0% {
    transform: rotateY(0deg);
  }
  50% {
    transform: rotateY(1800deg);
    animation-timing-function: cubic-bezier(0, 0.5, 0.5, 1);
  }
  100% {
    transform: rotateY(3600deg);
  }
}


</style>