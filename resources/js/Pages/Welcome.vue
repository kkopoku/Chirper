<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: String,
  phpVersion: String,
})

</script>

<template>

  <Head title="Welcome" />

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
  </div>
  
</template>


