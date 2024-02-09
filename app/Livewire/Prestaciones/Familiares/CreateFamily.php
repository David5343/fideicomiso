<?php

namespace App\Livewire\Prestaciones\Familiares;

use App\Models\Humanos\Bank;
use App\Models\Prestaciones\Beneficiary;
use App\Models\Prestaciones\Insured;
use Livewire\Component;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;

class CreateFamily extends Component
{

    public $busqueda ="";
    public $hidden_id=0;
    public $nombre_afiliado="";
    public $rfc_afiliado="";
    public $no_expediente="";
    #[Validate('required | unique:beneficiaries,file_number')] 
    public $num_expediente="";
    #[Validate('required | max: 8 | unique:beneficiaries,file_number')]
    public $expediente_hidden="";
    #[Validate('required | date')]
    public $fecha_ingreso="";
    #[Validate('required | max:20')]  
    public $apaterno="";
    #[Validate('required | max:20')] 
    public $amaterno="";
    #[Validate('required | max:30')] 
    public $nombre="";
    #[Validate('required | date')] 
    public $fecha_nacimiento="";
    #[Validate('required')] 
    public $sexo="";
    #[Validate('nullable | max:13| alpha_num:ascii')] 
    public $rfc="";
    #[Validate('required | max:18 | alpha_num:ascii')] 
    public $curp="";
    #[Validate('required')] 
    public $persona_discapacitada="";
    #[Validate('required')] 
    public $parentesco="";
    #[Validate('required | max:100')] 
    public $direccion ="";
    #[Validate('nullable | max:150')] 
    public $observaciones="";
    #[Validate('nullable | numeric | max_digits:10')] 
    public $num_cuenta="";
    #[Validate('nullable | numeric | max_digits:18')] 
    public $clabe="";
    #[Validate('nullable')] 
    public $banco_id;
    #[Validate('nullable | max:50')] 
    public $nombre_representante="";
    #[Validate('nullable | max:13 | alpha_num:ascii')] 
    public $rfc_representante="";
    #[Validate('nullable | max:18 | alpha_num:ascii')] 
    public $curp_representante="";
    #[Validate('nullable')] 
    public $parentesco_representante="";




    public function buscar()
    {
        $row = Insured::where('file_number',$this->busqueda)->first();
        //dd($busqueda);
        if($row !== null)
        {
            $this->hidden_id = $row->id;
            $this->nombre_afiliado = $row->last_name_1.' '.$row->last_name_2.' '.$row->name;
            $this->rfc_afiliado = $row->rfc;
            $this->num_expediente = IdGenerator::generate(['table' => 'beneficiaries','field' => 'file_number', 'length' => 8, 'prefix' =>'F']);
            $this->expediente_hidden = $this->num_expediente;
        }else{
            session()->flash('msg_tipo_busqueda','info');
            session()->flash('msg_busqueda','Ups!, No se encontro ningun registro.'); 
        }

    }
    public function guardar()
    {
        //dd($this->expediente_hidden);
        //exit();
        $this->validate();
        $familiar = new Beneficiary();
        $familiar->file_number = $this->expediente_hidden;
        $familiar->start_date = $this->fecha_ingreso;  
        $familiar->last_name_1 = $this->apaterno;
        $familiar->last_name_2 = $this->amaterno;
        $familiar->name = $this->nombre;
        $familiar->birthday = $this->fecha_nacimiento;
        $familiar->sex = $this->sexo;
        $familiar->rfc = $this->rfc;
        $familiar->curp = $this->curp;
        $familiar->disabled_person = $this->persona_discapacitada;
        $familiar->relationship = $this->parentesco;
        $familiar->address = $this->direccion;
        $familiar->observations = $this->observaciones;
        $familiar->account_number = $this->num_cuenta;
        $familiar->clabe = $this->clabe;
        $familiar->bank_id = $this->banco_id;
        $familiar->representative_name = $this->nombre_representante;
        $familiar->representative_rfc = $this->rfc_representante;
        $familiar->representative_curp = $this->curp_representante;
        $familiar->representative_relationship = $this->parentesco_representante;
        $familiar->insured_id = $this->hidden_id;
        $familiar->affiliate_status = 'active'; 
        $familiar->status = 'active';
        $familiar->modified_by = Auth::user()->email;
        sleep(1);
        $familiar->save();
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Registro creado con éxito!');
        //$this->js("alert('Registro creado con éxito!')"); 
        //return to_route('prestaciones.familiares.create');

    }

    public function render()
    {
        
        $select4 = Bank::where('status', 'active')->get();
        $this->num_expediente = IdGenerator::generate(['table' => 'beneficiaries','field' => 'file_number', 'length' => 8, 'prefix' =>'F']);
        $this->expediente_hidden = $this->num_expediente;
        return view('livewire.prestaciones.familiares.create-family',['select4'=>$select4,
                                                                        'num_expediente'=>$this->num_expediente]);
    }
}
