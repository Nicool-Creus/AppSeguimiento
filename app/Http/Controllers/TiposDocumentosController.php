<?php

namespace App\Http\Controllers;

use App\Models\tiposdocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TiposDocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tiposDocumentos = DB::table('tbltiposdocumentos')
            ->GET();

        return view('Tipos_documentos.index.blade', compact('tiposDocumentos'));
        //Otra forma:
        /*$tiposDocumentos = TiposDocumentos::all();
        return view('TiposDocumentos.index.blade', compact('tiposDocumentos'));*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
