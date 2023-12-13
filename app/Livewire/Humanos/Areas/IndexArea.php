<?php

namespace App\Livewire\Humanos\Areas;

use App\Models\Humanos\Area;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;


class IndexArea extends Component
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
    #[On('create_area')]
    public function updateList($area = null){

    }
    public function render(){

        $lista =  Area::where('status','=','active')
                        ->where('name','like','%'.$this->search.'%')
                        ->orderBy('name','asc')
                        ->paginate($this->numberRows);
        $count = $lista->count();
        return view('livewire.humanos.areas.index-area',[
            'count' => $count,
            'lista' => $lista,]);
    }
}
