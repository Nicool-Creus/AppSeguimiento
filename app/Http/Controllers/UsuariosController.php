<?php

namespace App\Http\Controllers;

use App\Mail\CrearContrasenaAuxiliarMail;
use App\Models\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $token = Str::random(60);

        $usuario = usuarios::create([
            'CorreoInstitucional' => $request->CorreoInstitucional,
            'Contrasena' => null,
            'TokenContrasena' => $token,
            'tblaprendices_NIS'=> null,
            'tblrolesadministrativos_NIS'=> 2
        ]);

        Mail::to($usuario->CorreoInstitucional)
            ->send(new CrearContrasenaAuxiliarMail($token));

        return back()->with('success', 'Auxiliar creado y correo enviado');
    }

    public function mostrarFormulario($token)
    {
        $usuario = usuarios::where('TokenContrasena', $token)->firstOrFail();

        return view('Usuarios.create_Password_Auxiliar', compact('token'));
    }

    public function guardarContrasena(Request $request)
    {
        $request->validate([
            'Contrasena' => 'required|min:6|confirmed'
        ]);

        $usuario = usuarios::where('TokenContrasena', $request->TokenContrasena)->firstOrFail();

        $usuario->Contrasena = Hash::make($request->Contrasena);
        $usuario->TokenContrasena = null;
        $usuario->save();

        return redirect('/login')->with('success', 'Contraseña creada correctamente');
    }

    /*public function store(Request $request)
    {
        $request->validate([
            'CorreoInstitucional' => 'required|email|unique:tblusuarios,CorreoInstitucional',
            'password' => 'required'
        ]);

        $usuario = new usuarios();
        $usuario->CorreoInstitucional = $request->CorreoInstitucional;
        $usuario->Contrasena = Hash::make($request->password);
        $usuario->save();

        return redirect()->route('login')
            ->with('success', 'Usuario registrado correctamente');
    }*/

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
