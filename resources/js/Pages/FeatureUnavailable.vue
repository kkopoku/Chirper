<script setup>
import GuestLayoutVue from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import ApplicationLogoVue from '@/Components/ApplicationLogo.vue';
import HamburgerIconVue from '@/Components/HamburgerIcon.vue'
import StarIconVue from '@/Components/Star.vue'
import { ref } from 'vue';


defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: String,
  phpVersion: String,
})

const menus = [
  {"id": "Home", "url": "#"},
  {"id": "FAQs", "url": "/unavailable"},
  {"id": "Contact", "url": "/unavailable"},
]
const sidebarOpen = ref(false);

</script>

<template>

    <Head title="FeatureUnavailable" />
    <div class="w-full min-h-screen font-sans text-gray-900 bg-gradient-to-br from-white to-blue-300">

        <!-- top navigation -->
        <nav class="flex justify-between items-center py-8 px-6 mx-auto max-w-screen-xl md:px-12 lg:px-16 xl:px-24">
            <a :href="route('index')" class="text-3xl md:text-4xl font-bold tracking-wide">
                Chir<span class="text-cyan-700">per</span>
                <span><ApplicationLogoVue class="h-5 absolute top-5" /></span>
            </a>
        </nav>
        <div class="flex flex-wrap-reverse gap-y-24 justify-between py-12 px-6 mx-auto max-w-screen-xl sm:px-8 md:px-12 lg:px-16 xl:px-24">
            <div class="flex">
                This is page is unavailable, Kindly click on the logo to the Welcome page.
            </div>

        </div>
    </div>    
</template>