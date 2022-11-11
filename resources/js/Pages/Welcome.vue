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

  <div class="grid grid-rows-1 grid-cols-2">
    <div>
      <img style='width: 100%; height: 100%;' v-bind:src="'assets/images/background01.jpg'">
    </div>
    <div class="grid items-center justify-center">
      
      <Link v-if="$page.props.auth.user" :href="route('dashboard')"
        class="text-sm text-gray-700 dark:text-gray-500 underline">
          <button class="px-4 py-1 text-lg text-purple-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">
            Dashboard
          </button>
      </Link>

      <template v-else>
        <div v-if="canLogin" class="hidden sm:block">

          <div class="grid grid-cols-1 grid-rows-2 justify-items-center gap-7">

          <div>
            <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 underline">
              <button class="px-4 py-1 text-lg text-purple-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">
                login
              </button>
            </Link>
          </div>

          <div>
            <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
              <button class="px-4 py-1 text-lg text-purple-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">
                Register
              </button>
            </Link>
          </div>

          </div>

        </div>
      </template>

    </div>
  </div>
  





  <!-- <div v-if="canLogin" class="top-10 right-full" >
      <Link v-if="$page.props.auth.user" :href="route('dashboard')"
        class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</Link>
      <template v-else>
        <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</Link>

        <Link v-if="canRegister" :href="route('register')"
          class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</Link>
      </template>
    </div> -->

</template>

<!-- <script>
export default {
  mounted: function() { 
    if (this.source) { //is it empty
      this.image = this.source //replace placeholder
    }
   this.loading = false
  },
  data () {
    return {
      image: '/assets/images/zeepay.png',//url for placeholder image
      loading: true
    }
  },
  props: ['source'],
}
</script> -->

