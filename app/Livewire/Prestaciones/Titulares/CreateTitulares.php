<?php

namespace App\Livewire\Prestaciones\Titulares;

use App\Models\Humanos\Bank;
use App\Models\Humanos\County;
use App\Models\Humanos\State;
use App\Models\Prestaciones\Insured;
use App\Models\Prestaciones\Subdependency;
use Exception;
use Livewire\Component;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

class CreateTitulares extends Component
{
    #[Validate('required|max:8|unique:insureds,file_number')] 
    public $no_expediente;
    #[Validate('required')]
    public $subdepe_id;
    #[Validate('required|max:10|date')]
    public $fecha_ingreso;
    #[Validate('nullable|min:3|max:85')]
    public $lugar_trabajo;
    #[Validate('nullable|min:3|max:120')]
    public $motivo_alta;
    #[Validate('required')]
    public $estatus_afiliado;
    #[Validate('nullable|min:5|max:180')]
    public $observaciones;
    #[Validate('required|min:2|max:20')]
    public $apaterno;
    #[Validate('required|min:2|max:20')]
    public $amaterno;
    #[Validate('required|min:2|max:30')]
    public $nombre;         
    #[Validate('nullable|max:10|date')]
    public $fecha_nacimiento;
    #[Validate('nullable | min:5| max:85')]
    public $lugar_nacimiento;
    #[Validate('nullable')]
    public $sexo;
    #[Validate('nullable')]
    public $estado_civil;
    #[Validate('required|max:13|alpha_num:ascii|unique:insureds,rfc')]
    public $rfc;
    #[Validate('nullable|max:18|alpha_num:ascii|unique:insureds,curp')]
    public $curp;
    #[Validate('nullable|numeric|digits:10')]
    public $telefono;
    #[Validate('nullable|email|min:5|max:50|unique:insureds,email')]
    public $email;
    #[Validate('nullable|min:5|max:85')]
    public $estado;
    #[Validate('nullable|min:5|max:85')]
    public $municipio;
    #[Validate('nullable|min:5|max:50')]
    public $colonia;
    #[Validate('nullable|min:5|max:50')]
    public $tipo_vialidad;
    #[Validate('nullable|min:5|max:50')]
    public $calle;
    #[Validate('nullable|max:7')]
    public $num_exterior;
    #[Validate('nullable|max:7')]
    public $num_interior;
    #[Validate('nullable|numeric|digits:5')]
    public $cp;
    #[Validate('nullable|min:5|max:85')]
    public $localidad;
    #[Validate('nullable|digits:10')]
    public $num_cuenta;
    #[Validate('nullable|digits:18')]
    public $clabe;
    #[Validate('nullable')]
    public $banco_id;
    #[Validate('nullable| max:40')]
    public $nombre_representante;
    #[Validate('nullable|max:13|alpha_num:ascii')]
    public $rfc_representante;
    #[Validate('nullable| max:18|alpha_num:ascii')]
    public $curp_representante;
    #[Validate('nullable')]
    public $parentesco_representante;

    public function guardar()
    {
        DB::beginTransaction();
        try
        {
            $this->validate();
            $titular = new Insured();
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
            sleep(1);
            $titular->save();
            session()->flash('msg_tipo', 'success');
            session()->flash('msg', 'Registro con No. de Expediente: '.$titular->file_number.' creado con éxito!');
            $this->js("alert('Registro con No. de Expediente:".$titular->file_number." creado con éxito!')"); 
            //return to_route('prestaciones.titulares.create');
        }catch(Exception $e){
            DB::rollBack();
            session()->flash('msg_tipo', 'danger');
            session()->flash('msg', $e->getMessage()); 
        }
        DB::commit();
    }

    public function render()
    {
        $select1 = Subdependency::where('status', 'active')->get();
        $select2 = State::where('status', 'active')->get();
        $select3 = County::where('status', 'active')->get();
        $select4 = Bank::where('status', 'active')->get();
        $this->no_expediente = IdGenerator::generate(['table' => 'insureds','field' => 'file_number', 'length' => 8, 'prefix' =>'T']);
        return view('livewire.prestaciones.titulares.create-titulares',['select1' => $select1,
                                                                        'select2' => $select2,
                                                                        'select3' => $select3,
                                                                        'select4' => $select4,
                                                                        'no_expediente' =>$this->no_expediente]);
    }
}
