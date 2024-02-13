<?php

namespace App\Livewire\Prestaciones\Familiares;

use App\Models\Humanos\Bank;
use App\Models\Prestaciones\Beneficiary;
use App\Models\Prestaciones\Insured;
use Exception;
use Livewire\Component;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

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
    #[Validate('required|date|max:10')]
    public $fecha_ingreso="";
    #[Validate('required | max:20')]  
    public $apaterno="";
    #[Validate('required | max:20')] 
    public $amaterno="";
    #[Validate('required | max:30')] 
    public $nombre="";
    #[Validate('required|date|max:10')] 
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
        if($row !== null)
        {
            $this->hidden_id = $row->id;
            $this->nombre_afiliado = $row->last_name_1.' '.$row->last_name_2.' '.$row->name;
            $this->rfc_afiliado = $row->rfc;
        }else{
            session()->flash('msg_tipo_busqueda','info');
            session()->flash('msg_busqueda','Ups!, No se encontro ningun registro.'); 
        }

    }
    public function guardar()
    {
        DB::beginTransaction();
        try
        {
            $this->validate();
            //El trabajador solo tiene derecho a registrar una esposa, una concubina
            //una Madre y un Padre
            //El trabajador puede registrar N cantidad de hijos
            // $esposa = Beneficiary::where('status','active')
            //                         ->where('insured_id',$this->hidden_id)
            //                         ->where('relationship','Esposa')->get();
            // $concubina = Beneficiary::where('status','active')
            //                         ->where('insured_id',$this->hidden_id)
            //                         ->where('relationship','Concubina')->get();
            // $mama = Beneficiary::where('status','active')
            //                         ->where('insured_id',$this->hidden_id)
            //                         ->where('relationship','Madre')->get();
            // $papa = Beneficiary::where('status','active')
            //                         ->where('insured_id',$this->hidden_id)
            //                         ->where('relationship','Padre')->get();
            // if ($esposa->count() == 1 | $this->parentesco == 'Esposa'| $this->parentesco == 'Concubina')
            // {
            //     session()->flash('msg_tipo', 'info');
            //     session()->flash('msg', 'Ya existe una Esposa registrada para este Trabajador');
            //     $this->js("alert('Ya existe una Esposa registrada para este Trabajador')"); 

            // }elseif($concubina->count() == 1| $this->parentesco == 'Esposa'| $this->parentesco == 'Concubina'){
            //     session()->flash('msg_tipo', 'info');
            //     session()->flash('msg', 'Ya existe una Concubina registrada para este Trabajador');
            //     $this->js("alert('Ya existe una Concubina registrada para este Trabajador')"); 
            // } elseif($mama->count() == 1| $this->parentesco == 'Madre'){
            //     session()->flash('msg_tipo', 'info');
            //     session()->flash('msg', 'Ya existe una Madre registrada para este Trabajador');
            //     $this->js("alert('Ya existe una Madre registrada para este Trabajador')"); 
            // } elseif($papa->count() == 1| $this->parentesco == 'Padre'){
            //     session()->flash('msg_tipo', 'info');
            //     session()->flash('msg', 'Ya existe un Padre registrada para este Trabajador');
            //     $this->js("alert('Ya existe un Padre registrada para este Trabajador')"); 
            // } else {
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
                session()->flash('msg', 'Registro con No. de Expediente: '.$familiar->file_number.' creado con éxito!');
                $this->js("alert('Registro con No. de Expediente:".$familiar->file_number." creado con éxito!')");  
            //}         
        }catch (Exception $e){
            DB::rollBack();
            session()->flash('msg_tipo', 'danger');
            session()->flash('msg', $e->getMessage()); 
        }
        DB::commit();

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
