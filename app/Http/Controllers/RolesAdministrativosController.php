<?php

namespace App\Http\Controllers;

use App\Models\rolesadministrativos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RolesAdministrativosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $rolesAdministrativos = DB::table('tblrolesadministrativos')
            ->GET();

        return view('Roles_administrativos.index', compact('rolesAdministrativos'));

        //Otra forma:
        /*$rolesAdministrativos = RolesAdministrativos::all();
        return view('Roles_administrativos.index.blade', compact('rolesAdministrativos'));*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Roles_administrativos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $v=validator::make($request->all(),[
            'Descripcion'=>['required'],

        ]);

        if ($v->fails()){
            return back()->withErrors($v)->withInput();
        }

        $input=$request->all();
        $input['Descripcion']=$input['Descripcion'];

        rolesadministrativos::create($input);

        return redirect()->route('rolesAdministrativos.index')->with('success', 'Rol registrado exitosamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $NIS)
    {
        $rolesAdministrativos = rolesadministrativos::find($NIS);

        if (!$rolesAdministrativos) {
            return redirect()->route('rolesAdministrativos.index')
                ->with('error', 'El NIS no existe');
        }

        return view('Roles_administrativos.show', compact('rolesAdministrativos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $NIS)
    {
        $rolesAdministrativos = rolesadministrativos::find($NIS);

        if (!$rolesAdministrativos) {
            return redirect()->route('rolesAdministrativos.index')
                ->with('error', 'El NIS no existe');
        }

        return view('Roles_administrativos.edit', compact('rolesAdministrativos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $NIS)
    {
        $rolesAdministrativos = rolesadministrativos::find($NIS);

        $request->validate([
            'Descripcion'=>'required',
        ]);

        $rolesAdministrativos->update($request->all());

        return redirect()->route('rolesAdministrativos.index')
            ->with('success', 'Rol actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $NIS)
    {
        $rolesAdministrativos = rolesadministrativos::find($NIS);
        $rolesAdministrativos->delete();

        return redirect()->route('rolesAdministrativos.index')
            ->with('success', 'El rol se ha eliminado correctamente');
    }
}
