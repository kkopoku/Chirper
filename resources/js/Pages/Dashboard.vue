<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ChirpVue  from '@/Components/Chirp.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-6 flex flex-row">
            <div class="">
                <img class="p-1 w-28 h-28 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" src="../../assets/images/picture02.jpg" alt="Bordered avatar">
            </div>   
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-4 md:px-6">
                <div class="bg-white/50 sm:rounded-lg">
                    <div class="p-6">
                        Hey {{ $page.props.auth.user.name }} You're Succesfully logged in!
                    </div>
                </div>
            </div>
            <div>

            </div>
        </div>
        <div class="py-5 flex flex-col px-[8.05%]">
            <div class="mt-6 bg-slate-100 shadow-sm rounded-lg divide-y ">
                <Chirp
                    v-for="chirp in chirps"
                    :key="chirp.id"
                    :chirp="chirp"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
