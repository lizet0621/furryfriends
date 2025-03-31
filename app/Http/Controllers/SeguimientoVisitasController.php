<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeguimientoVisitas;

class SeguimientoVisitasController extends Controller
{
    public function index()
    {
        $seguimientos = SeguimientoVisitas::all();
        return view('SeguimientoVisitas.index', compact('seguimientos'));
    }

    public function create()
    {
        return view('SeguimientoVisitas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'adoptante_id' => 'required|exists:adoptantes,id',
            'archivo' => 'required|mimes:pdf,jpg,png|max:2048', // Permite PDF e imágenes
        ]);

        // Subir archivo
        $archivoNombre = $request->file('archivo')->store('seguimientos', 'public');

        SeguimientoVisitas::create([
            'adoptante_id' => $request->adoptante_id,
            'archivo' => $archivoNombre,
        ]);

        return redirect()->route('SeguimientoVisitas.index')
                         ->with('success', 'Archivo subido exitosamente.');
    }

    public function destroy($id)
    {
        $seguimiento = SeguimientoVisitas::findOrFail($id);
        
        // Eliminar archivo del almacenamiento
        \Storage::delete('public/' . $seguimiento->archivo);

        $seguimiento->delete();

        return redirect()->route('SeguimientoVisitas.index')
                         ->with('success', 'Registro eliminado.');
    }
}