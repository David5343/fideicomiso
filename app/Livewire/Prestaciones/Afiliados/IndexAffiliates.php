<?php

namespace App\Livewire\Prestaciones\Afiliados;

use App\Models\Prestaciones\Affiliate;
use Livewire\Component;
use Livewire\WithPagination;

class IndexAffiliates extends Component
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
        $lista =  Affiliate::where('status','=','active')
                        ->where('rfc','like','%'.$this->search.'%')
                        ->orderBy('name','asc')
                        ->paginate($this->numberRows);
        $count = $lista->count();
        return view('livewire.prestaciones.afiliados.index-affiliates',[
            'count' => $count,
            'lista' => $lista,]);
    }
}
