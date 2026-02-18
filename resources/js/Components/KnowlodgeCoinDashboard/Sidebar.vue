<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    collapsed: Boolean
});

const emit = defineEmits(['toggle']);
</script>

<template>
    <aside
        class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 mr-6 transition-all duration-300"
        :class="collapsed ? 'w-20' : 'w-64'"
    >
        <!-- Botão para recolher/expandir -->
        <div class="flex justify-end mb-4">
            <button
                @click="emit('toggle')"
                class="p-1 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none"
                :title="collapsed ? 'Expandir menu' : 'Recolher menu'"
            >
                <!-- Ícone de setas duplas para esquerda (expandido) -->
                <svg v-if="!collapsed" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                </svg>
                <!-- Ícone de setas duplas para direita (recolhido) -->
                <svg v-else class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <!-- Links de navegação com ícones (igual ao seu código, apenas remova referências a onToggle) -->
        <nav class="space-y-2">
            <!-- Início -->
            <Link
                href="/dashboard"
                class="flex items-center px-4 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700"
                :class="{
                    'bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white': $page.url === '/knowledge-dashboard',
                    'justify-center': collapsed,
                    'text-gray-700 dark:text-gray-300': $page.url !== '/dashboard'
                }"
                :title="collapsed ? 'Início' : ''"
            >
                <svg class="w-5 h-5 flex-shrink-0" :class="{ 'text-gray-700 dark:text-gray-300': $page.url !== '/knowledge-dashboard' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span v-if="!collapsed" class="ml-3" :class="{ 'text-gray-900 dark:text-white': $page.url === '/knowledge-dashboard', 'text-gray-700 dark:text-gray-300': $page.url !== '/knowledge-dashboard' }">Início</span>
            </Link>

            <!-- Meus Cursos -->
            <Link
                href="/knowledge-dashboard/cursos"
                class="flex items-center px-4 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700"
                :class="{
                    'bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white': $page.url.startsWith('/knowledge-dashboard/cursos'),
                    'justify-center': collapsed,
                    'text-gray-700 dark:text-gray-300': !$page.url.startsWith('/knowledge-dashboard/cursos')
                }"
                :title="collapsed ? 'Meus Cursos' : ''"
            >
                <svg class="w-5 h-5 flex-shrink-0" :class="{ 'text-gray-700 dark:text-gray-300': !$page.url.startsWith('/knowledge-dashboard/cursos') }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <span v-if="!collapsed" class="ml-3" :class="{ 'text-gray-900 dark:text-white': $page.url.startsWith('/knowledge-dashboard/cursos'), 'text-gray-700 dark:text-gray-300': !$page.url.startsWith('/knowledge-dashboard/cursos') }">Meus Cursos</span>
            </Link>

            <!-- Conquistas -->
            <Link
                href="/knowledge-dashboard/conquistas"
                class="flex items-center px-4 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700"
                :class="{
                    'bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white': $page.url.startsWith('/knowledge-dashboard/conquistas'),
                    'justify-center': collapsed,
                    'text-gray-700 dark:text-gray-300': !$page.url.startsWith('/knowledge-dashboard/conquistas')
                }"
                :title="collapsed ? 'Conquistas' : ''"
            >
                <svg class="w-5 h-5 flex-shrink-0" :class="{ 'text-gray-700 dark:text-gray-300': !$page.url.startsWith('/knowledge-dashboard/conquistas') }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span v-if="!collapsed" class="ml-3" :class="{ 'text-gray-900 dark:text-white': $page.url.startsWith('/knowledge-dashboard/conquistas'), 'text-gray-700 dark:text-gray-300': !$page.url.startsWith('/knowledge-dashboard/conquistas') }">Conquistas</span>
            </Link>

            <!-- Histórico -->
            <Link
                href="/knowledge-dashboard/historico"
                class="flex items-center px-4 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700"
                :class="{
                    'bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white': $page.url.startsWith('/knowledge-dashboard/historico'),
                    'justify-center': collapsed,
                    'text-gray-700 dark:text-gray-300': !$page.url.startsWith('/knowledge-dashboard/historico')
                }"
                :title="collapsed ? 'Histórico' : ''"
            >
                <svg class="w-5 h-5 flex-shrink-0" :class="{ 'text-gray-700 dark:text-gray-300': !$page.url.startsWith('/knowledge-dashboard/historico') }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span v-if="!collapsed" class="ml-3" :class="{ 'text-gray-900 dark:text-white': $page.url.startsWith('/knowledge-dashboard/historico'), 'text-gray-700 dark:text-gray-300': !$page.url.startsWith('/knowledge-dashboard/historico') }">Histórico</span>
            </Link>
        </nav>
    </aside>
</template>
