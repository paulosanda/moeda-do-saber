<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import AuthLayout from '@/Layouts/AuthLayout.vue';

defineProps<{
    status?: string;
    canResetPassword: boolean;
}>();

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <AuthLayout>
        <Head title="Entrar" />

        <!-- Mensagem de status (ex: após reset de senha) -->
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600 bg-green-50 p-3 rounded-lg">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="space-y-6">
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                <div class="mt-1">
                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        autocomplete="email"
                        required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        :class="{ 'border-red-500': form.errors.email }"
                    />
                    <p v-if="form.errors.email" class="mt-1 text-xs text-red-600">{{ form.errors.email }}</p>
                </div>
            </div>

            <!-- Senha -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                <div class="mt-1">
                    <input
                        id="password"
                        v-model="form.password"
                        type="password"
                        autocomplete="current-password"
                        required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        :class="{ 'border-red-500': form.errors.password }"
                    />
                    <p v-if="form.errors.password" class="mt-1 text-xs text-red-600">{{ form.errors.password }}</p>
                </div>
            </div>

            <!-- Lembrar-me e esqueci senha -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input
                        id="remember"
                        v-model="form.remember"
                        type="checkbox"
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                    />
                    <label for="remember" class="ml-2 block text-sm text-gray-700">Lembrar-me</label>
                </div>

                <div v-if="canResetPassword">
                    <Link
                        :href="route('password.request')"
                        class="text-sm font-medium text-blue-600 hover:text-blue-500"
                    >
                        Esqueceu a senha?
                    </Link>
                </div>
            </div>

            <!-- Botão de submit -->
            <div>
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50 transition"
                >
                    <span v-if="form.processing" class="animate-spin mr-2">⏳</span>
                    Entrar
                </button>
            </div>
        </form>
    </AuthLayout>
</template>
