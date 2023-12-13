<?php

namespace App\Livewire\Humanos\Estados;

use App\Models\Humanos\State;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class IndexEstado extends Component
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
    #[On('create_estado')]
    public function updateList($estado = null){

    }
    public function render()
    {
        $lista =  State::where('status','=','active')
                        ->where('name','like','%'.$this->search.'%')
                        ->orderBy('name','asc')
                        ->paginate($this->numberRows);
        $count = $lista->count();
        return view('livewire.humanos.estados.index-estado',[
            'count' => $count,
            'lista' => $lista,]);
    }
}
