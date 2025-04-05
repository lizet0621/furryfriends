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

    public function showpNatural()
    {
         return view('auth.registerpNatural');
    }

    public function showAdop()
    {
         return view('auth.registerAdoptante');
    }
    public function showRefugio()
    {
         return view('auth.registerRefugio');
    }


    public function register(RegisterRequest $request){
        
        User::create($request->validated());

        return redirect('/login')->with('success', "Account successfully registered.");
    }

    


}