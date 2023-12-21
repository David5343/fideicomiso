<?php

namespace App\Http\Controllers\Humanos;

use App\Http\Controllers\Controller;
use App\Models\Humanos\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('can:humanos.bancos.index');
        //$this->middleware('subscribed')->except('store');
    }
    public function index()
    {
        return view('humanos.bancos.index');
    }
    public function edit(string $id)
    {
        $row = Bank::find($id);
        return view('humanos/bancos/edit', ['banco' => $row]);
    }
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'clave' => ['required','min:3','max:5','unique:banks,key,'.$id],
            'nombre' => ['required','min:2','max:40'],
            'razon_social' => ['required','min:5','max:120'],

        ]);
        $row = Bank::find($id);
        $row->key = $request->input('clave');
        $row->name = $request->input('nombre');
        $row->legal_name = $request->input('razon_social');
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('status', 'Registro actualizado con éxito!');
        return to_route('humanos.bancos.index');
    }
    public function destroy(string $id)
    {
        $row = Bank::find($id);
        $row->status = 'inactive';
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('status', 'Registro deshabilitado con éxito!');
        return to_route('humanos.bancos.index');
    }
}
