<?php

namespace App\Livewire\Humanos\Plazas;

use App\Models\Humanos\Place;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class IndexPlaza extends Component
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
    #[On('create_plaza')]
    public function updateList($plaza = null){

    }
    public function render()
    {
        $lista =  Place::where('status','=','active')
                        ->where('place_number','like','%'.$this->search.'%')
                        ->orderBy('place_number','asc')
                        ->paginate($this->numberRows);
        $count = $lista->count();
        return view('livewire.humanos.plazas.index-plaza',[
            'count' => $count,
            'lista' => $lista,]);
    }
}
