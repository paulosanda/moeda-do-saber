# Moeda do Saber

Sistema de incentivo ao estudo baseado em créditos, onde alunos ganham moedas por desempenho acadêmico, participação e cooperação, e podem trocá-las por produtos e experiências oferecidos pela escola.

---

## Manifesto

### Nossa Visão

Acreditamos que a educação pode ser transformada quando os alunos são protagonistas do próprio aprendizado, sentindo-se valorizados não apenas por notas, mas por cada esforço, descoberta e colaboração. Queremos criar um ecossistema onde o conhecimento se torna uma moeda de troca real, capaz de abrir portas para novas experiências, recompensar a dedicação e fortalecer laços entre estudantes, professores e a escola.

### Nossos Valores

1. **O conhecimento é a riqueza fundamental**  
   A fonte primária de valor é o aprendizado. A escola, como guardiã e promotora do saber, é a única instituição emissora dos créditos. Professores são os agentes que distribuem essa riqueza.

2. **Equidade e incentivo à diversidade**  
   Disciplinas com baixo desempenho geral concedem mais créditos por notas altas (bônus por raridade), incentivando os alunos a explorarem novos horizontes.

3. **Cooperação acima da competição**  
   Grupos de estudo formam verdadeiras cooperativas de aprendizado. A produção coletiva gera créditos extras para todos os participantes.

4. **Transparência e autonomia**  
   Cada transação é registrada e visível. Alunos acompanham seu saldo e decidem como usar seus créditos.

5. **Inovação pedagógica contínua**  
   O sistema é flexível para se adaptar a diferentes realidades escolares.

---

## Conceitos Fundamentais

- **Escola como Banco Central**: Emite os créditos com lastro real (orçamento destinado às recompensas). Define cotas para professores e controla a base monetária.
- **Professores como Distribuidores**: Recebem cotas de créditos para distribuir a alunos por notas, tarefas etc.
- **Bônus por Raridade**: Disciplinas com médias baixas concedem mais créditos por notas altas, equilibrando o incentivo.
- **Cooperativas de Estudo**: Grupos de alunos produzem trabalhos coletivos e ganham créditos extras, divididos entre os membros.
- **Loja Escolar**: Produtos divididos em categorias (consumo diário, experiências, bens duráveis, alto valor) para equilibrar a base monetária.
- **Transferências entre Alunos**: Permite troca de créditos, estimulando cooperação.

---

## Tecnologias Utilizadas

- **Backend**: PHP 8.3, Laravel 12
- **Frontend**: Vue 3 (Composition API), Inertia.js, Tailwind CSS
- **Banco de Dados**: MySQL (via Laravel Sail)
- **Testes**: PEST
- **Arquitetura**: DDD simplificado (bounded contexts), SOLID, KISS

---

## Arquitetura do Projeto

A organização segue uma abordagem híbrida: DDD para a lógica de negócio e convenções Laravel para a camada de apresentação.

```aiignore
app/
├── Domains/ # Bounded contexts
│ ├── School/ # Escolas, turmas, disciplinas, usuários
│ │ ├── Models/
│ │ ├── Services/
│ │ └── Actions/
│ ├── Account/ # Contas, saldos, transações
│ │ ├── Models/
│ │ ├── Services/
│ │ └── Actions/
│ ├── Incentive/ # Regras de incentivo (bônus, cooperativas)
│ │ ├── Models/
│ │ ├── Services/
│ │ └── Actions/
│ └── Store/ # Loja, produtos, compras
│ ├── Models/
│ ├── Services/
│ └── Actions/
├── Http/ # Controllers, Middleware, Requests
│ ├── Controllers/
│ ├── Middleware/
│ └── Requests/
├── Providers/ # Service providers
└── ...
```

---

## Instalação

### Pré‑requisitos

- PHP 8.3
- Composer
- Node.js (v20+)
- Docker (para Laravel Sail)
- Git

### Passo a Passo

1. **Clonar o repositório**
   ```bash
   git clone https://github.com/paulosanda/moeda-do-saber.git
   cd moeda-do-saber
2. **Instalar dependências PHP**
    ```bash
    composer install
    ```
3. **Instalar dependências JavaScript**
    ```bash
    npm install
    ```
4. **Configurar ambiente**
    ```
    cp .env.example .env
       php artisan key:generate
    ```
5. Configurar banco de dados com Laravel Sail
    ```bash
    composer require laravel/sail --dev
    php artisan sail:install
    ```
Durante a instalação, escolha mysql como serviço de banco de dados.

Inicie os containers:
    ```bash
    ./vendor/bin/sail up -d
    ```
6. **Ajustar variáveis de ambiente**
No arquivo .env, configure as credenciais do banco (o Sail já define DB_HOST=mysql).

7. **Executar migrações**
    ```bash
    ./vendor/bin/sail artisan migrate
    ```
8. **Compilar assets**
    ```bash
    npm run dev
    ```
9. **Acessar a aplicação**
Abra o navegador em http://localhost para acessar a aplicação.

## Configuração Inicial (Seeders)
Para popular o sistema com dados de teste:
```bash
./vendor/bin/sail artisan db:seed
```
**Os seeders criarão:**
- Uma escola padrão
- Usuários (admin, professores, alunos)
- Turmas e disciplinas
- Contas com saldos iniciais
- Produtos na loja

## Testes
Execute os testes com PEST:
```bash
./vendor/bin/sail pest
```
