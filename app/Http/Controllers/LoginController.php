<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'CorreoInstitucional' => 'required|email',
            'password' => 'required'
        ]);

        $credenciales = [
            'CorreoInstitucional' => $request->CorreoInstitucional,
            'password' => $request->password
        ];

        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();
            return redirect()->route('home')
                ->with('success', 'Bienvenido');
        }

        return back()->withErrors([
            'CorreoInstitucional' => 'Credenciales incorrectas'
        ])->onlyInput('CorreoInstitucional');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
