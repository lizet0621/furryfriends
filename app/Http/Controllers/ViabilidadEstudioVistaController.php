<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViabilidadEstudioVista;

class ViabilidadEstudioVistaController extends Controller
{
    public function mostrar()
    {
        $viabilidades = ViabilidadEstudioVista::latest()->get();
        return view('viabilidadestudiovista', compact('viabilidades'));
    }

    public function subir(Request $request)
    {
        $request->validate([
            'archivo' => 'required|mimes:pdf|max:2048'
        ]);

        $archivo = $request->file('archivo')->store('viabilidadestudios', 'public');

        ViabilidadEstudioVista::create([
            'archivo' => $archivo
        ]);

        return redirect()->route('viabilidadestudiovista.mostrar')->with('success', 'Documento subido con éxito.');
    }
}
