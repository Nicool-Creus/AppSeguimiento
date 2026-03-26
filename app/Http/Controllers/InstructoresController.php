<?php

namespace App\Http\Controllers;

use App\Models\eps;
use App\Models\instructores;
use App\Models\rolesadministrativos;
use App\Models\tiposdocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;

class InstructoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $instructores = instructores::with('tiposdocumentos', 'eps', 'rolesadministrativos')->get();

        return view('instructores.index', compact('instructores'));

        //Otra forma:
        /*$instructores = Instructores::all();
        return view('Instructores.index.blade', compact('instructores'));*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiposDocumentos = tiposdocumentos::all();
        $eps = eps::all();
        $rolesAdministrativos = rolesadministrativos::all();

        return view('Instructores.create', compact('tiposDocumentos', 'eps', 'rolesAdministrativos'));
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
            'tblrolesadministrativos_NIS'=>'required|exists:tblrolesadministrativos,NIS'
        ]);
        //dd($request->all());

        if ($v->fails()){
            return back()->withErrors($v)->withInput();
        }

        instructores::create([
            'tbltiposdocumentos_NIS' => $request->tbltiposdocumentos_NIS,
            'NumDoc'=>$request->NumDoc,
            'Nombres'=>$request->Nombres,
            'Apellidos'=>$request->Apellidos,
            'Direccion'=>$request->Direccion,
            'Telefono'=>$request->Telefono,
            'CorreoInstitucional'=>$request->CorreoInstitucional,
            'CorreoPersonal'=>$request->CorreoPersonal,
            'Sexo'=>$request->Sexo,
            'FechaNac'=>$request->FechaNac,
            'tbleps_NIS'=>$request->tbleps_NIS,
            'tblrolesadministrativos_NIS'=>$request->tblrolesadministrativos_NIS
        ]);
        //$successMsg="Aprendiz registrado correctamente";
        //Alert::success('Aprendices registrado correctamente');

        return redirect()->route('instructores.create')->with('success', 'Instructor registrado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $NIS)
    {
        $insructores = instructores::with([ 'tiposdocumentos', 'eps','rolesadministrativos'])
            ->find($NIS);

        if (!$insructores) {
            return redirect()->route('instructores.index')
                ->with('error', 'El NIS no existe');
        }

        return view('Instructores.show', compact('insructores'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $NIS)
    {
        $instructores = instructores::find($NIS);

        if (!$instructores) {
            return redirect()->route('instructores.index')
                ->with('error', 'El ID no existe');
        }

        $tiposDocumentos = tiposdocumentos::all();
        $eps = eps::all();
        $rolesAdministrativos = rolesadministrativos::all();

        return view('Instructores.edit', compact('instructores', 'tiposDocumentos', 'eps', 'rolesAdministrativos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $NIS)
    {
        $instructores = instructores::find($NIS);

        if (!$instructores) {
            return redirect()->route('instructores.index')
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
            'tbleps_NIS'=>'required',
            'tblrolesadministrativos_NIS'=>'required'
        ]);

        $instructores->update($request->all());

        return redirect()->route('instructores.index')
            ->with('success', 'Datos del instructor actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $NIS)
    {
        $instructores = instructores::find($NIS);

        if (!$instructores) {
            return redirect()->route('instructores.index')
                ->with('error', 'El NIS no existe');
        }

        $instructores->delete();

        return redirect()->route('instructores.index')
            ->with('success', 'El instructor se ha eliminado correctamente');
    }
}
