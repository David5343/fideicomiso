<?php

namespace App\Http\Controllers\Humanos;

use App\Http\Controllers\Controller;
use App\Models\Humanos\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facedes\Storage;

class SliderController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('can:humanos.areas.index');
        //$this->middleware('subscribed')->except('store');
    }
    public function index(){
        $lista = Slider::all();
        return view('humanos.slider.index',['lista'=>$lista]);
    }
    public function create(){

        return view('humanos.slider.create');
    }
    public function edit(string $id)
    {
        $row = Slider::find($id);
        return view('humanos/slider/edit', ['slider' => $row]);
    }
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'posicion' => ['required'],
            'titulo' => ['required','max:50'],
            'texto' => ['required','max:150'],
            'imagen' => ['required','image','max:512','dimensions:min_width=1600,min_height=700'],
        ]);
        dump($validated);
        exit();
        $row = Slider::find($id);
        $row->name = $request->input('nombre');
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('status', 'Registro actualizado con éxito!');
        return to_route('humanos.areas.index');
    }
}
