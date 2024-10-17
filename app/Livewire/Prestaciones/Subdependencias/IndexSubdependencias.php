<?php

namespace App\Livewire\Prestaciones\Subdependencias;

use App\Models\Prestaciones\Subdependency;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class IndexSubdependencias extends Component
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

    #[On('create_subdependencia')]
    public function updateList($subdependencia = null)
    {

    }

    public function render()
    {
        $lista = Subdependency::where('status', '=', 'active')
            ->where('name', 'like', '%'.$this->search.'%')
            ->orderBy('name', 'asc')
            ->paginate($this->numberRows);
        $count = $lista->count();

        return view('livewire.prestaciones.subdependencias.index-subdependencias', [
            'count' => $count,
            'lista' => $lista, ]);
    }
}
