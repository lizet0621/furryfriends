<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión.
     */
    public function showLoginForm()
    {
        return view('auth.login'); // La vista de login en Blade
    }

    /**
     * Maneja la autenticación de los usuarios.
     */
    public function login(Request $request)
    {
        // Validación de las credenciales
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Verifica si el usuario existe y las credenciales son correctas
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Autenticar al usuario
            Auth::login($user);

            // Verifica el tipo de usuario (adoptante o refugio) y redirige a la vista correspondiente
            if ($user->tipo_usuario == 'adoptante') {
                return redirect()->intended('/dashboard-adoptante'); // Redirige al dashboard de adoptante
            } elseif ($user->tipo_usuario == 'refugio') {
                return redirect()->intended('/dashboard-refugio'); // Redirige al dashboard de refugio
            }
        }

        // Si las credenciales son incorrectas
        return back()->withErrors(['email' => 'Credenciales incorrectas'])->withInput();
    }

    /**
     * Cierra la sesión del usuario.
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}