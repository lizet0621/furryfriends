<?php

namespace App\Http\Controllers;

use App\Models\Perros;
use Illuminate\Http\Request;

class PerrosDisponiblesController extends Controller
{
    public function mostrar(Request $request)
    {
        $query = Perros::where('disponible', 'si')->with('refugio');

        if ($request->filled('edad')) {
            $query->where('edad', $request->edad);
        }
        if ($request->filled('color')) {
            $query->where('color', 'like', '%' . $request->color . '%');
        }
        if ($request->filled('tamanio')) {
            $query->where('tamanio', 'like', '%' . $request->tamanio . '%');
        }
        if ($request->filled('caracteristica')) {
            $query->where('caracteristica', 'like', '%' . $request->caracteristica . '%');
        }

        $perros = $query->get();

        return view('perrosdisponibles', compact('perros'));
    }
}