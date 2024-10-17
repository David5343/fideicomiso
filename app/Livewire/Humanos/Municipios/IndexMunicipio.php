<?php

namespace App\Livewire\Humanos\Municipios;

use App\Models\Humanos\County;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class IndexMunicipio extends Component
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

    #[On('create_municipio')]
    public function updateList($municipio = null)
    {

    }

    public function render()
    {
        $lista = County::where('status', '=', 'active')
            ->where('name', 'like', '%'.$this->search.'%')
            ->orderBy('name', 'asc')
            ->paginate($this->numberRows);
        $count = $lista->count();

        return view('livewire.humanos.municipios.index-municipio', [
            'count' => $count,
            'lista' => $lista, ]);
    }
}
