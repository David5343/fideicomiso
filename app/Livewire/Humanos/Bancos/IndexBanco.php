<?php

namespace App\Livewire\Humanos\Bancos;

use App\Models\Humanos\Bank;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class IndexBanco extends Component
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

    #[On('create_banco')]
    public function updateList($banco = null)
    {

    }

    public function render()
    {
        $lista = Bank::where('status', '=', 'active')
            ->where('name', 'like', '%'.$this->search.'%')
            ->orderBy('name', 'asc')
            ->paginate($this->numberRows);
        $count = $lista->count();

        return view('livewire.humanos.bancos.index-banco', [
            'count' => $count,
            'lista' => $lista, ]);
    }
}
