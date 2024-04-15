<?php

namespace App\Livewire\Prestaciones\Categorias;

use App\Models\Prestaciones\Category;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class IndexCategorias extends Component
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
    #[On('create_categoria')]
    public function updateList($categoria = null){

    }
    public function render()
    {
        $lista =  Category::where('status','active')
                        ->where('name','like','%'.$this->search.'%')
                        ->orderBy('name','asc')
                        ->paginate($this->numberRows);
        $count = $lista->count();
        return view('livewire.prestaciones.categorias.index-categorias',[
            'count' => $count,
            'lista' => $lista,]);
    }
}
