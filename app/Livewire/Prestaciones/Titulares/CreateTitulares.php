<?php

namespace App\Livewire\Prestaciones\Titulares;

use App\Models\Humanos\Bank;
use App\Models\Humanos\County;
use App\Models\Humanos\State;
use App\Models\Prestaciones\Subdependency;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class CreateTitulares extends Component
{
    #[Rule('required')] 
    public $no_expediente ="";
    #[Rule('nullable | unique:service_users,file_number')] 
    public $expediente_hidden;
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
        //dump($this->validate());
        dump($this->expediente_hidden);
    }

    public function render()
    {
        $select1 = Subdependency::where('status', 'active')->get();
        $select2 = State::where('status', 'active')->get();
        $select3 = County::where('status', 'active')->get();
        $select4 = Bank::where('status', 'active')->get();
        $this->no_expediente = IdGenerator::generate(['table' => 'affiliates','field' => 'file_number', 'length' => 8, 'prefix' =>'T']);
        return view('livewire.prestaciones.titulares.create-titulares',['select1' => $select1,
                                                                        'select2' => $select2,
                                                                        'select3' => $select3,
                                                                        'select4' => $select4,
                                                                        'no_expediente' =>$this->no_expediente]);
    }
}
