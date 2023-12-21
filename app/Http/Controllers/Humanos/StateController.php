<?php

namespace App\Http\Controllers\Humanos;

use App\Http\Controllers\Controller;
use App\Models\Humanos\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StateController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('can:humanos.estados.index');
        //$this->middleware('subscribed')->except('store');
    }
    public function index()
    {
        return view('humanos.estados.index');
    }
    public function edit(string $id)
    {
        $row = State::find($id);
        return view('humanos/estados/edit', ['estado' => $row]);
    }
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'clave' => ['required','min:3','max:5','unique:states,key,'.$id],
            'nombre' => ['required','min:2','max:40'],

        ]);
        $row = State::find($id);
        $row->key = $request->input('clave');
        $row->name = $request->input('nombre');
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('status', 'Registro actualizado con éxito!');
        return to_route('humanos.estados.index');
    }
    public function destroy(string $id)
    {
        $row = State::find($id);
        $row->status = 'inactive';
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('status', 'Registro deshabilitado con éxito!');
        return to_route('humanos.estados.index');
    }
}
