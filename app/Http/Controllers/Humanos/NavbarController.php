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
            'texto' => ['required', 'unique:areas,nombre', 'min:5', 'max:50'],
            'size' => ['required', 'unique:areas,nombre', 'min:5', 'max:50'],
        ]);
        $area = new Navbar();
        $area->nombre = $request->input('nombre');
        $area->estatus = 'activo';
        $area->modificado_por = Auth::user()->email;
        $area->save();
    }
}
