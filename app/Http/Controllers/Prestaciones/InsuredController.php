<?php

namespace App\Http\Controllers\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Humanos\Bank;
use App\Models\Humanos\County;
use App\Models\Humanos\State;
use App\Models\Prestaciones\Insured;
use App\Models\Prestaciones\Subdependency;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class InsuredController extends Controller
{
    public function index()
    {   
        return view('prestaciones.titulares.index');
    }
    public function create()
    {
        return  view('prestaciones.titulares.create');
    }
    public function show(string $id)
    {
        $row = Insured::find($id);
        $fecha_ingreso =Carbon::parse($row->start_date);
        $fecha_nacimiento =Carbon::parse($row->birthday);
        $row->start_date = $fecha_ingreso->format('d-m-Y');
        $row->birthday = $fecha_nacimiento->format('d-m-Y');
        return view('prestaciones.titulares.show',['titular' => $row]);
        
    }
    public function edit(string $id)
    {
        $select1 = Subdependency::where('status', 'active')->get();
        $select2 = State::where('status', 'active')->get();
        $select3 = County::where('status', 'active')->get();
        $select4 = Bank::where('status', 'active')->get();
        $row = Insured::find($id);
        return view('prestaciones/titulares/edit', ['select1' => $select1,
                                                    'select2' => $select2,
                                                    'select3' => $select3,
                                                    'select4' => $select4,
                                                    'titular' => $row]);
    }
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'subdepe_id'=> ['required'],
            'fecha_ingreso' => ['required','max:10','date'],
            'lugar_trabajo' => ['nullable','min:3','max:85'],
            'motivo_alta' =>['nullable','min:3','max:120'],
            'estatus_afiliado' => ['required'],
            'observaciones' =>['nullable','min:5','max:180'],
            'apaterno' => ['required', 'min:2','max:20'],
            'amaterno' => ['required', 'min:2','max:20'],
            'nombre' => ['required','min:2','max:30'],            
            'fecha_nacimiento' => ['nullable','max:10','date'],
            'lugar_nacimiento' => ['nullable','min:3','max:85'],
            'sexo' => ['nullable'],
            'estado_civil' => ['nullable'],
            'rfc' => ['required ',' max:13 ',' alpha_num:ascii','unique:insureds,rfc,'.$id],
            'curp' => ['nullable' ,' max:18 ', 'alpha_num:ascii','unique:insureds,curp,'.$id],
            'telefono' => ['nullable','numeric','digits:10'],
            'email' => ['nullable','email','min:5','max:50','unique:insureds,email,'. $id],
            'estado' => ['nullable','min:5','max:85'],
            'municipio' => ['nullable','min:3','max:85'],
            'colonia' => ['nullable','min:5','max:50'],
            'tipo_vialidad' => ['nullable','min:5','max:50'],
            'calle' =>['nullable','min:5','max:50'],
            'num_exterior' => ['nullable','max:7'],
            'num_interior' => ['nullable','max:7'],
            'cp' => ['nullable','numeric','digits:5'],
            'localidad' => ['nullable','min:5','max:85'],
            'num_cuenta' => ['nullable','digits:10','unique:insureds,account_number,'.$id],
            'clabe' => ['nullable','digits:18','unique:insureds,clabe,'.$id],
            'banco_id' => ['nullable'],
            'nombre_representante' =>['nullable','max:40'],
            'rfc_representante' =>['nullable ',' max:13 ',' alpha_num:ascii'],
            'curp_representante' =>['nullable ',' max:18 ',' alpha_num:ascii'],
            'parentesco_representante' =>['nullable'],
        ]);

        DB::beginTransaction();
        
        try{
            $row = Insured::find($id);
            $row->subdependency_id = $request->input('subdepe_id');
            $row->start_date =$request->input('fecha_ingreso');
            $row->work_place = Str::of($request->input('lugar_trabajo'))->trim();  
            $row->register_motive = Str::of($request->input('motivo_alta'))->trim();
            $row->affiliate_status = $request->input('estatus_afiliado');
            $row->observations = Str::of($request->input('observaciones'))->trim();       
            $row->last_name_1 = Str::of($request->input('apaterno'))->trim(); 
            $row->last_name_2 = Str::of($request->input('amaterno'))->trim(); 
            $row->name = Str::of($request->input('nombre'))->trim();
            $row->birthday = $request->input('fecha_nacimiento');
            $row->birthplace = Str::of($request->input('lugar_nacimiento'))->trim();
            $row->sex = $request->input('sexo');
            $row->marital_status = $request->input('estado_civil');
            $rfc = Str::of($request->input('rfc'))->trim();
            $row->rfc = Str::upper($rfc);
            $curp = Str::of($request->input('curp'))->trim();
            $row->curp = Str::upper($curp);
            $row->phone = Str::of($request->input('telefono'))->trim();
            $email = Str::of($request->input('email'))->trim();
            $row->email = Str::lower($email);
            $row->state =Str::of($request->input('estado'))->trim();
            $row->county = Str::of($request->input('municipio'))->trim();
            $row->neighborhood = Str::of($request->input('colonia'))->trim();
            $row->roadway_type = Str::of($request->input('tipo_vialidad'))->trim();
            $row->street = Str::of($request->input('calle'))->trim();
            $row->outdoor_number = Str::of($request->input('num_exterior'))->trim();
            $row->interior_number = Str::of($request->input('num_interior'))->trim();
            $row->cp = Str::of($request->input('cp'))->trim();
            $row->locality = Str::of($request->input('localidad'))->trim();
            $row->account_number = Str::of($request->input('num_cuenta'))->trim();
            $row->clabe = Str::of($request->input('clabe'))->trim();
            $row->bank_id =$request->input('banco_id');
            $row->representative_name =Str::of($request->input('nombre_representante'))->trim();
            $row->representative_rfc = Str::of($request->input('rfc_representante'))->trim();
            $row->representative_curp = Str::of($request->input('curp_representante'))->trim();
            $row->representative_relationship = Str::of($request->input('parentesco_representante'))->trim(); 
            $row->modified_by = Auth::user()->email;
            $row->save();
            DB::commit();
            session()->flash('msg_tipo', 'success');
            session()->flash('msg', 'Registro creado con éxito!');
            return to_route('prestaciones.titulares.index'); 
        }catch(Exception $e){
            DB::rollBack();
            session()->flash('msg_tipo', 'danger');
            session()->flash('msg', $e->getMessage()); 
        }
        
       
    }
    public function disabled(string $id)
    {
        $row = Insured::find($id);
        return view('prestaciones.titulares.disabled',['titular'=>$row]);
    }
    public function baja(Request $request, string $id)
    {
        $validated = $request->validate([
            'fecha_baja' => ['required','max:10','date'],
            'fecha_baja_ssypc' => ['required','max:10','date'],
            'motivo_baja' => ['required'],

        ]);
        DB::beginTransaction();
        try{
            $row = Insured::find($id);
            $row->inactive_date = $request->input('fecha_baja');
            $row->inactive_date_ssypc = $request->input('fecha_baja_ssypc');
            $row->inactive_motive = $request->input('motivo_baja');
            $row->affiliate_status = "Baja";
            $row->status = "Inactive";
            $row->modified_by = Auth::user()->email;
            $row->save();
            
            DB::commit();

            session()->flash('msg_tipo', 'success');
            session()->flash('msg', 'El Registro fue dado de baja con éxito!');
            return to_route('prestaciones.titulares.index'); 
        }catch(Exception $e){
            DB::rollBack();
            session()->flash('msg_tipo', 'danger');
            session()->flash('msg', $e->getMessage()); 
        }
        

    }
}
