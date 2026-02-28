<?php

namespace App\Http\Controllers;

use App\Models\centrosdeformacion;
use App\Models\regionales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CentrosDeFormacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $centrosDeFormacion = DB::table('tblcentrosdeformacion')
            ->GET();

        return view('Centros_de_formacion.index.blade', compact('centrosDeFormacion'));

        //Otra forma:
        /*$centrosDeFormacion = CentrosDeFormacion::all();
        return view('Centros_de_formacion.index.blade', compact('centrosDeFormacion'));*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regionales = regionales::all();

        return view('Centros_de_formacion.create', compact('regionales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $v=validator::make($request->all(),[
            'Codigo'=>['required'],
            'Denominacion'=>['required'],
            'Direccion'=>['required'],
        ]);
        //dd($request->all());

        if ($v->fails()){
            return back()->withErrors($v)->withInput();
        }

        $input=$request->all();
        $input['Codigo']=$input['Codigo'];
        $input['Denominacion']=$input['Denominacion'];
        $input['Direccion']=$input['Direccion'];
        $input['Observaciones']=$input['Observaciones'];

        centrosdeformacion::create($input);

        return redirect()->route('centrosFormacion.create')->with('success', 'Centro registrado exitosamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $NIS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $NIS)
    {
        $centrosDeFormacion = centrosdeformacion::find($NIS);

        if (!$centrosDeFormacion) {
            return redirect()->route('centrosFormacion.index')
                ->with('error', 'El NIS no existe');
        }

        $regionales = regionales::find($NIS);

        return view('Centros_de_formacion.edit', compact('centrosDeFormacion', 'regionales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $NIS)
    {
        $centrosDeFormacion = centrosdeformacion::find($NIS);

        if (!$centrosDeFormacion) {
            return redirect()->route('centrosFormacion.index')
                ->with('error', 'El NIS no existe');
        }

        $request->validate([
            'Codigo'=>'required',
            'Denominacion'=>'required',
            'Direccion'=>'required',
            'Observaciones'=>'required',
        ]);

        $centrosDeFormacion->update($request->all());

        return redirect()->route('centrosFormacion.index')
            ->with('success', 'Datos del centro actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $NIS)
    {
        $centrosDeFormacion = centrosdeformacion::find($NIS);

        if (!$centrosDeFormacion) {
            return redirect()->route('centrosFormacion.index')
                ->with('error', 'El NIS no existe');
        }

        $centrosDeFormacion->delete();

        return redirect()->route('centrosFormacion.index')
            ->with('success', 'El centro se ha eliminado correctamente');
    }
}
