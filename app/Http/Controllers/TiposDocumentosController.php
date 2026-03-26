<?php

namespace App\Http\Controllers;

use App\Models\tiposdocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TiposDocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tiposDocumentos = DB::table('tbltiposdocumentos')
            ->GET();

        return view('Tipos_documentos.index', compact('tiposDocumentos'));

        //Otra forma:
        /*$tiposDocumentos = TiposDocumentos::all();
        return view('TiposDocumentos.index.blade', compact('tiposDocumentos'));*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Tipos_documentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $v=validator::make($request->all(),[
            'Denominacion'=>['required'],
        ]);

        if ($v->fails()){
            return back()->withErrors($v)->withInput();
        }

        tiposdocumentos::create([
            'Denominacion' => $request->Denominacion,
            'Observaciones'=>$request->Observaciones
        ]);

        return redirect()->route('tiposDocumentos.index')->with('success', 'Documento registrado exitosamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $NIS)
    {
        $tiposDocumentos = tiposdocumentos::find($NIS);

        if (!$tiposDocumentos) {
            return redirect()->route('tiposDocumentos.index')
                ->with('error', 'El NIS no existe');
        }

        return view('Tipos_documentos.show', compact('tiposDocumentos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $NIS)
    {
        $tiposDocumentos = tiposdocumentos::find($NIS);

        if (!$tiposDocumentos) {
            return redirect()->route('tiposDocumentos.index')
                ->with('error', 'El NIS no existe');
        }

        return view('Tipos_documentos.edit', compact('tiposDocumentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $NIS)
    {
        $tiposDocumentos = tiposdocumentos::find($NIS);

        $request->validate([
            'Denominacion'=>'required',
        ]);

        $tiposDocumentos->update($request->all());

        return redirect()->route('tiposDocumentos.index')
            ->with('success', 'Datos del documento actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $NIS)
    {
        $tiposDocumentos = tiposdocumentos::find($NIS);
        $tiposDocumentos->delete();

        return redirect()->route('tiposDocumentos.index')
            ->with('success', 'El tipo de docuemnto se ha eliminado correctamente');
    }
}
