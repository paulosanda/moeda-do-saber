<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen bg-white text-gray-900">
        <!-- Header -->
        <header class="bg-white/80 backdrop-blur-sm shadow-sm sticky top-0 z-50">
            <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <span class="text-3xl">🪙</span>
                    <span class="font-bold text-2xl bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            Moeda do Saber
          </span>
                </div>
                <nav class="space-x-6 font-medium">
                    <a href="#manifesto" class="text-gray-700 hover:text-blue-600 transition">Manifesto</a>
                    <a href="#valores" class="text-gray-700 hover:text-blue-600 transition">Valores</a>
                    <a href="#como-funciona" class="text-gray-700 hover:text-blue-600 transition">Como funciona</a>
                </nav>
                <div class="space-x-3">
                    <Link href="/login" class="px-5 py-2 text-blue-600 border border-blue-600 rounded-full hover:bg-blue-50 transition">
                        Entrar
                    </Link>
                </div>
            </div>
        </header>

        <!-- Conteúdo principal -->
        <main>
            <slot />
        </main>

        <!-- Footer (inalterado) -->
        <footer class="bg-gray-900 text-gray-300 py-12">
            <div class="container mx-auto px-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="flex items-center space-x-2 mb-4 md:mb-0">
                        <span class="text-3xl">🪙</span>
                        <span class="font-bold text-xl text-white">Moeda do Saber</span>
                    </div>
                    <div class="flex space-x-6">
                        <a href="#" class="hover:text-white transition">Termos</a>
                        <a href="#" class="hover:text-white transition">Privacidade</a>
                        <a href="#" class="hover:text-white transition">Contato</a>
                    </div>
                </div>
                <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm">
                    © {{ new Date().getFullYear() }} Moeda do Saber. Todos os direitos reservados.
                </div>
            </div>
        </footer>
    </div>
</template>
