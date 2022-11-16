<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
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

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white/50 overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        Hey {{ $page.props.auth.user.name }} You're Succesfully logged in!
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
