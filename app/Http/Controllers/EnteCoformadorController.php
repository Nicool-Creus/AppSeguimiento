<?php

namespace App\Http\Controllers;

use App\Models\entecoformador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EnteCoformadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $enteCoformador = DB::table('tblentecoformadores')
            ->GET();

        return view('Ente_coformador.index', compact('enteCoformador'));

        //Otra forma:
        /*$enteCoformador = enteCoformador::all();
        return view('Ente_coformador.index.blade', compact('enteCoformador'));*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Ente_coformador.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $v=validator::make($request->all(),[
            'TipoDoc'=>['required'],
            'NumDoc'=>['required'],
            'RazonSocial'=>['required'],
            'Direccion'=>['required'],
            'Telefono'=>['required'],
            'CorreoInstitucional'=>['required', 'email'],
        ]);

        if ($v->fails()){
            return back()->withErrors($v)->withInput();
        }

        $input=$request->all();
        $input['TipoDoc']=$input['TipoDoc'];
        $input['NumDoc']=$input['NumDoc'];
        $input['RazonSocial']=$input['RazonSocial'];
        $input['Direccion']=bcrypt($input['Direccion']);
        $input['Telefono']=$input['Telefono'];
        $input['CorreoInstitucional']=$input['CorreoInstitucional'];

        entecoformador::create($input);

        return redirect()->route('enteCoformador.index.index')->with('success', 'Ente coformador registrado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $NIS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $NIS)
    {
        $enteCoformador = entecoformador::find($NIS);

        if (!$enteCoformador) {
            return redirect()->route('enteCoformador.index')
                ->with('error', 'El ID no existe');
        }

        return view('Ente_coformador.edit', compact('enteCoformador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $NIS)
    {
        $enteCoformador = entecoformador::find($NIS);

        $request->validate([
            'TipoDoc'=>'required',
            'NumDoc'=>'required',
            'RazonSocial'=>'required',
            'Direccion'=>'required',
            'Telefono'=>'required',
            'CorreoInstitucional'=>'required',
        ]);

        $enteCoformador->update($request->all());

        return redirect()->route('enteCoformador.index')
            ->with('success', 'Datos del ente coformador actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $NIS)
    {
        $enteCoformador = entecoformador::find($NIS);
        $enteCoformador->delete();

        return redirect()->route('enteCoformador.index')
            ->with('success', 'El ente coformador se ha eliminado correctamente');
    }
}
