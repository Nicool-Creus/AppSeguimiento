<?php

namespace App\Http\Controllers;

use App\Models\centrosdeformacion;
use App\Models\fichasdecaracterizacion;
use App\Models\programasdeformacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FichasDeCaracterizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $fichasDeCaracterizacion= DB::table('tblfichasdecaracterizacion')
            ->GET();

        return view('Fichas_de_caracterizacion.index', compact('fichasDeCaracterizacion'));

        //Otra forma:
        /*$fichasDeCaracterizacion = FichasDeCaracterizacion::all();
        return view('Fichas_de_caracterizacion.index.blade', compact('fichasDeCaracterizacion'));*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centrosDeFormacion = centrosDeFormacion::all();
        $programas = programasdeformacion::all();

        return view('Fichas_de_caracterizacion.create', compact('centrosDeFormacion','programas'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $v=validator::make($request->all(),[
            'Codigo'=>['required'],
            'Denominacion'=>['required'],
            'FechaInicio'=>['required'],
            'FechaFin'=>['required'],
        ]);
        //dd($request->all());

        if ($v->fails()){
            return back()->withErrors($v)->withInput();
        }

        $input=$request->all();
        $input['Codigo']=$input['Codigo'];
        $input['Denominacion']=$input['Denominacion'];
        $input['FechaInicio']=$input['FechaInicio'];
        $input['FechaFin']=$input['FechaFin'];
        $input['Observaciones']=$input['Observaciones'];

        centrosdeformacion::create($input);
        programasdeformacion::create($input);

        return redirect()->route('fichasCaracterizacion.create')->with('success', 'Ficha registrada exitosamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $NIS)
    {
        $fichasDeCaracterizacion = fichasdecaracterizacion::with(['aprendices', 'centrosDeFormacion', 'programasdeformacion'])
            ->find($NIS);

        if (!$fichasDeCaracterizacion) {
            return redirect()->route('fichasCaracterizacion.index')
                ->with('error', 'El NIS no existe');
        }

        return view('Fichas_de_caracterizacion.show', compact('fichasDeCaracterizacion'));
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

        $centrosDeFormacion = centrosdeformacion::find($NIS);
        $programas = programasdeformacion::find($NIS);

        return view('Fichas_de_caracterizacion.edit', compact('centrosDeFormacion', 'centrosDeFormacion', 'programas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $NIS)
    {
        $fichasDeCaracterizacion = fichasdecaracterizacion::find($NIS);

        if (!$fichasDeCaracterizacion) {
            return redirect()->route('fichasCaracterizacion.index')
                ->with('error', 'El NIS no existe');
        }

        $request->validate([
            'Codigo'=>'required',
            'Denominacion'=>'required',
            'Cupo'=>'required',
            'FechaInicio'=>'required',
            'FechaFin'=>'required',
            'Observaciones'=>'required',
        ]);

        $fichasDeCaracterizacion->update($request->all());

        return redirect()->route('fichasCaracterizacion.index')
            ->with('success', 'Datos de la ficha actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $NIS)
    {
        $fichasDeCaracterizacion = fichasdecaracterizacion::find($NIS);

        if (!$fichasDeCaracterizacion) {
            return redirect()->route('fichasCaracterizacion.index')
                ->with('error', 'El NIS no existe');
        }

        $fichasDeCaracterizacion->delete();

        return redirect()->route('fichasCaracterizacion.index')
            ->with('success', 'La ficha se ha eliminado correctamente');
    }
}
