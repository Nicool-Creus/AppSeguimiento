<?php

namespace App\Http\Controllers;

use App\Models\aprendices;
use App\Models\eps;
use App\Models\tiposdocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;

class AprendicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aprendices = Aprendices::with(['tiposDocumentos', 'eps'])->get();

        return view('Aprendices.index', compact('aprendices'));

        //Otra forma:
        /*$aprendices = Aprendices::all();
        return view('Aprendices.index.blade', compact('aprendices'));*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
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

        aprendices::create($input);
        //$successMsg="Aprendiz registrado correctamente";
        //Alert::success('Aprendices registrado correctamente');

        return redirect()->route('aprendices.create')->with('success', 'Aprendiz registrado exitosamente');
    }


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
    public function edit(int $NIS)
    {
        $aprendices = aprendices::find($NIS);

        if (!$aprendices) {
            return redirect()->route('aprendices.index')
                ->with('error', 'El NIS no existe');
        }

        $tiposDocumentos = tiposdocumentos::all();
        $eps = eps::all();

        return view('Aprendices.edit', compact('aprendices', 'tiposDocumentos', 'eps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $NIS)
    {
        $aprendices = aprendices::find($NIS);

        if (!$aprendices) {
            return redirect()->route('aprendices.index')
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

        $aprendices->update($request->all());

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
