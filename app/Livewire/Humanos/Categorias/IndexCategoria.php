<?php

namespace App\Livewire\Humanos\Categorias;

use App\Models\Humanos\Category;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class IndexCategoria extends Component
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

    #[On('create_categoria')]
    public function updateList($categoria = null)
    {

    }

    public function render()
    {
        $lista = Category::where('status', '=', 'active')
            ->where('name', 'like', '%'.$this->search.'%')
            ->orderBy('name', 'asc')
            ->paginate($this->numberRows);
        $count = $lista->count();

        return view('livewire.humanos.categorias.index-categoria', [
            'count' => $count,
            'lista' => $lista, ]);
    }
}
