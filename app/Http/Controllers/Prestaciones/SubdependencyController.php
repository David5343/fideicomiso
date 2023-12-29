<?php

namespace App\Http\Controllers\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\Dependency;
use App\Models\Prestaciones\Subdependency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubdependencyController extends Controller
{
    public function index()
    {
        return view('prestaciones.subdependencias.index');
    }
    public function edit(string $id)
    {
        $row = Subdependency::find($id);
        $select = Dependency::where('status','active')->get();
        return view('prestaciones/subdependencias/edit', ['subdependencia' => $row,'select'=>$select]);
    }
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'max:60', 'unique:subdependencies,name,' . $id],
            'dependencia_id' =>['required']
        ]);
        $row = Subdependency::find($id);
        $row->name = $request->input('nombre');
        $row->dependency_id = $request->input('dependencia_id');
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('status', 'Registro actualizado con éxito!');
        return to_route('prestaciones.subdependencias.index');
    }
}
