<?php

namespace App\Http\Controllers;

use App\Models\programasdeformacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProgramasDeFormacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $programas = DB::table('tblprogramasdeformacion')
            ->GET();

        return view('Programas.index', compact('programas'));

        //Otra forma:
        /*$programas = ProgramasDeFormacion::all();
        return view('Programas.index.blade', compact('programas'));*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Programas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $v=validator::make($request->all(),[
            'Codigo'=>['required'],
            'Denominacion'=>['required'],
            'Observaciones'=>['required'],
        ]);
        //dd($request->all());

        if ($v->fails()){
            return back()->withErrors($v)->withInput();
        }

        $input=$request->all();
        $input['Codigo']=$input['Codigo'];
        $input['Denominacion']=$input['Denominacion'];
        $input['Observaciones']=$input['Observaciones'];

        programasdeformacion::create($input);

        return redirect()->route('programas.create')->with('success', 'Programa registrado exitosamente');

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
        $programas = programasdeformacion::find($NIS);

        return view('programas.edit', compact('programas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $NIS)
    {
        $programas = programasdeformacion::find($NIS);

        if (!$programas) {
            return redirect()->route('programas.index')
                ->with('error', 'El NIS no existe');
        }

        $request->validate([
            'Codigo'=>'required',
            'Denominacion'=>'required',
            'Observaciones'=>'required',
        ]);

        $programas->update($request->all());

        return redirect()->route('programas.index')
            ->with('success', 'Datos del programa actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $NIS)
    {
        $programas = programasdeformacion::find($NIS);

        $programas->delete();

        return redirect()->route('programas.index')
            ->with('success', 'El programa se ha eliminado correctamente');
    }
}
