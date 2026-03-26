<?php

namespace App\Http\Controllers;

use App\Models\alternativasep;
use App\Models\subtipoalternativa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubtipoAlternativaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subtipoAlternativa = subtipoalternativa::with('alternativas')->get();

        return view('Subtipo_alternativa.index', compact('subtipoAlternativa'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alternativas = alternativasep::all();

        return view('Subtipo_alternativa.create', compact('alternativas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $v=validator::make($request->all(),[
            'SubtipoAlternativa'=>['required'],
            'tblalternativasep_NIS'=>'required|exists:tblalternativasep,NIS',

        ]);

        if ($v->fails()){
            return back()->withErrors($v)->withInput();
        }

        subtipoalternativa::create([
            'SubtipoAlternativa' => $request->SubtipoAlternativa,
            'tblalternativasep_NIS'=>$request->tblalternativasep_NIS
        ]);

        return redirect()->route('subtipoAlternativa.create')
            ->with('success', 'Subtipo registrado exitosamente');
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
    public function destroy(int $NIS)
    {
        $subtipoAlternativa = subtipoalternativa::find($NIS);

        if (!$subtipoAlternativa) {
            return redirect()->route('subtipoAlternativa.index')
                ->with('error', 'El NIS no existe');
        }

        $subtipoAlternativa->delete();

        return redirect()->route('subtipoAlternativa.index')
            ->with('success', 'El subtipo se ha eliminado correctamente');

    }
}
