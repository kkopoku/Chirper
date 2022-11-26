<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/inertia-vue3';
import Chirp from '@/Components/Chirp.vue';
 
const props = defineProps(['chirps', 'likes']);

const form = useForm({
    message: '',
});


function log(){
    console.log(props.likes);
}

const likes = props.likes;

</script>

<template>
    <Head title="Chirps" />
 
    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('chirps.store'), { onSuccess: () => form.reset() })">
                <textarea
                    v-model="form.message"
                    placeholder="What's on your mind?"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                ></textarea>
                <InputError :message="form.errors.message" class="mt-2" />
                <PrimaryButton class="mt-4">Chirp</PrimaryButton>
            </form>
            <div class="pt-5">
                <button class="bg-red-900 px-6 rounded-xl h-12" @click=" log "> test </button>
            </div>
            <div class="mt-6 bg-slate-100 shadow-sm rounded-lg divide-y ">
                <Chirp
                    v-for="chirp in props.chirps"
                    :key="chirp.id"
                    :chirp="chirp"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>