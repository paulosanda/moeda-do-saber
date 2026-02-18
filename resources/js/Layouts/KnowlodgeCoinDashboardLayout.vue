<script setup>
import { ref, onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

// Estado para o menu mobile (opcional)
const showingNavigationDropdown = ref(false);

// Estado para tema escuro
const isDark = ref(false);

// Alternar tema
const toggleTheme = () => {
    isDark.value = !isDark.value;
    updateThemeClass();
    localStorage.setItem('theme', isDark.value ? 'dark' : 'light');
};

// Atualiza a classe do elemento html
const updateThemeClass = () => {
    if (isDark.value) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
};

// Verificar tema salvo ou preferência do sistema
onMounted(() => {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        isDark.value = savedTheme === 'dark';
    } else {
        isDark.value = window.matchMedia('(prefers-color-scheme: dark)').matches;
    }
    updateThemeClass();
});

// Estado para sidebar recolhida
const isSidebarCollapsed = ref(false);

// Alternar estado da sidebar
const toggleSidebar = () => {
    isSidebarCollapsed.value = !isSidebarCollapsed.value;
};
</script>

<template>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Cabeçalho -->
        <nav class="border-b border-gray-100 bg-white dark:border-gray-700 dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 justify-between items-center">
                    <!-- Logo Moeda do Saber (sempre visível) -->
                    <div class="flex items-center">
                        <span class="text-2xl font-bold text-yellow-600">🪙 Moeda do Saber</span>
                    </div>

                    <!-- Botões de tema e menu do usuário -->
                    <div class="flex items-center space-x-3">
                        <!-- Botão de tema claro/escuro -->
                        <button
                            @click="toggleTheme"
                            class="p-2 rounded-md text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 focus:outline-none"
                            :title="isDark ? 'Modo claro' : 'Modo escuro'"
                        >
                            <svg v-if="!isDark" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <svg v-else class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                        </button>

                        <!-- Menu do usuário (dropdown) -->
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <span class="inline-flex rounded-md">
                                    <button
                                        type="button"
                                        class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300"
                                    >
                                        {{ $page.props.auth.user.name }}
                                        <svg
                                            class="-me-0.5 ms-2 h-4 w-4"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <DropdownLink :href="route('profile.edit')">
                                    Profile
                                </DropdownLink>
                                <DropdownLink :href="route('logout')" method="post" as="button">
                                    Log Out
                                </DropdownLink>
                            </template>
                        </Dropdown>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Container principal com menu vertical e conteúdo -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex">
            <!-- Barra lateral vertical (recolhível) -->
            <aside
                class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 mr-6 transition-all duration-300"
                :class="isSidebarCollapsed ? 'w-20' : 'w-64'"
            >
                <!-- Botão para recolher/expandir -->
                <div class="flex justify-end mb-4">
                    <button
                        @click="toggleSidebar"
                        class="p-1 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none"
                        :title="isSidebarCollapsed ? 'Expandir menu' : 'Recolher menu'"
                    >
                        <svg v-if="!isSidebarCollapsed" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                        </svg>
                        <svg v-else class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                <!-- Links de navegação com ícones -->
                <nav class="space-y-2">
                    <!-- Início -->
                    <Link
                        href="/knowledge-dashboard"
                        class="flex items-center px-4 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700"
                        :class="{
                            'bg-gray-200 dark:bg-gray-700': $page.url === '/knowledge-dashboard',
                            'justify-center': isSidebarCollapsed
                        }"
                        :title="isSidebarCollapsed ? 'Início' : ''"
                    >
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span v-if="!isSidebarCollapsed" class="ml-3">Início</span>
                    </Link>

                    <!-- Meus Cursos -->
                    <Link
                        href="/knowledge-dashboard/cursos"
                        class="flex items-center px-4 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700"
                        :class="{
                            'bg-gray-200 dark:bg-gray-700': $page.url.startsWith('/knowledge-dashboard/cursos'),
                            'justify-center': isSidebarCollapsed
                        }"
                        :title="isSidebarCollapsed ? 'Meus Cursos' : ''"
                    >
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <span v-if="!isSidebarCollapsed" class="ml-3">Meus Cursos</span>
                    </Link>

                    <!-- Conquistas -->
                    <Link
                        href="/knowledge-dashboard/conquistas"
                        class="flex items-center px-4 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700"
                        :class="{
                            'bg-gray-200 dark:bg-gray-700': $page.url.startsWith('/knowledge-dashboard/conquistas'),
                            'justify-center': isSidebarCollapsed
                        }"
                        :title="isSidebarCollapsed ? 'Conquistas' : ''"
                    >
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span v-if="!isSidebarCollapsed" class="ml-3">Conquistas</span>
                    </Link>

                    <!-- Histórico -->
                    <Link
                        href="/knowledge-dashboard/historico"
                        class="flex items-center px-4 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700"
                        :class="{
                            'bg-gray-200 dark:bg-gray-700': $page.url.startsWith('/knowledge-dashboard/historico'),
                            'justify-center': isSidebarCollapsed
                        }"
                        :title="isSidebarCollapsed ? 'Histórico' : ''"
                    >
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span v-if="!isSidebarCollapsed" class="ml-3">Histórico</span>
                    </Link>
                </nav>
            </aside>

            <!-- Conteúdo principal -->
            <main class="flex-1 bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <slot />
            </main>
        </div>
    </div>
</template>
