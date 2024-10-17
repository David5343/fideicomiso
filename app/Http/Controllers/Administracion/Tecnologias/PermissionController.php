<?php

namespace App\Http\Controllers\Administracion\Tecnologias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {

        $this->middleware('can:administracion.tecnologias.permisos.index');

    }

    public function index()
    {
        return view('administracion.tecnologias.permisos.index');
    }

    public function edit(string $id)
    {
        $row = Permission::find($id);

        return view('administracion.tecnologias.permisos.edit', ['row' => $row]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'max:50', 'unique:permissions,name,'.$id],
        ]);
        $row = Permission::find($id);
        $row->name = $request->input('nombre');
        $row->save();
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Registro actualizado con éxito!');

        return to_route('administracion.tecnologias.permisos.index');
    }

    public function destroy(string $id)
    {
        $row = Permission::find($id);
        $row->modified_by = Auth::user()->email;
        $row->delete();
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Registro eliminado con éxito!');

        return to_route('administracion.tecnologias.permisos.index');
    }
}
