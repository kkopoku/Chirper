<script setup>
import ApplicationLogoVue from '@/Components/ApplicationLogo.vue';
import HamburgerIconVue from '@/Components/HamburgerIcon.vue'
import StarIconVue from '@/Components/Star.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: String,
  phpVersion: String,
})

// const menus = ["Home", "FAQs", "Contact"];
const menus = [
  {"id": "Home", "url": "#"},
  {"id": "FAQs", "url": "/unavailable"},
  {"id": "Contact", "url": "/unavailable"},
]
const sidebarOpen = ref(false);

</script>

<template>
  <Head title="Welcome" />
  <div class="w-full min-h-screen font-sans text-gray-900 bg-gradient-to-br from-transparent to-blue-300"
       :class="sidebarOpen ? 'overflow-hidden h-screen' : ''">

    <!-- top navigation -->
    <nav class="flex justify-between items-center py-8 px-6 mx-auto max-w-screen-xl md:px-12 lg:px-16 xl:px-24">
      <a href="#" class="text-3xl md:text-4xl font-bold tracking-wide">
        Chir<span class="text-cyan-700">per</span>
        <span><ApplicationLogoVue class="h-5 absolute top-5" /></span>
      </a>
      <div class="inset-0 transition-all bg-white/70 backdrop-blur-xl z-20 md:static md:bg-transparent md:flex items-center justify-center space-y-8 md:space-y-0 md:space-x-8 flex-col md:flex-row lg:space-x-14"
           :class="sidebarOpen ? 'fixed flex' : 'hidden'">
        <ul class="flex flex-col md:flex-row items-center space-y-6 md:space-y-0 md:space-x-6 lg:md:-x-8">
          <li class="text-lg md:text-base lg:text-lg font-bold group" :class="{ 'text-green-500': activeMenu === menu }" v-for="menu in menus" :key="menu">
            <Link :href=" menu.url " class="bg-transparent"> {{ menu.id }} </Link>
            <div
              class="h-0.5 bg-green-700 scale-x-0 group-hover:scale-100 transition-transform origin-left rounded-full duration-300 ease-out"
            />
          </li>
        </ul>
        <Link :href="route('dashboard')" v-if="$page.props.auth.user" class="bg-transparent ">
          <button class="flex justify-center items-center h-14 px-7 font-bold text-white bg-green-500 rounded-xl hover:shadow-2xl transition-shadow duration-300 whitespace-nowrap">
              Dashboard
          </button>
        </Link>
        <template v-else>
          <Link :href="route('login')"  class="bg-transparent">
            <button class="flex justify-center items-center h-14 px-7 font-bold text-white bg-green-500 rounded-xl hover:shadow-2xl transition-shadow duration-300 whitespace-nowrap">
                Login
            </button>
          </Link>
        </template> 
      </div>
      <button @click="sidebarOpen = !sidebarOpen" class="block md:hidden relative z-30">
        <HamburgerIconVue class="w-8 h-8 fill-current text-gray-900" />
      </button>
    </nav>

    <!-- body -->
    <div class="flex flex-wrap-reverse gap-y-24 justify-between py-12 px-6 mx-auto max-w-screen-xl sm:px-8 md:px-12 lg:px-16 xl:px-24">

      <div class="relative z-10 md:w-1/2 w-full">
        <img class="absolute top-0 right-0 md:-top-4 md:-right-8 w-24 h-auto" src="/img/leaf.png" alt=""/>
        <span class="flex items-center px-1 text-xl text-green">
          <span class="font-medium">100% Safe Environment</span>
          <img class="w-auto h-8" src="/img/vegetable.png" alt="" />
        </span>
        <h1 class="pt-4 text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tighter leading-tight whitespace-nowrap">
          Healthy Space <br /> is your only <br />
          <span class="whitespace-nowrap text-green"> unfair advantage </span>
        </h1>
        <p class="pt-8 sm:text-lg max-w-md font-normal text-gray-600 leading-relaxed">
          Choose a healthy space with Chirper to vent freely whatever that is on your mind 
        </p>
        <p v-if="$page.props.auth.user" class="pt-4 lg:text-lg md:text-sm sm:text-sm text-cyan-700 font-bold tracking-tighter leading-tight whitespace-nowrap" >
          YOU'RE LOGGED IN, HOPE YOU'RE HAVING A GREAT TIME
        </p>
        <template v-else>
          <div class="flex pt-8 space-x-4 sm:space-x-6">
            <Link :href="route('login')" class="bg-transparent ">
              <button class="flex justify-center items-center w-full sm:w-auto h-14 px-8 bg-green-500 font-bold text-white rounded-xl whitespace-nowrap hover:shadow-2xl transition-shadow duration-300">
                Login
              </button>
            </Link>
            <Link :href="route('register')" class="bg-transparent ">
              <button class="flex justify-center items-center w-full sm:w-auto h-14 px-8 font-bold text-gray-900 border border-gray-900 rounded-xl whitespace-nowrap hover:shadow-xl transition-shadow duration-300">
                Register Here
              </button>
            </Link>  
          </div>
        </template>
        <div class="flex pt-20">
          <StarIconVue class="w-24" />
          <div class="pt-5 pl-3">
            <div class="text-xl font-bold leading-relaxed">Best Microblogging App</div>
            <div class="text-gray-500 leading-relaxed">
              Great Ideas Begin Here
            </div>
            <div class="font-bold text-cyan-700 leading-relaxed">80M+ users worldwide</div>
          </div>
        </div>
      </div>

      
      <div class="relative md:w-1/2 w-full flex flex-col justify-between">
        <img class="pl-7 py-28 w-96 lg:w-full drop-shadow-2xl self-center lg:self-end" src="../../assets/images/picture01.jpg" alt=""/>
          <div class="absolute right-0 lg:-right-6 top-0 lg:top-20 flex flex-col py-5 px-7 rounded-2xl shadow-xl bg-white/60 backdrop-blur-xl hover:-translate-y-2 hover:shadow-2xl transition-all duration-800">
            <div class="pt-3 font-bold">Happy customers</div>
            <div class="flex items-center text-gray-600 leading-relaxed">
              <StarIconVue class="w-5 h-5" />
              <span class="pl-1">4.9 (+2.5M Ratings)</span>
            </div>
          </div>
          <div class="absolute left-0 bottom-0 md:bottom-32 lg:bottom-20 bg-white/60 rounded-2xl shadow-2xl backdrop-blur-xl hover:-translate-y-2 hover:shadow-2xl transition-all duration-800">
            <div class="pr-5 pl-4 py-5">
              <div class="font-bold">Fast delivery</div>
              <div class="text-gray-600 leading-relaxed">30 mins delivery 🚀</div>
            </div>
          </div>
      </div>

    </div>

  </div>
</template>

<!-- <Head title="Welcome" />

<div class="grid grid-cols-2">

  <div>
    <img style='width: 100%; height: 100%;' v-bind:src="'assets/images/background01.jpg'">
  </div>
  
  <div class="grid grid-rows-2 items-center justify-center align-middle">

    <div class="text-4xl font-bold">
      <img style="width: 10%;" v-bind:src="'https://cdn-icons-png.flaticon.com/512/616/616438.png'">
      Welcome To Chirper
    </div>
    
    <div>
      <Link v-if="$page.props.auth.user" :href="route('dashboard')">
        <button class="px-4 py-1 text-lg text-purple-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">
          Go Back To Dashboard
        </button>
      </Link>
    

      <template v-else>
        <div v-if="canLogin" class="hidden sm:block">

          <div class="grid grid-cols-1 grid-rows-2 gap-7">
            <div>
              <button class="px-4 py-1 text-lg text-purple-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">
                <Link :href="route('login')">
                  Login Hereeeeeeeee !
                </Link>
              </button>
            </div>

            <div>
              <button class="px-4 py-1 text-lg text-purple-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">
                <Link v-if="canRegister" :href="route('register')">
                  Click Me To Register !
                </Link>
              </button>
            </div>
          </div>

        </div>
      </template>
    </div>

  </div>
</div> -->

