<?php

namespace App\Http\Controllers\Humanos;

use App\Http\Controllers\Controller;
use App\Models\Humanos\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AreaController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['role:Admin','permission:humanos.areas.index|humanos.areas.edit|humanos.areas.update|humanos.areas.destroy']);
        //$this->middleware(['role_or_permission:Admin|humanos.areas.index']);
        //$this->middleware('auth');
        $this->middleware('can:humanos.areas.index');
        //$this->middleware('subscribed')->except('store');
    }

    public function index()
    {
        return view('humanos.areas.index');
    }

    public function edit(string $id)
    {
        $row = Area::find($id);

        return view('humanos/areas/edit', ['area' => $row]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'max:50', 'unique:areas,name,'.$id],
        ]);
        $row = Area::find($id);
        $row->name = $request->input('nombre');
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('status', 'Registro actualizado con éxito!');

        return to_route('humanos.areas.index');
    }

    public function destroy(string $id)
    {
        $row = Area::find($id);
        $row->status = 'inactive';
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('status', 'Registro deshabilitado con éxito!');

        return to_route('humanos.areas.index');
    }
}
