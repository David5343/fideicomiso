<?php

namespace App\Livewire\Prestaciones\Familiares;

use App\Models\Prestaciones\AffiliateFamily;
use Livewire\Component;
use Livewire\WithPagination;

class IndexFamilies extends Component
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
        $lista =  AffiliateFamily::where('status','=','active')
                        ->where('rfc','like','%'.$this->search.'%')
                        ->orderBy('name','asc')
                        ->paginate($this->numberRows);
        $count = $lista->count();        
        return view('livewire.prestaciones.familiares.index-families',[
            'count' => $count,
            'lista' => $lista,]);
    }
}
