<?php

namespace App\Livewire\Prestaciones\Titulares;

use App\Models\Prestaciones\ServiceUser;
use Livewire\Component;
use Livewire\WithPagination;

class IndexTitulares extends Component
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
    public function render()
    {
        $lista =  ServiceUser::where('status','=','active')
        ->where('rfc','like','%'.$this->search.'%')
        ->orderBy('name','asc')
        ->paginate($this->numberRows);
$count = $lista->count();
        return view('livewire.prestaciones.titulares.index-titulares',[
            'count' => $count,
            'lista' => $lista,]);
    }
}
