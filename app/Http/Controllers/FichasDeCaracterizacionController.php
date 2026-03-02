<?php

namespace App\Http\Controllers;

use App\Models\aprendices;
use App\Models\centrosdeformacion;
use App\Models\programasdeformacion;
use App\Models\fichasdecaracterizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FichasDeCaracterizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fichasDeCaracterizacion = fichasdecaracterizacion::with('aprendiz', 'centrosdeformacion', 'programasdeformacion')->get();

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
        $aprendices = aprendices::all();
        $centrosDeFormacion = centrosDeFormacion::all();
        $programas = programasdeformacion::all();

        return view('Fichas_de_caracterizacion.create', compact('aprendices', 'centrosDeFormacion','programas'));

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
            'tblaprendices_NIS'=>'required|exists:tblaprendices,NIS',
            'tblcentrosdeformacion_NIS'=>'required|exists:tblcentrosdeformacion,NIS',
            'tblprogramasdeformacion_NIS'=>'required|exists:tblprogramasdeformacion,NIS'
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
        $input['tblaprendices_NIS']=$input['tblaprendices_NIS'];
        $input['tblcentrosdeformacion_NIS']=$input['tblcentrosdeformacion_NIS'];
        $input['tblprogramasdeformacion_NIS']=$input['tblprogramasdeformacion_NIS'];

        fichasdecaracterizacion::create($input);

        return redirect()->route('fichasCaracterizacion.create')->with('success', 'Ficha registrada exitosamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(int $NIS)
    {
        $fichasDeCaracterizacion = fichasdecaracterizacion::with(['aprendiz', 'centrosdeformacion', 'programasdeformacion'])
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
    public function edit(int $NIS)
    {
        $fichasDeCaracterizacion = fichasdecaracterizacion::find($NIS);

        if (!$fichasDeCaracterizacion) {
            return redirect()->route('fichasCaracterizacion.index')
                ->with('error', 'El NIS no existe');
        }

        $aprendices = aprendices::all();
        $centrosDeFormacion = centrosdeformacion::all();
        $programas = programasdeformacion::all();

        return view('Fichas_de_caracterizacion.edit', compact('fichasDeCaracterizacion', 'aprendices', 'centrosDeFormacion', 'programas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $NIS)
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
            'tblaprendices_NIS'=>'required|exists:tblaprendices,NIS',
            'tblcentrosdeformacion_NIS'=>'required|exists:tblcentrosdeformacion,NIS',
            'tblprogramasdeformacion_NIS'=>'required|exists:tblprogramasdeformacion,NIS'
        ]);

        $fichasDeCaracterizacion->update($request->all());

        return redirect()->route('fichasCaracterizacion.index')
            ->with('success', 'Datos de la ficha actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $NIS)
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
