<script setup lang="ts">
import { ref, onMounted } from 'vue';
import LandingLayout from '@/Layouts/LandingLayout.vue';
import { Link } from '@inertiajs/vue3';

const features = [
    { icon: '🎓', title: 'Conhecimento é riqueza', description: 'A escola emite créditos com lastro real, valorizando cada conquista.' },
    { icon: '⚖️', title: 'Equidade e diversidade', description: 'Disciplinas desafiadoras valem mais pontos para incentivar a superação.' },
    { icon: '🤝', title: 'Cooperação', description: 'Grupos de estudo ganham bônus coletivos – juntos vamos mais longe.' },
    { icon: '🔍', title: 'Transparência', description: 'Extrato completo de todas as transações, visível para alunos e professores.' },
    { icon: '🎮', title: 'Autonomia', description: 'Cada aluno decide como gastar seus créditos na loja da escola.' },
    { icon: '🚀', title: 'Inovação pedagógica', description: 'Sistema flexível que se adapta a qualquer realidade escolar.' },
];

const howItWorks = [
    { step: '1', title: 'Ganhe créditos', description: 'Por notas, tarefas, participação e projetos em grupo.', icon: '💰' },
    { step: '2', title: 'Acumule e troque', description: 'Use seus créditos na loja da escola: de lanches a experiências incríveis.', icon: '🛒' },
    { step: '3', title: 'Colabore', description: 'Forme cooperativas de estudo e ganhe créditos extras com projetos coletivos.', icon: '👥' },
];

// Animação suave ao rolar (sem opacidade inicial)
onMounted(() => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });

    document.querySelectorAll('.animate-on-scroll').forEach(el => {
        observer.observe(el);
    });
});
</script>

<template>
    <LandingLayout>
        <!-- Hero (inalterado, já tem fundo escuro e texto claro) -->
        <section class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-700 text-white py-28">
            <!-- bolhas etc. (mantido igual) -->
            <div class="absolute inset-0 opacity-20">
                <div class="absolute top-20 left-10 w-72 h-72 bg-white rounded-full mix-blend-overlay filter blur-3xl animate-pulse"></div>
                <div class="absolute bottom-20 right-10 w-96 h-96 bg-yellow-300 rounded-full mix-blend-overlay filter blur-3xl animate-pulse delay-1000"></div>
            </div>

            <div class="container mx-auto px-6 relative z-10">
                <div class="max-w-4xl mx-auto text-center">
                    <h1 class="text-6xl font-extrabold mb-6 leading-tight animate-fade-in-down">
                        Transforme <span class="text-yellow-300">aprendizado</span><br>em <span class="text-yellow-300">recompensas</span>
                    </h1>
                    <p class="text-xl mb-10 text-blue-100 max-w-2xl mx-auto">
                        Um sistema de incentivo que valoriza o esforço, a cooperação e o conhecimento.
                        Cada conquista vira crédito para trocar por experiências incríveis.
                    </p>
                    <!-- botões (inalterados) -->
                    <div class="flex flex-wrap justify-center gap-4">

                        <a href="#manifesto" class="px-8 py-4 bg-white/20 backdrop-blur-sm border border-white/30 rounded-full text-lg hover:bg-white/30 transition">
                            Conhecer o manifesto
                        </a>
                    </div>
                    <!-- números (inalterados) -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-20">
                        <div class="text-center">
                            <div class="text-4xl font-bold text-yellow-300">10+</div>
                            <div class="text-blue-100">Escolas parceiras</div>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-bold text-yellow-300">5.000+</div>
                            <div class="text-blue-100">Alunos motivados</div>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-bold text-yellow-300">1M+</div>
                            <div class="text-blue-100">Créditos trocados</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Manifesto (agora com texto mais escuro) -->
        <section id="manifesto" class="py-24 bg-white">
            <div class="container mx-auto px-6">
                <div class="max-w-3xl mx-auto text-center">
                    <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Nossa filosofia</span>
                    <h2 class="text-4xl font-bold mt-2 mb-6 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Manifesto</h2>
                    <div class="relative p-8 bg-gradient-to-br from-blue-50 to-purple-50 rounded-3xl shadow-2xl border border-white/50 animate-on-scroll">
                        <div class="absolute -top-4 -left-4 text-6xl opacity-20">“</div>
                        <p class="text-lg text-gray-800 leading-relaxed relative z-10">
                            Acreditamos que a educação pode ser transformada quando os alunos são protagonistas do próprio aprendizado,
                            sentindo-se valorizados não apenas por notas, mas por cada esforço, descoberta e colaboração. Queremos criar
                            um ecossistema onde o conhecimento se torna uma moeda de troca real, capaz de abrir portas para novas experiências,
                            recompensar a dedicação e fortalecer laços entre estudantes, professores e a escola.
                        </p>
                        <div class="absolute -bottom-4 -right-4 text-6xl opacity-20">”</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Valores: texto mais escuro -->
        <section id="valores" class="py-24 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Princípios</span>
                    <h2 class="text-4xl font-bold mt-2 text-gray-900">Nossos valores</h2>
                    <p class="text-gray-700 mt-3 max-w-2xl mx-auto">O que nos move e orienta cada conquista dentro da Moeda do Saber.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div v-for="(feature, idx) in features" :key="idx"
                         class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 animate-on-scroll"
                         :style="{ transitionDelay: `${idx * 100}ms` }">
                        <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">{{ feature.icon }}</div>
                        <h3 class="text-xl font-bold mb-2 text-gray-900 group-hover:text-blue-600 transition">{{ feature.title }}</h3>
                        <p class="text-gray-700">{{ feature.description }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Como funciona: texto mais escuro -->
        <section id="como-funciona" class="py-24 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Passo a passo</span>
                    <h2 class="text-4xl font-bold mt-2 text-gray-900">Como funciona</h2>
                    <p class="text-gray-700 mt-3 max-w-2xl mx-auto">Simples, intuitivo e projetado para engajar.</p>
                </div>

                <div class="flex flex-col md:flex-row justify-center items-center gap-8 relative">
                    <div class="hidden md:block absolute top-1/2 left-1/2 transform -translate-x-1/2 w-2/3 h-1 bg-gradient-to-r from-blue-300 to-purple-300 z-0"></div>

                    <div v-for="(item, idx) in howItWorks" :key="idx"
                         class="relative z-10 bg-white p-8 rounded-3xl shadow-xl border-2 border-white w-full md:w-1/3 text-center hover:shadow-2xl transition group animate-on-scroll"
                         :style="{ transitionDelay: `${idx * 200}ms` }">
                        <div class="absolute -top-5 left-1/2 transform -translate-x-1/2 w-12 h-12 bg-gradient-to-br from-blue-600 to-purple-600 text-white rounded-full flex items-center justify-center text-2xl font-bold shadow-lg">
                            {{ item.step }}
                        </div>
                        <div class="text-6xl mt-4 mb-4 group-hover:scale-110 transition">{{ item.icon }}</div>
                        <h3 class="text-2xl font-bold mb-2 text-gray-900">{{ item.title }}</h3>
                        <p class="text-gray-700">{{ item.description }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Depoimentos (inalterado, fundo escuro) -->
        <section class="py-24 bg-gradient-to-br from-blue-600 to-purple-700 text-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold">Quem já usa, recomenda</h2>
                    <p class="text-blue-100 mt-3">Escolas e alunos que transformaram sua realidade.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white/10 backdrop-blur-sm p-8 rounded-3xl border border-white/20">
                        <div class="text-yellow-300 text-2xl mb-4">★★★★★</div>
                        <p class="italic">"Os alunos se engajaram muito mais, e as notas melhoraram significativamente."</p>
                        <div class="mt-4 font-semibold">— Escola Municipal Paulo Freire</div>
                    </div>
                    <!-- outros depoimentos -->
                </div>
            </div>
        </section>

        <!-- CTA final (inalterado, fundo branco com texto escuro) -->
        <section class="py-24 bg-white">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-4xl font-bold mb-4 text-gray-900">Pronto para revolucionar sua escola?</h2>
                <p class="text-xl text-gray-700 mb-10 max-w-2xl mx-auto">Junte-se a dezenas de instituições que já estão colhendo os frutos da Moeda do Saber.</p>

            </div>
        </section>
    </LandingLayout>
</template>

<style scoped>
/* Animação de entrada */
@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
.animate-fade-in-down {
    animation: fadeInDown 1s ease-out;
}

/* Elementos que animam ao rolar - agora partem de visível e ganham movimento */
.animate-on-scroll {
    opacity: 1; /* removido opacidade inicial */
    transform: translateY(20px);
    transition: transform 0.8s ease, box-shadow 0.3s ease;
}

.animate-on-scroll.animated {
    transform: translateY(0);
}
</style>
