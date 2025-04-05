<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViabilidadEstudioVista;

class ViabilidadEstudioVistaController extends Controller
{
    public function mostrar(Request $request)
    {
        $query = ViabilidadEstudioVista::where('activo', true);

        // Filtro de búsqueda por nombre del archivo
        if ($request->has('search') && $request->search != '') {
            $query->where('archivo', 'like', '%' . $request->search . '%');
        }

        $viabilidades = $query->latest()->get();

        return view('viabilidadestudiovista', compact('viabilidades'));
    }

    public function subir(Request $request)
    {
        $request->validate([
            'rol_id' => 'required|exists:roles,id', // ← Asegúrate que el name del input sea 'rol_id'
            'archivos' => 'required|array',
            'archivos.*' => 'file|mimes:pdf,jpg,png|max:2048',
        ]);

        if ($request->hasFile('archivos')) {
            foreach ($request->file('archivos') as $archivo) {
                $ruta = $archivo->store('viabilidadestudios', 'public');

                ViabilidadEstudioVista::create([
                    'rol_id' => $request->rol_id,
                    'archivo' => $ruta,
                    'activo' => true,
                ]);
            }
        }

        return redirect()->route('viabilidadestudiovista.mostrar')->with('success', 'Documentos subidos con éxito.');
    }

    public function desactivar($id)
    {
        $estudio = ViabilidadEstudioVista::findOrFail($id);
        $estudio->update(['activo' => false]);

        return redirect()->route('viabilidadestudiovista.mostrar')->with('success', 'Documento desactivado con éxito.');
    }
}