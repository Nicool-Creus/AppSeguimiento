<?php

namespace App\Http\Controllers;

use App\Mail\AprendicesMailRegistro;
use App\Models\aprendices;
use App\Models\eps;
use App\Models\tiposdocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Str;

class AprendicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aprendices = Aprendices::with(['tiposdocumentos', 'eps'])->get();
        //dd($aprendices, 'HOLA');

        return view('Aprendices.index', compact('aprendices'));

        //Otra forma:
        /*$aprendices = Aprendices::all();
        return view('Aprendices.index.blade', compact('aprendices'));*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiposDocumentos = tiposdocumentos::all();
        $eps = eps::all();

        return view('Aprendices.create', compact('tiposDocumentos', 'eps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $v=validator::make($request->all(),[
            'tbltiposdocumentos_NIS'=>'required|exists:tbltiposdocumentos,NIS',
            'NumDoc'=>['required'],
            'Nombres'=>['required'],
            'Apellidos'=>['required'],
            'Direccion'=>['required'],
            'Telefono'=>['required'],
            'CorreoInstitucional'=>['required', 'email'],
            'CorreoPersonal'=>['required', 'email'],
            'Sexo'=>['required'],
            'FechaNac'=>['required', 'date'],
            'tbleps_NIS'=>'required|exists:tbleps,NIS',
        ]);
        //dd($request->all());

        if ($v->fails()){
            return back()->withErrors($v)->withInput();
        }

        $input = $request->all();

        $aprendiz = aprendices::create($input);

        // Generar token para registro
        $token = Str::random(60);

        // Guardar token en la tabla (si tienes el campo)
        $aprendiz->TokenRegistro = $token;
        $aprendiz->save();

        // Enviar correo
        Mail::to($aprendiz->CorreoInstitucional)
            ->send(new AprendicesMailRegistro($aprendiz, $token));

        //$successMsg="Aprendiz registrado correctamente";
        //Alert::success('Aprendices registrado correctamente');

        return redirect()->route('aprendices.create')->with('success', 'Aprendiz registrado exitosamente');
    }


    /**
     * Display the specified resource.
     */
    public function show(int $NIS)
    {
        $aprendiz = Aprendices::with(['tiposdocumentos', 'eps'])
            ->find($NIS);

        if (!$aprendiz) {
            return redirect()->route('aprendices.index')
                ->with('error', 'El NIS no existe');
        }

        return view('Aprendices.show', compact('aprendiz'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $NIS)
    {
        $aprendiz = aprendices::find($NIS);

        if (!$aprendiz) {
            return redirect()->route('aprendices.index')
                ->with('error', 'El NIS no existe');
        }

        $tiposDocumentos = tiposdocumentos::all();
        $eps = eps::all();

        return view('Aprendices.edit', compact('aprendiz', 'tiposDocumentos', 'eps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $NIS)
    {
        $aprendiz = aprendices::find($NIS);

        if (!$aprendiz) {
            return redirect()->route('aprendices.index')
                ->with('error', 'El NIS no existe');
        }

        $request->validate([
            'tbltiposdocumentos_NIS'=>'required',
            'NumDoc'=>'required',
            'Nombres'=>'required',
            'Apellidos'=>'required',
            'Direccion'=>'required',
            'Telefono'=>'required',
            'CorreoInstitucional'=>'required', 'email',
            'CorreoPersonal'=>'required', 'email',
            'Sexo'=>'required',
            'FechaNac'=>'required', 'date',
            'tbleps_NIS'=>'required'
        ]);

        $aprendiz->update($request->all());

        return redirect()->route('aprendices.index')
            ->with('success', 'Datos del instructor actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $NIS)
    {
        $aprendices = aprendices::find($NIS);

        if (!$aprendices) {
            return redirect()->route('aprendices.index')
                ->with('error', 'El NIS no existe');
        }

        $aprendices->delete();

        return redirect()->route('aprendices.index')
            ->with('success', 'El instructor se ha eliminado correctamente');
    }
}
