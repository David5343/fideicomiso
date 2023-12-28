<?php

namespace App\Http\Controllers\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Humanos\Bank;
use App\Models\Humanos\County;
use App\Models\Humanos\State;
use App\Models\Prestaciones\Subdependency;
use Illuminate\Http\Request;

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
        return  view('prestaciones.afiliados.create', ['select1' => $select1,
                                                  'select2' => $select2,
                                                  'select3' => $select3,
                                                  'select4' => $select4]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_expendiente'=> ['required'],
            'expendiente_hidden'=> ['required'],
            'subdepe'=> ['required'],
            'fecha_ingreso' => ['required','date'],
            'lugar_trabajo' => ['required'],
            'apaterno' => ['required', 'min:2','max:20'],
            'amaterno' => ['required', 'min:2','max:20'],
            'nombre' => ['required','min:2','max:20'],            
            'fecha_nacimiento' => ['required','date'],
            'lugar_nacimiento' => ['required','min:5','max:85'],
            'sexo' => ['required'],
            'estado_civil' => ['required'],
            'rfc' => ['required','regex:/^[a-zA-Z0-9]+$/','size:13','unique:employees,rfc'],
            'curp' => ['required','regex:/^[a-zA-Z0-9]+$/','size:18','unique:employees,curp'],
            'telefono' => ['required','numeric','digits:10'],
            'email' => ['required','email','min:5','max:50','unique:employees,email'],
            'estado' => ['required','min:5','max:85'],
            'municipio' => ['required','min:5','max:85'],
            'colonia' => ['required','min:5','max:50'],
            'tipo_vialidad' => ['required','min:5','max:50'],
            'calle' =>['required','min:5','max:50'],
            'num_exterior' => ['required','numeric','max_digits:5'],
            'num_interior' => ['nullable','numeric','max_digits:5'],
            'cp' => ['required','numeric','digits:5'],
            'localidad' => ['required','min:5','max:85'],
            'num_cuenta' => ['required','digits:10'],
            'clabe' => ['required','digits:18'],
            'banco_id' => ['required'],
            //'fecha_baja' => ['required','date'],
            //'motivo_baja' => ['required','min:5','max:85']
        ]);        

    }
}
