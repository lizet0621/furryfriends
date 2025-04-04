<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    // Registrar adoptante
    public function storeAdoptante(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // 1. Crear el rol primero en la tabla roles
        $role = Role::create([
            'tipo' => 'adoptante',
        ]);

        // 2. Crear el usuario y asignarle el role_id
        $user = User::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $role->id, // Asegurar que se guarde el ID del rol
        ]);

        return redirect()->route('login')->with('success', 'Registro exitoso. Inicia sesión.');
    }

    // Registrar refugio
    public function storeRefugio(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // 1. Crear el rol en la tabla roles
        $role = Role::create([
            'tipo' => 'refugio',
        ]);

        // 2. Crear el usuario con el role_id correcto
        $refugio = User::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $role->id,
        ]);

        // Iniciar sesión automáticamente
        Auth::login($refugio);

        return redirect()->route('welcome')->with('success', 'Registro exitoso. ¡Bienvenido!');
    }
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
        'tipo' => 'required|string',
        'telefono' => 'nullable|string',
        'direccion' => 'nullable|string',
        'ciudad' => 'nullable|string',
        'capacidad' => 'nullable|integer',
        'horarios' => 'nullable|string',
        'responsable' => 'nullable|string',
        'servicios' => 'nullable|string',
    ]);

    $validatedData['password'] = bcrypt($validatedData['password']);

    User::create($validatedData);

    return redirect()->route('login')->with('success', 'Registro exitoso.');
}

}
