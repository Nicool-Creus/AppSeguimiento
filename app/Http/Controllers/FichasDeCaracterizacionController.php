<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FichasDeCaracterizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $fichasDeCaracterizacion= DB::table('tblfichasdecaracterizacion')
            ->GET();

        return view('Fichas_de_caracterizacion.index.blade', compact('fichasDeCaracterizacion'));

        //Otra forma:
        /*$fichasDeCaracterizacion = FichasDeCaracterizacion::all();
        return view('Fichas_de_caracterizacion.index.blade', compact('fichasDeCaracterizacion'));*/
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
