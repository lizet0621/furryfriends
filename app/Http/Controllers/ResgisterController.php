<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Handle a registration request for the application.
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_rol' => 2, // Por defecto, Persona Natural
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'ciudad' => $request->ciudad,
            'capacidad' => $request->capacidad,
            'horarios' => $request->horarios,
            'responsable' => $request->responsable,
            'servicios' => $request->servicios,
        ]);
    
        return redirect('/login')->with('success', "Cuenta registrada exitosamente.");
    }

    
    public function show()
    {
        return view('auth.registerpNatural');
    }

}