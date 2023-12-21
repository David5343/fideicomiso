<?php

namespace App\Http\Controllers\Humanos;

use App\Http\Controllers\Controller;
use App\Models\Humanos\County;
use App\Models\Humanos\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountyController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('can:humanos.municipios.index');
        //$this->middleware('subscribed')->except('store');
    }
    public function index()
    {
        return view('humanos.municipios.index');
    }
    public function edit(string $id)
    {
        $row = County::find($id);
        $select = State::where('status','active')->get();
        return view('humanos/municipios/edit', ['municipio' => $row,'select'=>$select]);
    }
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nombre' => ['required','min:3','max:50','unique:counties,name,'.$id],
            'estado_id' => ['required'],

        ]);
        $row = County::find($id);
        $row->name = $request->input('nombre');
        $row->state_id = $request->input('estado_id');
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('status', 'Registro actualizado con éxito!');
        return to_route('humanos.municipios.index');
    }
    public function destroy(string $id)
    {
        $row = County::find($id);
        $row->status = 'inactive';
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('status', 'Registro deshabilitado con éxito!');
        return to_route('humanos.municipios.index');
    }
}
