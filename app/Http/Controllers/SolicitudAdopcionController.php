<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolicitudAdopcionController extends Controller
{
    public function store(Request $request)
    {
        // Lógica para procesar la solicitud de adopción
        // Ejemplo: guardar en la base de datos
        return redirect()->back()->with('success', 'Solicitud enviada correctamente');
    }
    
}