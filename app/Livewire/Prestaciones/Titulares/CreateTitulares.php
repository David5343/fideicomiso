<?php

namespace App\Livewire\Prestaciones\Titulares;

use App\Models\Humanos\Bank;
use App\Models\Humanos\County;
use App\Models\Humanos\State;
use App\Models\Prestaciones\ServiceUser;
use App\Models\Prestaciones\Subdependency;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CreateTitulares extends Component
{
    #[Rule('required | unique:service_users,file_number')] 
    public $no_expediente;
    #[Rule('required')]
    public $subdepe_id;
    #[Rule('required | date')]
    public $fecha_ingreso;
    #[Rule('required')]
    public $lugar_trabajo;
    #[Rule('nullable')]
    public $motivo_alta;
    #[Rule('required')]
    public $estatus_afiliado;
    #[Rule('nullable')]
    public $observaciones;
    #[Rule('required | min:2| max:20')]
    public $apaterno;
    #[Rule('required | min:2| max:20')]
    public $amaterno;
    #[Rule('required | min:2| max:20')]
    public $nombre;         
    #[Rule('required | date')]
    public $fecha_nacimiento;
    #[Rule('nullable | min:5| max:85')]
    public $lugar_nacimiento;
    #[Rule('nullable')]
    public $sexo;
    #[Rule('nullable')]
    public $estado_civil;
    #[Rule('nullable | size:13| alpha_num:ascii')]
    public $rfc;
    #[Rule('nullable | size:18| alpha_num:ascii')]
    public $curp;
    #[Rule('nullable|numeric|digits:10')]
    public $telefono;
    #[Rule('nullable|email|min:5|max:50|unique:service_users,email')]
    public $email;
    #[Rule('nullable|min:5|max:85')]
    public $estado;
    #[Rule('nullable|min:5|max:85')]
    public $municipio;
    #[Rule('nullable|min:5|max:50')]
    public $colonia;
    #[Rule('nullable|min:5|max:50')]
    public $tipo_vialidad;
    #[Rule('nullable|min:5|max:50')]
    public $calle;
    #[Rule('nullable | max:7')]
    public $num_exterior;
    #[Rule('nullable | max:7')]
    public $num_interior;
    #[Rule('nullable|numeric|digits:5')]
    public $cp;
    #[Rule('nullable|min:5|max:85')]
    public $localidad;
    #[Rule('nullable | digits:10')]
    public $num_cuenta;
    #[Rule('nullable | digits:18')]
    public $clabe;
    #[Rule('nullable')]
    public $banco_id;
    #[Rule('nullable | max:40')]
    public $nombre_representante;
    #[Rule('nullable | size:13| alpha_num:ascii')]
    public $rfc_representante;
    #[Rule('nullable | size:18| alpha_num:ascii')]
    public $curp_representante;
    #[Rule('nullable')]
    public $parentesco_representante;

    public function guardar()
    {
        $this->validate();
        $titular = new ServiceUser();
        $titular->file_number = Str::of($this->no_expediente)->trim();
        $titular->subdependency_id = $this->subdepe_id;
        $titular->start_date =$this->fecha_ingreso;
        $titular->work_place = Str::of($this->lugar_trabajo)->trim();
        $titular->register_motive = Str::of($this->motivo_alta)->trim();
        $titular->affiliate_status = $this->estatus_afiliado;
        $titular->observations = Str::of($this->observaciones)->trim();
        $titular->last_name_1 = Str::of($this->apaterno)->trim();
        $titular->last_name_2 = Str::of($this->amaterno)->trim();
        $titular->name = Str::of($this->nombre)->trim();
        $titular->birthday = $this->fecha_nacimiento;
        $titular->birthplace = Str::of($this->lugar_nacimiento)->trim();
        $titular->sex = $this->sexo;
        $titular->marital_status = $this->estado_civil;
        $rfc = Str::of($this->rfc)->trim();
        $titular->rfc = Str::upper($rfc);
        $curp = Str::of($this->curp)->trim();
        $titular->curp = Str::upper($curp);
        $titular->phone = Str::of($this->telefono)->trim();
        $email = Str::of($this->email)->trim();
        $titular->email = Str::lower($email);
        $titular->state = Str::of($this->estado)->trim();
        $titular->county = Str::of($this->municipio)->trim();
        $titular->neighborhood = Str::of($this->colonia)->trim();
        $titular->roadway_type = Str::of($this->tipo_vialidad)->trim();
        $titular->street = Str::of($this->calle)->trim();
        $titular->outdoor_number = Str::of($this->num_exterior)->trim();
        $titular->interior_number = Str::of($this->num_interior)->trim();
        $titular->cp = Str::of($this->cp)->trim();
        $titular->locality = Str::of($this->localidad)->trim();
        $titular->account_number = Str::of($this->num_cuenta)->trim();
        $titular->clabe = Str::of($this->clabe)->trim();
        $titular->bank_id = $this->banco_id;
        $titular->representative_name = Str::of($this->nombre_representante)->trim();
        $titular->representative_rfc = Str::of($this->rfc_representante)->trim();
        $titular->representative_curp = Str::of($this->curp_representante)->trim();
        $titular->representative_relationship = Str::of($this->parentesco_representante)->trim();
        $titular->status = 'active';
        $titular->modified_by = Auth::user()->email;
        $titular->save();
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Registro creado con éxito!');
        return to_route('prestaciones.titulares.create');

  
    }

    public function render()
    {
        $select1 = Subdependency::where('status', 'active')->get();
        $select2 = State::where('status', 'active')->get();
        $select3 = County::where('status', 'active')->get();
        $select4 = Bank::where('status', 'active')->get();
        $this->no_expediente = IdGenerator::generate(['table' => 'service_users','field' => 'file_number', 'length' => 8, 'prefix' =>'T']);
        return view('livewire.prestaciones.titulares.create-titulares',['select1' => $select1,
                                                                        'select2' => $select2,
                                                                        'select3' => $select3,
                                                                        'select4' => $select4,
                                                                        'no_expediente' =>$this->no_expediente]);
    }
}
