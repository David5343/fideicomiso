<?php

namespace App\Http\Controllers\Humanos;

use App\Http\Controllers\Controller;
use App\Models\Humanos\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('can:humanos.categorias.index');
        //$this->middleware('subscribed')->except('store');
    }
    public function index()
    {
        return view('humanos.categorias.index');
    }
    public function edit(string $id)
    {
        $row = Category::find($id);
        return view('humanos/categorias/edit', ['categoria' => $row]);
    }
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nombre' => ['required','min:5','max:50','unique:categories,name,'.$id],
            'sueldo' => ['required', 'regex:/^\d{1,10}(\.\d{1,2})?$/'],
            'compensacion' => ['required', 'regex:/^\d{1,10}(\.\d{1,2})?$/'],
            'complementaria' => ['required', 'regex:/^\d{1,10}(\.\d{1,2})?$/'],
            'isr' => ['required', 'regex:/^\d{1,10}(\.\d{1,2})?$/'],
            'plazas_autorizadas' => ['required', 'numeric', 'min:1','max:51'],

        ]);
        $row = Category::find($id);
        //Haciendo calculos de sueldo bruto y sueldo neto
        if($request->input('sueldo') !== 0||$request->input('compensacion') !== 0||$request->input('complementaria') !== 0)
        {
            $sueldo_bruto = $request->input('sueldo') + $request->input('compensacion') + $request->input('complementaria');
            $row->gross_salary = $sueldo_bruto;
            if($request->input('isr') !== 0)
            {
                $sueldo_neto = $sueldo_bruto - $request->input('isr');
                $row->net_salary = $sueldo_neto;
            }
        }
        $row->name = $request->input('nombre');
        $row->salary = $request->input('sueldo');
        $row->compensation = $request->input('compensacion');
        $row->complementary = $request->input('complementaria');
        $row->isr = $request->input('isr');
        $row->authorized_places = $request->input('plazas_autorizadas');
        $row->status = 'active';
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('msg_tipo','success');
        session()->flash('msg','Registro actualizado con éxito!'); 
        return to_route('humanos.categorias.index');
    }
    public function destroy(string $id)
    {
        $row = Category::find($id);
        $row->status = 'inactive';
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('status', 'Registro deshabilitado con éxito!');
        return to_route('humanos.categorias.index');
    }
}
