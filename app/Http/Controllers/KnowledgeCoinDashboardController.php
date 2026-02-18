<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class KnowledgeCoinDashboardController extends Controller
{
    /**
     * Página inicial do dashboard.
     *
     * @return Response
     */
    public function index(): Response
    {
        // Aqui você pode buscar dados do banco, calcular estatísticas, etc.
        $stats = [
            'cursos' => 5,          // Exemplo: número de cursos em andamento
            'conquistas' => 3,       // Exemplo: conquistas desbloqueadas
            'pontos' => 1200,        // Exemplo: pontuação total
            'nivel' => 4,
        ];

        // Retorna uma resposta Inertia apontando para o componente Vue
        // 'KnowlodgeCoinDashboard/Index' é o caminho relativo a resources/js/Pages
        return Inertia::render('KnowlodgeCoinDashboard/Index', [
            'stats' => $stats,       // Os dados serão passados como props para o componente Vue
        ]);
    }
}

