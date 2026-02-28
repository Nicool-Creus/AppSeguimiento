<?php

namespace App\Http\Controllers;

use App\Models\regionales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegionalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $regionales = DB::table('tblregionales')
            ->GET();

        return view('Regionales.index', compact('regionales'));

        /*$regionales = Regionales::all();
        return view('Regionales.index.blade', compact('regionales'));*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Regionales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $v=validator::make($request->all(),[
            'Codigo'=>['required'],
            'Denominacion'=>['required'],
        ]);

        if ($v->fails()){
            return back()->withErrors($v)->withInput();
        }

        $input=$request->all();
        $input['Codigo']=$input['Codigo'];
        $input['Denominacion']=$input['Denominacion'];
        $input['Observaciones']=$input['Observaciones'];

        regionales::create($input);

        return redirect()->route('regionales.index')->with('success', 'Regional registrada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $NIS)
    {
        $regionales = regionales::find($NIS);

        if (!$regionales) {
            return redirect()->route('regionales.index')
                ->with('error', 'El NIS no existe');
        }

        return view('Regionales.show', compact('regionales'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $NIS)
    {
        $regionales = regionales::find($NIS);

        if (!$regionales) {
            return redirect()->route('regionales.index')
                ->with('error', 'El NIS no existe');
        }

        return view('Regionales.edit', compact('regionales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $NIS)
    {
        $regionales = regionales::find($NIS);

        $request->validate([
            'Codigo'=>'required',
            'Denominacion'=>'required',
        ]);

        $regionales->update($request->all());

        return redirect()->route('regionales.index')
            ->with('success', 'Datos de la regional actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $NIS)
    {
        $regionales = regionales::find($NIS);
        $regionales->delete();

        return redirect()->route('regionales.index')
            ->with('success', 'La regional se ha eliminado correctamente');
    }
}
