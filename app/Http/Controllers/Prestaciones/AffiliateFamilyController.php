<?php

namespace App\Http\Controllers\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Humanos\Bank;
use App\Models\Prestaciones\AffiliateFamily;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffiliateFamilyController extends Controller
{
    public function index()
    {
        return view('prestaciones.familiares.index');
    }
    public function create()
    {
        return view('prestaciones.familiares.create');
    }
    public function show(string $id)
    {
        $row = AffiliateFamily::find($id);
        return view('prestaciones.familiares.show',['familiar' => $row]);
        
    }
    public function edit(string $id)
    {
        $row = AffiliateFamily::find($id);
        $select4 = Bank::where('status', 'active')->get();
        return view('prestaciones.familiares.edit',['familiar' => $row,
                                                    'select4'=>$select4]);
    }
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'expediente_hidden'=> ['required'],
            'fecha_ingreso' => ['required','date'],
            'apaterno' => ['required','max:20'],
            'amaterno' => ['required', 'max:20'],
            'nombre' => ['required','max:20'], 
            'fecha_nacimiento' => ['required','date'],
            'sexo' => ['required'],
            'rfc' => ['nullable','size:13','alpha_num:ascii','unique:affiliate_families,rfc,'. $id],
            'curp' => ['required','size:18','alpha_num:ascii','unique:affiliate_families,curp,'. $id],
            'persona_discapacitada' => ['required'],
            'parentesco' =>['required'],
            'direccion' =>['required','max:100'],
            'observaciones' =>['nullable','max:150'], 
            'num_cuenta' => ['nullable','numeric','max:10'],
            'clabe' => ['nullable','numeric','max:18'],
            'banco_id' => ['nullable'],
            'nombre_representante' =>['nullable','max:40'],
            'rfc_representante' =>['nullable','size:13','alpha_num:ascii'],
            'curp_representante' =>['nullable','size:18','alpha_num:ascii'],
            'parentesco_representante' =>['nullable'],
        ]);
        $row = AffiliateFamily::find($id);
        $row->start_date = $request->input('fecha_ingreso');
        $row->
        $row->status = 'active';
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Registro creado con éxito!');
        return to_route('prestaciones.afiliados.index');
    }
}