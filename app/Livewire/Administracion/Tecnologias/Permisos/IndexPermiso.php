<?php

namespace App\Livewire\Administracion\Tecnologias\Permisos;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class IndexPermiso extends Component
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

    #[On('create_permission')]
    public function updateList($permiso = null)
    {

    }

    public function render()
    {
        $lista = Permission::where('name', 'like', '%'.$this->search.'%')
            ->orderBy('name', 'asc')
            ->paginate($this->numberRows);
        $count = $lista->count();

        return view('livewire.administracion.tecnologias.permisos.index-permiso', [
            'count' => $count,
            'lista' => $lista, ]);
    }
}
