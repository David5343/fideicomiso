<?php

namespace App\Livewire\Prestaciones\Dependencias;

use App\Models\Prestaciones\Dependency;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class IndexDependencias extends Component
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
    #[On('create_dependencia')]
    public function updateList($dependencia = null){

    }
    public function render()
    {
        $lista =  Dependency::where('status','=','active')
                        ->where('name','like','%'.$this->search.'%')
                        ->orderBy('name','asc')
                        ->paginate($this->numberRows);
        $count = $lista->count();
        return view('livewire.prestaciones.dependencias.index-dependencias',[
            'count' => $count,
            'lista' => $lista,]);
    }
}
