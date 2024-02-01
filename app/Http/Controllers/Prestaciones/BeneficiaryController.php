<?php

namespace App\Http\Controllers\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Humanos\Bank;
use App\Models\Prestaciones\Beneficiary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BeneficiaryController extends Controller
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
        $row = Beneficiary::find($id);
        return view('prestaciones.familiares.show',['familiar' => $row]);
        
    }
    public function edit(string $id)
    {
        $row = Beneficiary::find($id);
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
            'rfc' => ['nullable','max:13','alpha_num:ascii','unique:beneficiaries,rfc,'. $id],
            'curp' => ['required','max:18','alpha_num:ascii','unique:beneficiaries,curp,'. $id],
            'persona_discapacitada' => ['required'],
            'parentesco' =>['required'],
            'direccion' =>['required','max:100'],
            'observaciones' =>['nullable','max:150'], 
            'num_cuenta' => ['nullable','numeric','max:10'],
            'clabe' => ['nullable','numeric','max:18'],
            'banco_id' => ['nullable'],
            'nombre_representante' =>['nullable','max:40'],
            'rfc_representante' =>['nullable','max:13','alpha_num:ascii'],
            'curp_representante' =>['nullable','max:18','alpha_num:ascii'],
            'parentesco_representante' =>['nullable'],
        ]);
        $row = Beneficiary::find($id);
        $row->start_date = $request->input('fecha_ingreso');
        $row->last_name_1 = Str::of($request->input('apaterno'))->trim();
        $row->last_name_2 = Str::of($request->input('amaterno'))->trim();
        $row->name = Str::of($request->input('nombre'))->trim();
        $row->birthday = $request->input('fecha_nacimiento');
        $row->sex = $request->input('sexo');
        $rfc = Str::of($request->input('rfc'))->trim();
        $row->rfc = Str::upper($rfc);
        $curp = Str::of($request->input('curp'))->trim();
        $row->curp = Str::upper($curp);
        $row->disabled_person = $request->input('persona_discapacitada');
        $row->relationship = $request->input('parentesco');
        $row->address = Str::of($request->input('direccion'))->trim();
        $row->observations = Str::of($request->input('observaciones'))->trim();
        $row->account_number = Str::of($request->input('name'))->trim();
        $row->clabe = Str::of($request->input('clabe'))->trim();
        $row->bank_id = $request->input('banco_id');
        $row->representative_name = Str::of($request->input('nombre_representante'))->trim();
        $row->representative_rfc = Str::of($request->input('rfc_representante'))->trim();
        $row->representative_curp = Str::of($request->input('curp_representante'))->trim();
        $row->representative_relationship = Str::of($request->input('parentesco_representante'))->trim();
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Registro actualizado con éxito!');
        return to_route('prestaciones.familiares.index');
    }
}
