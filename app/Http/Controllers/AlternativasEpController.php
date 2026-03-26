<?php

namespace App\Http\Controllers;

use App\Models\alternativasep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AlternativasEpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $alternativas = DB::table('tblalternativasep')
            ->GET();

        return view('Alternativas_ep.index', compact('alternativas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Alternativas_ep.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $v=validator::make($request->all(),[
            'TipoAlternativa'=>['required']
        ]);

        if ($v->fails()){
            return back()->withErrors($v)->withInput();
        }

        alternativasep::create([
            'TipoAlternativa' => $request->TipoAlternativa
        ]);

        return redirect()->route('alternativasEp.create')->with('success', 'Alternativa registrada exitosamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(int $NIS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $NIS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $NIS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $NIS)
    {
        $alternativas = alternativasep::find($NIS);
        $alternativas->delete();

        return redirect()->route('alternativasEp.index')
            ->with('success', 'La alternativa se ha eliminado correctamente');
    }
}
