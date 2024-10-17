<?php

namespace App\Livewire\Humanos\Familiares;

use App\Models\Humanos\Employee;
use App\Models\Humanos\EmployeeFamily;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateFamiliar extends Component
{
    #[Rule('required')]
    public $empleado_id;

    #[Rule('required|min:2|max:20')]
    public $apaterno;

    #[Rule('required|min:2|max:20')]
    public $amaterno;

    #[Rule('required|min:2|max:20')]
    public $nombre;

    #[Rule('required|date')]
    public $fecha_ingreso;

    #[Rule('required|regex:/^[a-zA-Z0-9]+$/|size:18|unique:employee_families,curp')]
    public $curp;

    #[Rule('required')]
    public $parentesco;

    public function createFamily()
    {
        $this->validate();
        $fam = new EmployeeFamily();
        $fam->last_name_1 = $this->apaterno;
        $fam->last_name_2 = $this->amaterno;
        $fam->name = $this->nombre;
        $fam->start_date = $this->fecha_ingreso;
        $fam->curp = $this->curp;
        $fam->relationship = $this->parentesco;
        $fam->employee_id = $this->empleado_id;
        $fam->status = 'active';
        $fam->modified_by = Auth::user()->email;
        $fam->save();
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Registro creado con éxito!');
        $this->reset(['empleado_id', 'apaterno', 'amaterno', 'nombre', 'fecha_ingreso', 'curp', 'parentesco']);
        $this->dispatch('create_familia', $fam);
    }

    public function cerrarModal()
    {
        $this->reset(['empleado_id', 'apaterno', 'amaterno', 'nombre', 'fecha_ingreso', 'curp', 'parentesco']);
        $this->resetValidation();
    }

    public function render()
    {
        $select = Employee::where('status', 'active')->get();

        return view('livewire.humanos.familiares.create-familiar', ['select' => $select]);
    }
}
