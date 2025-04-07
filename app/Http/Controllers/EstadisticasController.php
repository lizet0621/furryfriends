<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    public function index()
    {
        // Datos simulados para las estadísticas
        $estadisticas = [
            'adopcionesPorMes' => [12, 19, 3, 5, 2, 3, 10, 15, 8, 6, 7, 9],
            'registrosRefugiosPorMes' => [5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60],
        ];

        return view('estadisticas', compact('estadisticas'));
    }
}