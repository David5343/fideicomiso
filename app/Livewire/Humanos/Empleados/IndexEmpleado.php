<?php

namespace App\Livewire\Humanos\Empleados;

use App\Models\Humanos\Employee;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class IndexEmpleado extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public $numberRows = 5;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingnumberRows()
    {
        $this->resetPage();
    }

    #[On('create_empleado')]
    public function updateList($e = null)
    {

    }

    public function render()
    {
        $lista = Employee::where('status', 'active')
            ->where('name', 'like', '%'.$this->search.'%')
            ->orwhere('last_name_1', 'like', '%'.$this->search.'%')
            ->orwhere('last_name_2', 'like', '%'.$this->search.'%')
            ->orderBy('created_at', 'asc')
            ->paginate($this->numberRows);
        $count = Employee::where('status', 'active')
            ->get();
        $masculinos = $count->where('sex', 'Hombre');
        $femeninos = $count->where('sex', 'Mujer');

        return view('livewire.humanos.empleados.index-empleado', [
            'lista' => $lista,
            'count' => $count->count(),
            'masculinos' => $masculinos->count(),
            'femeninos' => $femeninos->count(), ]);
    }
}
