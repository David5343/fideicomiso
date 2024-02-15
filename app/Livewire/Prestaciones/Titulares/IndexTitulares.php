<?php

namespace App\Livewire\Prestaciones\Titulares;

use App\Models\Prestaciones\Insured;
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
        $count = Insured::where('status','active')
                ->get();
        $masculinos = Insured::where('status','active')
                ->where('sex','Hombre')
                ->get();
        $femeninos = Insured::where('status','active')
                ->where('sex','Mujer')
                ->get();
        $indefinidos = Insured::where('status','active')
                ->where('sex',null)
                ->get();
        $lista =  Insured::where('status','=','active')
        ->where('rfc','like','%'.$this->search.'%')
        ->orderBy('rfc','asc')
        ->paginate($this->numberRows);
        return view('livewire.prestaciones.titulares.index-titulares',[
            'lista' => $lista,
            'count' => $count->count(),
            'masculinos'=> $masculinos->count(),
            'femeninos'=> $femeninos->count(),
            'indefinidos'=> $indefinidos->count()]);
    }
}
