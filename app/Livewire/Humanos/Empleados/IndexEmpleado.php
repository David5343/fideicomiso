<?php

namespace App\Livewire\Humanos\Empleados;

use App\Models\Humanos\Employee;
use Livewire\Component;
use Livewire\WithPagination;

class IndexEmpleado extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search='';
    public $numberRows = 5;

    public function updatingSearch(){
        $this->resetPage();
    }
    public function updatingnumberRows(){
        $this->resetPage();
    }
    public function render()
    {
        $lista =  Employee::where('status','=','active')
        ->where('name','like','%'.$this->search.'%')
         ->where('last_name_1','like','%'.$this->search.'%')
         ->where('last_name_2','like','%'.$this->search.'%')
         ->orderBy('created_at','desc')
                        ->paginate($this->numberRows);
        $count = $lista->count();
        return view('livewire.humanos.empleados.index-empleado',[
            'count' => $count,
            'lista' => $lista,]);
    }
}
