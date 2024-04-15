<?php

namespace App\Http\Controllers\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('prestaciones.categorias.index');
    }
    public function edit(string $id)
    {
        $row = Category::find($id);
        return view('prestaciones.categorias.edit', ['categoria' => $row]);
    }
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'max:50', 'unique:rank,name,' . $id],
        ]);
        $row = Category::find($id);
        $row->name = $request->input('nombre');
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Registro actualizado con éxito!');
        return to_route('prestaciones.categorias.index');
    }
    public function destroy(string $id)
    {
        $row = Category::find($id);
        $row->status = 'inactive';
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Registro deshabilitado con éxito!');
        return to_route('prestaciones.categorias.index');
    }
}
