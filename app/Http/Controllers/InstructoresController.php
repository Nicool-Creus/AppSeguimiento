<?php

namespace App\Http\Controllers;

use App\Models\eps;
use App\Models\instructores;
use App\Models\rolesadministrativos;
use App\Models\tiposdocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstructoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $instructores = DB::table('tblinstructores')
            ->GET();

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
        $eps = eps::all();
        $rolesAdministrativos = rolesadministrativos::all();
        $tiposDocumentos = tiposdocumentos::all();

        return view('Instructores.create', compact('eps', 'rolesAdministrativos', 'tiposDocumentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $v=validator::make($request->all(),[
            'TipoDoc'=>['required'],
            'NumDoc'=>['required'],
            'Nombres'=>['required'],
            'Apellidos'=>['required'],
            'Direccion'=>['required'],
            'Telefono'=>['required'],
            'CorreoInstitucional'=>['required', 'email'],
            'CorreoPersonal'=>['required', 'email'],
            'Sexo'=>['required'],
            'FechaNac'=>['required', 'date'],
        ]);
        //dd($request->all());

        if ($v->fails()){
            return back()->withErrors($v)->withInput();
        }

        $input=$request->all();
        $input['TipoDoc']=$input['TipoDoc'];
        $input['NumDoc']=$input['NumDoc'];
        $input['Nombres']=$input['Nombres'];
        $input['Apellidos']=$input['Apellidos'];
        $input['Direccion']=bcrypt($input['Direccion']);
        $input['Telefono']=$input['Telefono'];
        $input['CorreoInstitucional']=$input['CorreoInstitucional'];
        $input['CorreoPersonal']=$input['CorreoPersonal'];
        $input['Sexo']=$input['Sexo'];
        $input['FechaNac']=$input['FechaNac'];

        instructores::create($input);
        //$successMsg="Aprendiz registrado correctamente";
        //Alert::success('Aprendices registrado correctamente');

        return redirect()->route('instructores.create')->with('success', 'Instructor registrado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $NIS)
    {
        $insructores = instructores::with(['rolesadministrativos', 'tiposdocumentos'])
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
    public function edit(string $NIS)
    {
        $instructores = instructores::find($NIS);

        if (!$instructores) {
            return redirect()->route('instructores.index')
                ->with('error', 'El ID no existe');
        }

        $eps = eps::all();
        $rolesAdministrativos = rolesadministrativos::all();
        $tiposDocumentos = tiposdocumentos::all();

        return view('Instructores.edit', compact('instructores', 'eps', 'rolesAdministrativos', 'tiposDocumentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $NIS)
    {
        $instructores = instructores::find($NIS);

        if (!$instructores) {
            return redirect()->route('instructores.index')
                ->with('error', 'El NIS no existe');
        }

        $request->validate([
            'TipoDoc'=>'required',
            'NumDoc'=>'required',
            'Nombres'=>'required',
            'Apellidos'=>'required',
            'Direccion'=>'required',
            'Telefono'=>'required',
            'CorreoInstitucional'=>'required', 'email',
            'CorreoPersonal'=>'required', 'email',
            'Sexo'=>'required',
            'FechaNac'=>'required', 'date',
        ]);

        $instructores->update($request->all());

        return redirect()->route('instructores.index')
            ->with('success', 'Datos del instructor actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $NIS)
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
