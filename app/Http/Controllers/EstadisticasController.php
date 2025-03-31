<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adoptante;
use App\Models\Refugio;
use App\Models\ViabilidadEstudio;
use App\Models\SeguimientoVisita;
use Carbon\Carbon;
use Illuminate\Routing\Controller;

class EstadisticasController extends Controller
{
    public function index()
    {
        // Obtener el año actual y la fecha de hoy
        $year = Carbon::now()->year;
        $today = Carbon::now()->toDateString();  // Formato 'Y-m-d' por defecto

        // Obtener conteo de registros por año y por día
        $data = [
            'adoptantes_ano' => Adoptante::whereYear('created_at', $year)->count(),
            'adoptantes_hoy' => Adoptante::whereDate('created_at', $today)->count(),
            
            'refugios_ano' => Refugio::whereYear('created_at', $year)->count(),
            'refugios_hoy' => Refugio::whereDate('created_at', $today)->count(),

            // Descomentamos y añadimos las estadísticas de ViabilidadEstudio y SeguimientoVisita
            //'viabilidad_ano' => ViabilidadEstudio::whereYear('created_at', $year)->count(),
            //'viabilidad_hoy' => ViabilidadEstudio::whereDate('created_at', $today)->count(),

            //'seguimientos_ano' => SeguimientoVisita::whereYear('created_at', $year)->count(),
            //'seguimientos_hoy' => SeguimientoVisita::whereDate('created_at', $today)->count(),
        ];

        // Retornar la vista con los datos
        return view('estadisticas.index', compact('data'));
    }
}