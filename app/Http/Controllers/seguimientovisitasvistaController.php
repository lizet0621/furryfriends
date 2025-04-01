<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeguimientoVisitasVista;

class SeguimientoVisitasVistaController extends Controller
{
    // Mostrar los documentos subidos
    public function mostrar()
    {
        // Obtener los registros más recientes
        $seguimientos = SeguimientoVisitasVista::latest()->get();
        return view('seguimientovisitasvista', compact('seguimientos'));
    }

    // Subir un nuevo archivo de seguimiento de visita
    public function subir(Request $request)
    {
        $request->validate([
            'archivo' => 'required|mimes:pdf|max:2048'
        ]);

        // Guardar el archivo
        $archivo = $request->file('archivo')->store('seguimientovisitas', 'public');

        // Crear un nuevo registro en la base de datos
        SeguimientoVisitasVista::create([
            'archivo' => $archivo
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('seguimientovisitasvista.mostrar')->with('success', 'Documento subido con éxito.');
    }
}