<?php

namespace App\Http\Controllers\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\Dependency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DependencyController extends Controller
{
    public function index()
    {
        return view('prestaciones.dependencias.index');
    }
    public function edit(string $id)
    {
        $row = Dependency::find($id);
        return view('prestaciones/dependencias/edit', ['dependencia' => $row]);
    }
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'max:50', 'unique:dependencies,name,' . $id],
        ]);
        $row = Dependency::find($id);
        $row->name = $request->input('nombre');
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('status', 'Registro actualizado con éxito!');
        return to_route('prestaciones.dependencias.index');
    }
}
