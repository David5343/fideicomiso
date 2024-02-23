<?php

namespace App\Http\Controllers\Humanos;

use App\Http\Controllers\Controller;
use App\Models\Humanos\Navbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NavbarController extends Controller
{
    public function index(){
        $lista = Navbar::all();
        return view('humanos.navbar.index',['lista'=>$lista]);
    }
    public function create(){
        return view('humanos.navbar.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'texto' => ['required','max:150'],
            'size' => ['required'],
        ]);
        $count = Navbar::all();
        if($count->count() <1){
            $navbar = new Navbar();
            $navbar->text = $request->input('texto');
            $navbar->size = $request->input('size');
            $navbar->status = 'active';
            $navbar->modified_by = Auth::user()->email;
            $navbar->save();
            session()->flash('msg_tipo','success');
            session()->flash('msg','Registro guardado con éxito!');
            return to_route('humanos.navbar.index');
        }else{
            session()->flash('msg_tipo','warning');
            session()->flash('msg','Ya existe un registro para el texto en el Navbar!');
            return to_route('humanos.navbar.create');
        }

        //$this->js("alert('Registro guardado con éxito!')"); 
    }
    public function edit(string $id)
    {
        $row = Navbar::find($id);
        return view('humanos.navbar.edit', ['row' => $row]);
    }
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'texto' => ['required','max:150'],
            'size' => ['required'],
        ]);
        $row = Navbar::find($id);
        $row->text = $request->input('texto');
        $row->size = $request->input('size');
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('msg_tipo','success');
        session()->flash('msg','Registro editado con éxito!');
        return to_route('humanos.navbar.index');
    }
}
