<?php

namespace App\Http\Controllers\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Humanos\Bank;
use App\Models\Prestaciones\UserFamily;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserFamilyController extends Controller
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
        $row = UserFamily::find($id);
        return view('prestaciones.familiares.show',['familiar' => $row]);
        
    }
    public function edit(string $id)
    {
        $row = UserFamily::find($id);
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
        $row = UserFamily::find($id);
        $row->start_date = $request->input('fecha_ingreso');
        $row->last_name_1 = Str::of($request->input('apaterno'))->trim();
        $row->last_name_2 = Str::of($request->input('amaterno'))->trim();
        $row->name = Str::of($request->input('nombre'))->trim();
        $row->birthday = $request->input('fecha_nacimiento');
        $row->sex = $request->input('sexo');
        
        $row->rfc = $request->input('rfc');
        $row->curp = $request->input('curp');
        $row->disabled_person = $request->input('persona_discapacitada');
        $row->relationship = $request->input('parentesco');
        $row->address = $request->input('direccion');
        $row->observations = $request->input('observaciones');
        $row->account_number = $request->input('name');
        $row->clabe = $request->input('clabe');
        $row->bank_id = $request->input('banco_id');
        $row->representative_name = $request->input('nombre_representante');
        $row->representative_rfc = $request->input('rfc_representante');
        $row->representative_curp = $request->input('curp_representante');
        $row->representative_relationship = $request->input('parentesco_representante');
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Registro actualizado con éxito!');
        return to_route('prestaciones.familiares.index');
    }
}
