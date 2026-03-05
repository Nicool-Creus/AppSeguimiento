<?php

namespace App\Http\Controllers;

use App\Models\bitacoras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;

class BitacorasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bitacoras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validarBitacora=validator::make($request->all(),[
            'Archivo'=>['required'],]);

        //Crear el nombre del archivo
        $archivo = 'bitacora'.time().'.'.$request->file('archivo')->extension();

        //Guardar el archivo
        $request->file('archivo')->move(public_path('/uploads/aprendices/'), $archivo);

        $bitacora = new bitacoras();
        $bitacora->Archivo = $archivo;
        $bitacora->Estado = 'Creada';
        $bitacora->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(int $NIS)
    {
        $bitacoras = Bitacoras::with(['usuarios'])
            ->find($NIS);

        return view('bitacoras.show', compact('bitacoras'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
