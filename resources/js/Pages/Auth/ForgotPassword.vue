<script setup lang="ts">
import { Head, useForm, Link } from '@inertiajs/vue3';
import AuthLayout from '@/Layouts/AuthLayout.vue';

defineProps<{
    status?: string;
}>();

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <AuthLayout>
        <Head title="Redefinir senha" />

        <!-- Título e instruções -->
        <h2 class="text-2xl font-bold text-gray-900 mb-2 text-center">Redefinir senha</h2>
        <p class="text-sm text-gray-600 text-center mb-6">
            Esqueceu sua senha? Sem problemas. Informe seu e-mail e enviaremos um link para redefini-la.
        </p>

        <!-- Mensagem de status (sucesso) -->
        <div v-if="status" class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="space-y-6">
            <!-- Campo de e-mail -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                <div class="mt-1">
                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        required
                        autofocus
                        autocomplete="email"
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        :class="{ 'border-red-500': form.errors.email }"
                    />
                    <p v-if="form.errors.email" class="mt-1 text-xs text-red-600">{{ form.errors.email }}</p>
                </div>
            </div>

            <!-- Botão de envio -->
            <div>
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50 transition"
                >
                    <span v-if="form.processing" class="animate-spin mr-2">⏳</span>
                    Enviar link de redefinição
                </button>
            </div>

            <!-- Link para voltar ao login -->
            <div class="text-center">
                <Link href="/login" class="text-sm text-blue-600 hover:text-blue-500">
                    Voltar para o login
                </Link>
            </div>
        </form>
    </AuthLayout>
</template>
