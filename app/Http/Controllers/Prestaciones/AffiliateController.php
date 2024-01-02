<?php

namespace App\Http\Controllers\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Humanos\Bank;
use App\Models\Humanos\County;
use App\Models\Humanos\State;
use App\Models\Prestaciones\Affiliate;
use App\Models\Prestaciones\Subdependency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class AffiliateController extends Controller
{
    public function index()
    {
        return view('prestaciones.afiliados.index');
    }
    public function create()
    {
        $select1 = Subdependency::where('status', 'active')->get();
        $select2 = State::where('status', 'active')->get();
        $select3 = County::where('status', 'active')->get();
        $select4 = Bank::where('status', 'active')->get();
        $id = IdGenerator::generate(['table' => 'affiliates','field' => 'file_number', 'length' => 10, 'prefix' =>'FSP']);
        $no_expediente = $id;
        return  view('prestaciones.afiliados.create', ['select1' => $select1,
                                                  'select2' => $select2,
                                                  'select3' => $select3,
                                                  'select4' => $select4,
                                                    'no_expediente' =>$no_expediente]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            //'no_expediente'=> ['required'],
            'expediente_hidden'=> ['required'],
            'subdepe_id'=> ['required'],
            'fecha_ingreso' => ['required','date'],
            'lugar_trabajo' => ['required'],
            'apaterno' => ['required', 'min:2','max:20'],
            'amaterno' => ['required', 'min:2','max:20'],
            'nombre' => ['required','min:2','max:20'],            
            'fecha_nacimiento' => ['required','date'],
            'lugar_nacimiento' => ['nullable','min:5','max:85'],
            'sexo' => ['nullable'],
            'estado_civil' => ['nullable'],
            'rfc' => ['nullable','regex:/^[a-zA-Z0-9]+$/','size:13','unique:affiliates,rfc'],
            'curp' => ['nullable','regex:/^[a-zA-Z0-9]+$/','size:18','unique:affiliates,curp'],
            'telefono' => ['nullable','numeric','digits:10'],
            'email' => ['nullable','email','min:5','max:50','unique:affiliates,email'],
            'estado' => ['nullable','min:5','max:85'],
            'municipio' => ['nullable','min:5','max:85'],
            'colonia' => ['nullable','min:5','max:50'],
            'tipo_vialidad' => ['nullable','min:5','max:50'],
            'calle' =>['nullable','min:5','max:50'],
            'num_exterior' => ['nullable','numeric','max_digits:5'],
            'num_interior' => ['nullable','numeric','max_digits:5'],
            'cp' => ['nullable','numeric','digits:5'],
            'localidad' => ['nullable','min:5','max:85'],
            'num_cuenta' => ['nullable','digits:10'],
            'clabe' => ['nullable','digits:18'],
            'banco_id' => ['nullable'],
            //'fecha_baja' => ['required','date'],
            //'motivo_baja' => ['required','min:5','max:85']
        ]);
        $diccionario = ['á' => 'a',
        'é' => 'e',
        'í' => 'i',
        'ó' => 'o',
        'ú' => 'u',
        'Á' => 'A',
        'É' => 'E',
        'Í' => 'I',
        'Ó' => 'O',
        'Ú' => 'U'];
        //Eliminando acentos        
        $slug_apaterno = Str::slug($request->input('apaterno'),' ','es',$diccionario);
        $slug_amaterno = Str::slug($request->input('amaterno'),' ','es',$diccionario);
        $slug_name = Str::slug($request->input('nombre'),' ','es',$diccionario);
        //
        $afiliado = new Affiliate();
        $afiliado->file_number = $request->input('expediente_hidden');
        $afiliado->subdependency_id = $request->input('subdepe_id');
        $afiliado->start_date =$request->input('fecha_ingreso');
        $afiliado->work_place = $request->input('lugar_trabajo');       
        $afiliado->last_name_1 = ucwords($slug_apaterno);
        $afiliado->last_name_2 = ucwords($slug_amaterno);
        $afiliado->name = ucwords($slug_name);
        $afiliado->birthday = $request->input('fecha_nacimiento');
        $afiliado->birthplace = $request->input('lugar_nacimiento');
        $afiliado->sex = $request->input('sexo');
        $afiliado->marital_status = $request->input('estado_civil');
        $afiliado->rfc = $request->input('rfc');
        $afiliado->curp = $request->input('curp');
        $afiliado->phone = $request->input('telefono');
        $afiliado->email =$request->input('email');
        $afiliado->state =$request->input('estado');
        $afiliado->county =$request->input('municipio');
        $afiliado->neighborhood =$request->input('colonia');
        $afiliado->roadway_type =$request->input('tipo_vialidad');
        $afiliado->street =$request->input('calle');
        $afiliado->outdoor_number =$request->input('num_exterior');
        $afiliado->interior_number =$request->input('num_interior');
        $afiliado->cp =$request->input('cp');
        $afiliado->locality =$request->input('localidad');
        $afiliado->account_number =$request->input('num_cuenta');
        $afiliado->clabe =$request->input('clabe');
        $afiliado->bank_id =$request->input('banco_id');
        $afiliado->status = 'active';
        $afiliado->modified_by = Auth::user()->email;
        $afiliado->save();
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Registro creado con éxito!');
        return to_route('prestaciones.afiliados.index');

    }
    public function edit(string $id)
    {
        $select1 = Subdependency::where('status', 'active')->get();
        $select2 = State::where('status', 'active')->get();
        $select3 = County::where('status', 'active')->get();
        $select4 = Bank::where('status', 'active')->get();
        $row = Affiliate::find($id);
        return view('prestaciones/afiliados/edit', ['select1' => $select1,
                                                    'select2' => $select2,
                                                    'select3' => $select3,
                                                    'select4' => $select4,
                                                    'afiliado' => $row]);
    }
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            //'no_expediente'=> ['required'],
            'expediente_hidden'=> ['required'],
            'subdepe_id'=> ['required'],
            'fecha_ingreso' => ['required','date'],
            'lugar_trabajo' => ['required'],
            'apaterno' => ['required', 'min:2','max:20'],
            'amaterno' => ['required', 'min:2','max:20'],
            'nombre' => ['required','min:2','max:20'],            
            'fecha_nacimiento' => ['required','date'],
            'lugar_nacimiento' => ['nullable','min:5','max:85'],
            'sexo' => ['nullable'],
            'estado_civil' => ['nullable'],
            'rfc' => ['nullable','regex:/^[a-zA-Z0-9]+$/','size:13','unique:affiliates,rfc,'. $id],
            'curp' => ['nullable','regex:/^[a-zA-Z0-9]+$/','size:18','unique:affiliates,curp,'. $id],
            'telefono' => ['nullable','numeric','digits:10'],
            'email' => ['nullable','email','min:5','max:50','unique:affiliates,email,'. $id],
            'estado' => ['nullable','min:5','max:85'],
            'municipio' => ['nullable','min:5','max:85'],
            'colonia' => ['nullable','min:5','max:50'],
            'tipo_vialidad' => ['nullable','min:5','max:50'],
            'calle' =>['nullable','min:5','max:50'],
            'num_exterior' => ['nullable','numeric','max_digits:5'],
            'num_interior' => ['nullable','numeric','max_digits:5'],
            'cp' => ['nullable','numeric','digits:5'],
            'localidad' => ['nullable','min:5','max:85'],
            'num_cuenta' => ['nullable','digits:10'],
            'clabe' => ['nullable','digits:18'],
            'banco_id' => ['nullable'],
            //'fecha_baja' => ['required','date'],
            //'motivo_baja' => ['required','min:5','max:85']
        ]);
        $diccionario = ['á' => 'a',
        'é' => 'e',
        'í' => 'i',
        'ó' => 'o',
        'ú' => 'u',
        'Á' => 'A',
        'É' => 'E',
        'Í' => 'I',
        'Ó' => 'O',
        'Ú' => 'U'];
        //Eliminando acentos        
        $slug_apaterno = Str::slug($request->input('apaterno'),' ','es',$diccionario);
        $slug_amaterno = Str::slug($request->input('amaterno'),' ','es',$diccionario);
        $slug_name = Str::slug($request->input('nombre'),' ','es',$diccionario);
        //
        $row = Affiliate::find($id);
        $row->file_number = $request->input('expediente_hidden');
        $row->subdependency_id = $request->input('subdepe_id');
        $row->start_date =$request->input('fecha_ingreso');
        $row->work_place = $request->input('lugar_trabajo');       
        $row->last_name_1 = ucwords($slug_apaterno);
        $row->last_name_2 = ucwords($slug_amaterno);
        $row->name = ucwords($slug_name);
        $row->birthday = $request->input('fecha_nacimiento');
        $row->birthplace = $request->input('lugar_nacimiento');
        $row->sex = $request->input('sexo');
        $row->marital_status = $request->input('estado_civil');
        $row->rfc = $request->input('rfc');
        $row->curp = $request->input('curp');
        $row->phone = $request->input('telefono');
        $row->email =$request->input('email');
        $row->state =$request->input('estado');
        $row->county =$request->input('municipio');
        $row->neighborhood =$request->input('colonia');
        $row->roadway_type =$request->input('tipo_vialidad');
        $row->street =$request->input('calle');
        $row->outdoor_number =$request->input('num_exterior');
        $row->interior_number =$request->input('num_interior');
        $row->cp =$request->input('cp');
        $row->locality =$request->input('localidad');
        $row->account_number =$request->input('num_cuenta');
        $row->clabe =$request->input('clabe');
        $row->bank_id =$request->input('banco_id');
        $row->status = 'active';
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Registro creado con éxito!');
        return to_route('prestaciones.afiliados.index');        
    }

}
