<?php

namespace App\Http\Controllers;

use App\Models\regionales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $regionales = DB::table('tblregionales')
            ->GET();

        return view('Regionales.index.blade', compact('regionales'));

        /*$regionales = Regionales::all();
        return view('Regionales.index.blade', compact('regionales'));*/
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
