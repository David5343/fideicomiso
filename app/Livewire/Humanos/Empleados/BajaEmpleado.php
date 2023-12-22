<?php

namespace App\Livewire\Humanos\Empleados;

use App\Models\Humanos\Employee;
use Livewire\Component;
use Livewire\Attributes\Rule;

class BajaEmpleado extends Component
{
    #[Rule('required')]
    public $empleado_id;
    #[Rule('required')]
    public $motivo_baja;
    
    public function bajaEmpleado(){
        $this->reset(['empleado_id','motivo_baja']); 
       // $this->dispatch('create_empleado',$e); 
    }
    public function cerrarModal(){
        $this->reset(['empleado_id','motivo_baja']);
        $this->resetValidation();
    }
    public function render()
    {
        $lista =  Employee::where('status','active')->get();
        return view('livewire.humanos.empleados.baja-empleado',['select'=>$lista]);
    }
}
