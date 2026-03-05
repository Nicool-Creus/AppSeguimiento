<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $usuario = usuarios::where('CorreoInstitucional', $request->CorreoInstitucional)->first();

        if (!$usuario) {
            return back()->withErrors([
                'CorreoInstitucional' => 'El correo no existe'
            ])->onlyInput('CorreoInstitucional');
        }

        if (!Hash::check($request->password, $usuario->Contrasena)) {
            return back()->withErrors([
                'password' => 'La contraseña es incorrecta'
            ])->onlyInput('CorreoInstitucional');
        }

        Auth::login($usuario);
        $request->session()->regenerate();

        return redirect()->route('home')->with('success', 'Bienvenido al sistema');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
