<script setup>
import { ref, onMounted, computed } from 'vue';
import { Head, usePage } from '@inertiajs/vue3';
import TopBar from '@/Components/KnowlodgeCoinDashboard/TopBar.vue';
import Sidebar from '@/Components/KnowlodgeCoinDashboard/Sidebar.vue';

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

    // Recuperar estado da sidebar do localStorage
    const savedSidebar = localStorage.getItem('sidebarCollapsed');
    if (savedSidebar !== null) {
        isSidebarCollapsed.value = savedSidebar === 'true';
    }
});

// Estado para sidebar recolhida (agora com persistência)
const isSidebarCollapsed = ref(false);

// Alternar estado da sidebar e salvar no localStorage
const toggleSidebar = () => {
    isSidebarCollapsed.value = !isSidebarCollapsed.value;
    localStorage.setItem('sidebarCollapsed', isSidebarCollapsed.value);
};

// Título dinâmico (CORRIGIDO)
const page = usePage();
const pageTitle = computed(() => page.props.pageTitle ?? 'Moeda do Saber');
</script>

<template>
    <Head>
        <title>{{ pageTitle }}</title>
    </Head>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Cabeçalho agora é o componente TopBar -->
        <TopBar :isDark="isDark" :onToggleTheme="toggleTheme" />

        <!-- Container principal com menu vertical e conteúdo -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex">
            <!-- Barra lateral vertical (recolhível) -->
            <!-- Sidebar -->
            <Sidebar
                :collapsed="isSidebarCollapsed"
                @toggle="toggleSidebar"
            />

            <!-- Conteúdo principal -->
            <main class="flex-1 bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <slot />
            </main>
        </div>
    </div>
</template>
