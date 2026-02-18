<template>
    <div>
        <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Visão Geral</h1>

        <!-- Cards de estatísticas -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card de Cursos -->
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900 dark:to-blue-800 p-6 rounded-lg shadow">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-500 dark:bg-blue-600 rounded-full text-white mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Cursos em andamento</p>
                        <p class="text-3xl font-bold text-gray-800 dark:text-white">{{ stats.cursos }}</p>
                    </div>
                </div>
            </div>

            <!-- Card de Conquistas -->
            <div class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900 dark:to-green-800 p-6 rounded-lg shadow">
                <div class="flex items-center">
                    <div class="p-3 bg-green-500 dark:bg-green-600 rounded-full text-white mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Conquistas</p>
                        <p class="text-3xl font-bold text-gray-800 dark:text-white">{{ stats.conquistas }}</p>
                    </div>
                </div>
            </div>

            <!-- Card de Pontos -->
            <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 dark:from-yellow-900 dark:to-yellow-800 p-6 rounded-lg shadow">
                <div class="flex items-center">
                    <div class="p-3 bg-yellow-500 dark:bg-yellow-600 rounded-full text-white mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Moedas do Saber</p>
                        <p class="text-3xl font-bold text-gray-800 dark:text-white">{{ stats.pontos }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Conteúdo adicional (exemplo) -->
        <div class="mt-8">
            <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-white">Atividades recentes</h2>
            <p class="text-gray-600 dark:text-gray-400">Nenhuma atividade recente.</p>
        </div>
    </div>
</template>

<script setup lang="ts">
import KnowlodgeCoinDashboardLayout from '@/Layouts/KnowlodgeCoinDashboardLayout.vue';

defineOptions({ layout: KnowlodgeCoinDashboardLayout });

defineProps({
    stats: Object,
});
</script>
