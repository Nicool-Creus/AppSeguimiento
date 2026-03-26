<?php

namespace App\Http\Controllers;

use App\Models\centrosdeformacion;
use App\Models\regionales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CentrosDeFormacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $centrosDeFormacion = CentrosDeFormacion::with('regionales')->get();

        return view('Centros_de_formacion.index', compact('centrosDeFormacion'));

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
            'tblregionales_NIS'=>'required|exists:tblregionales,NIS'
        ]);
        //dd($request->all());

        if ($v->fails()){
            return back()->withErrors($v)->withInput();
        }

        centrosdeformacion::create([
            'Codigo' => $request->Codigo,
            'Denominacion' => $request->Denominacion,
            'Direccion' => $request->Direccion,
            'Observaciones' => $request->Observaciones,
            'tblregionales_NIS'=>$request->tblregionales_NIS
        ]);

        return redirect()->route('centroFormacion.create')->with('success', 'Centro registrado exitosamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(int $NIS)
    {
        $centrosDeFormacion = centrosdeformacion::with(['regionales'])
            ->find($NIS);

        if (!$centrosDeFormacion) {
            return redirect()->route('centrosFormacion.index')
                ->with('error', 'El NIS no existe');
        }

        return view('Centros_de_formacion.show', compact('centrosDeFormacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $NIS)
    {
        $centrosDeFormacion = centrosdeformacion::find($NIS);

        if (!$centrosDeFormacion) {
            return redirect()->route('centroFormacion.index')
                ->with('error', 'El NIS no existe');
        }

        $regionales = regionales::all();

        return view('Centros_de_formacion.edit', compact('centrosDeFormacion', 'regionales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $NIS)
    {
        $centrosDeFormacion = centrosdeformacion::find($NIS);

        if (!$centrosDeFormacion) {
            return redirect()->route('centroFormacion.index')
                ->with('error', 'El NIS no existe');
        }

        $request->validate([
            'Codigo'=>'required',
            'Denominacion'=>'required',
            'Direccion'=>'required',
            'tblregionales_NIS'=>'required|exists:tblregionales,NIS'
        ]);

        $centrosDeFormacion->update($request->all());

        return redirect()->route('centroFormacion.index')
            ->with('success', 'Datos del centro actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $NIS)
    {
        $centrosDeFormacion = centrosdeformacion::find($NIS);

        if (!$centrosDeFormacion) {
            return redirect()->route('centroFormacion.index')
                ->with('error', 'El NIS no existe');
        }

        $centrosDeFormacion->delete();

        return redirect()->route('centroFormacion.index')
            ->with('success', 'El centro se ha eliminado correctamente');
    }
}
