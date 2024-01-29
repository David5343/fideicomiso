<?php

namespace App\Http\Controllers\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Humanos\Bank;
use App\Models\Humanos\County;
use App\Models\Humanos\State;
use App\Models\Prestaciones\ServiceUser;
use App\Models\Prestaciones\Subdependency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ServiceUserController extends Controller
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
        $row = ServiceUser::find($id);
        return view('prestaciones.titulares.show',['titular' => $row]);
        
    }
    public function edit(string $id)
    {
        $select1 = Subdependency::where('status', 'active')->get();
        $select2 = State::where('status', 'active')->get();
        $select3 = County::where('status', 'active')->get();
        $select4 = Bank::where('status', 'active')->get();
        $row = ServiceUser::find($id);
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
            'fecha_ingreso' => ['required','date'],
            'lugar_trabajo' => ['required'],
            'motivo_alta' =>['nullable'],
            'estatus_afiliado' => ['required'],
            'observaciones' =>['nullable'],
            'apaterno' => ['required', 'min:2','max:20'],
            'amaterno' => ['required', 'min:2','max:20'],
            'nombre' => ['required','min:2','max:20'],            
            'fecha_nacimiento' => ['required','date'],
            'lugar_nacimiento' => ['nullable','min:5','max:85'],
            'sexo' => ['nullable'],
            'estado_civil' => ['nullable'],
            'rfc' => ['nullable ',' max:13 ',' alpha_num:ascii'],
            'curp' => ['nullable' ,' max:18 ', 'alpha_num:ascii'],
            'telefono' => ['nullable','numeric','digits:10'],
            'email' => ['nullable','email','min:5','max:50','unique:service_users,email,'. $id],
            'estado' => ['nullable','min:5','max:85'],
            'municipio' => ['nullable','min:5','max:85'],
            'colonia' => ['nullable','min:5','max:50'],
            'tipo_vialidad' => ['nullable','min:5','max:50'],
            'calle' =>['nullable','min:5','max:50'],
            'num_exterior' => ['nullable','max:7'],
            'num_interior' => ['nullable','max:7'],
            'cp' => ['nullable','numeric','digits:5'],
            'localidad' => ['nullable','min:5','max:85'],
            'num_cuenta' => ['nullable','digits:10'],
            'clabe' => ['nullable','digits:18'],
            'banco_id' => ['nullable'],
            'nombre_representante' =>['nullable','max:40'],
            'rfc_representante' =>['nullable ',' size:13 ',' alpha_num:ascii'],
            'curp_representante' =>['nullable ',' size:18 ',' alpha_num:ascii'],
            'parentesco_representante' =>['nullable'],
        ]);
        $row = ServiceUser::find($id);
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
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Registro creado con éxito!');
        return to_route('prestaciones.titulares.index');        
    }
}
