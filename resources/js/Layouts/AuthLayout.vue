<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-purple-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <!-- Logo e título -->
            <div class="text-center">
                <Link href="/public" class="inline-flex items-center space-x-2">
                    <span class="text-4xl">🪙</span>
                    <span class="font-bold text-3xl bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            Moeda do Saber
          </span>
                </Link>
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    Acesse sua conta
                </h2>
            </div>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow-xl rounded-2xl sm:px-10 border border-gray-100">
                <!-- Slot para o formulário -->
                <slot />
            </div>
        </div>
    </div>
</template>
