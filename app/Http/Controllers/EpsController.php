<?php

namespace App\Http\Controllers;

use App\Models\eps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\validator;

class EpsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $eps = DB::table('tbleps')
            ->GET();

        return view('Eps.index', compact('eps'));

        //Otra forma:
        /*$eps = eps::all();
        return view('Eps.index.blade', compact('eps'));*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Eps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $v=validator::make($request->all(),[
            'NumDoc'=>['required'],
            'Denominacion'=>['required'],
        ]);

        if ($v->fails()){
            return back()->withErrors($v)->withInput();
        }

        eps::create([
            'NumDoc' => $request->NumDoc,
            'Denominacion'=>$request->Denominacion,
            'Observaciones'=>$request->Observaciones
        ]);

        return redirect()->route('eps.index')->with('success', 'eps registrada exitosamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $NIS)
    {
        $eps = eps::find($NIS);

        if (!$eps) {
            return redirect()->route('eps.index')
                ->with('error', 'El NIS no existe');
        }

        return view('Eps.show', compact('eps'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $NIS)
    {
        $eps = eps::find($NIS);

        if (!$eps) {
            return redirect()->route('eps.index')
                ->with('error', 'El ID no existe');
        }

        return view('Eps.edit', compact('eps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $NIS)
    {
        $eps = eps::find($NIS);

        $request->validate([
            'NumDoc'=>'required',
            'Denominacion'=>'required',
        ]);

        $eps->update($request->all());

        return redirect()->route('eps.index')
            ->with('success', 'Datos de la eps actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $NIS)
    {
        $eps = eps::find($NIS);
        $eps->delete();

        return redirect()->route('eps.index')
            ->with('success', 'La eps se ha eliminado correctamente');
    }
}
