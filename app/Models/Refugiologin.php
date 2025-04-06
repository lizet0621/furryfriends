<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\AdoptanteLogin;
use App\Models\RefugioLogin;
use App\Models\PerrosLogin;


class LoginController extends Controller
{
    
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
    $user = User::where('email', $credentials['email'])->first();

    if ($user && Hash::check($credentials['password'], $user->password)) {
        Auth::login($user);
        return redirect()->route('dashboard'); // O la ruta a donde debe ir después de iniciar sesión
    }

    return back()->withErrors(['email' => 'Credenciales incorrectas']);
}
    
    public function RefugioLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $refugio = RefugioLogin::where('email', $request->email)->first();

        if ($refugio && Hash::check($request->password, $refugio->password)) {
            Auth::login($refugio);
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Las credenciales son incorrectas.']);
    }

    public function refugioLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $refugio = RefugioLogin::where('email', $request->email)->first();

        if ($refugio && Hash::check($request->password, $refugio->password)) {
            Auth::login($refugio);
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Las credenciales son incorrectas.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}