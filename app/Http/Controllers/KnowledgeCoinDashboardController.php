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
        $stats = [
            'cursos' => 5,          // Exemplo: número de cursos em andamento
            'conquistas' => 3,       // Exemplo: conquistas desbloqueadas
            'pontos' => 1200,        // Exemplo: pontuação total
            'nivel' => 4,
        ];

        return Inertia::render('KnowlodgeCoinDashboard/Index', [
            'stats' => $stats,
            'title' => 'Visão Geral - Moeda do Saber',
        ]);
    }
}

