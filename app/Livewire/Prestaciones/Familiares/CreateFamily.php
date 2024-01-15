<?php

namespace App\Livewire\Prestaciones\Familiares;

use App\Models\Humanos\Bank;
use App\Models\Prestaciones\Affiliate;
use App\Models\Prestaciones\AffiliateFamily;
use Livewire\Component;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;

class CreateFamily extends Component
{

    public $busqueda ="";
    public $hidden_id=0;
    public $nombre_afiliado="";
    public $rfc_afiliado="";
    public $no_expediente="";
    #[Rule('required')]  
    public $apaterno="";
    #[Rule('required')] 
    public $amaterno="";
    #[Rule('required')] 
    public $nombre="";
    #[Rule('required')] 
    public $fecha_nacimiento="";
    #[Rule('required')] 
    public $sexo="";
    #[Rule('nullable')] 
    public $rfc="";
    #[Rule('required')] 
    public $curp="";
    #[Rule('required')] 
    public $persona_discapacitada="";
    #[Rule('required')] 
    public $parentesco="";
    #[Rule('required')] 
    public $direccion ="";
    #[Rule('nullable')] 
    public $observaciones="";
    #[Rule('nullable')] 
    public $num_cuenta="";
    #[Rule('nullable')] 
    public $clabe="";
    #[Rule('nullable')] 
    public $banco_id;
    #[Rule('nullable')] 
    public $nombre_representante="";
    #[Rule('nullable')] 
    public $rfc_representante="";
    #[Rule('nullable')] 
    public $curp_representante="";
    #[Rule('nullable')] 
    public $parentesco_representante="";
    #[Rule('required')] 
    public $num_expediente="";
    #[Rule('required')]
    public $expediente_hidden="";
    #[Rule('required')]
    public $fecha_ingreso="";



    public function buscar()
    {
        $row = Affiliate::where('file_number',$this->busqueda)->first();
        //dd($busqueda);
        if($row !== null)
        {
            $this->hidden_id = $row->id;
            $this->nombre_afiliado = $row->last_name_1.' '.$row->last_name_2.' '.$row->name;
            $this->rfc_afiliado = $row->rfc;
            $this->num_expediente = IdGenerator::generate(['table' => 'affiliate_families','field' => 'file_number', 'length' => 8, 'prefix' =>'F']);
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
        $familiar = new AffiliateFamily();
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
        $familiar->affiliate_id = $this->hidden_id;
        $familiar->status = 'active';
        $familiar->modified_by = Auth::user()->email;
        $familiar->save();
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Registro creado con éxito!');
        return to_route('prestaciones.familiares.create');

    }

    public function render()
    {
        
        $select4 = Bank::where('status', 'active')->get();
        return view('livewire.prestaciones.familiares.create-family',['select4'=>$select4]);
    }
}
