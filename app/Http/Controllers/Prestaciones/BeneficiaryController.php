<?php

namespace App\Http\Controllers\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Humanos\Bank;
use App\Models\Prestaciones\Beneficiary;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
        if($row->start_date != null){
            $fecha_ingreso =Carbon::parse($row->start_date);
            $row->start_date = $fecha_ingreso->format('d-m-Y');
        }
        if($row->birthday != null){
            $fecha_nacimiento =Carbon::parse($row->birthday);
            $row->birthday = $fecha_nacimiento->format('d-m-Y');
        }
        if($row->inactive_date != null){
            $baja_sistema = Carbon::parse($row->inactive_date);
            $row->inactive_date = $baja_sistema->format('d-m-Y');
        }       
        if($row->reentry_date != null){
            $reingreso = Carbon::parse($row->reentry_date);
            $row->reentry_date = $reingreso->format('d-m-Y');
        }

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
            'nombre' => ['required','max:30'], 
            'fecha_nacimiento' => ['required','date'],
            'sexo' => ['required'],
            'rfc' => ['nullable','max:13','alpha_num:ascii','unique:beneficiaries,rfc,'. $id],
            'curp' => ['required','max:18','alpha_num:ascii','unique:beneficiaries,curp,'. $id],
            'persona_discapacitada' => ['required'],
            'parentesco' =>['required'],
            'direccion' =>['required','max:150'],
            'observaciones' =>['nullable','max:150'], 
            'num_cuenta' => ['nullable','numeric','max:10'],
            'clabe' => ['nullable','numeric','max:18'],
            'banco_id' => ['nullable'],
            'nombre_representante' =>['nullable','max:40'],
            'rfc_representante' =>['nullable','max:13','alpha_num:ascii'],
            'curp_representante' =>['nullable','max:18','alpha_num:ascii'],
            'parentesco_representante' =>['nullable'],
        ]);
        DB::beginTransaction();
        
        try{

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
        DB::commit();
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Registro actualizado con éxito!');
        return to_route('prestaciones.familiares.index');
        }catch(Exception $e){
            DB::rollBack();
            session()->flash('msg_tipo', 'danger');
            session()->flash('msg', $e->getMessage()); 
        }
    }
    public function disabled(string $id)
    {
        $row = Beneficiary::find($id);
        return view('prestaciones.familiares.disabled',['familiar'=>$row]);
    }
    public function baja(Request $request, string $id)
    {
        $validated = $request->validate([
            'fecha_baja' => ['required','max:10','date'],
            'motivo_baja' => ['required','max:255'],

        ]);
        DB::beginTransaction();
        try{
            $row = Beneficiary::find($id);
            $row->inactive_date = $request->input('fecha_baja');
            $row->inactive_motive = $request->input('motivo_baja');
            $row->affiliate_status = "Baja";
            $row->status = "Inactive";
            $row->modified_by = Auth::user()->email;
            $row->save();
            
            DB::commit();

            session()->flash('msg_tipo', 'success');
            session()->flash('msg', 'El Registro fue dado de baja con éxito!');
            return to_route('prestaciones.familiares.index'); 
        }catch(Exception $e){
            DB::rollBack();
            session()->flash('msg_tipo', 'danger');
            session()->flash('msg', $e->getMessage()); 
        }
    }
}
