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
    public $busqueda_por = null;
    public $dato='';

    public function updatingSearch(){
        $this->resetPage();
    }
    public function updatingnumberRows(){
        $this->resetPage();
    }
    public function limpiar()
    {
        $this->dato ='';
    }
    public function buscar()
    {
        if($this->search !== ''){
            if($this->busqueda_por !== "default"){
                $row = Insured::where($this->busqueda_por,$this->search)->first();
                if($row !== null){
                    $this->dato = $row;
                }else{
                    session()->flash('msg_tipo_busqueda','info');
                    session()->flash('msg_busqueda','Ups!, No se encontro ningun registro.'); 
                }
            }else{
                session()->flash('msg_tipo_busqueda','warning');
                session()->flash('msg_busqueda','Elija un Parámetro de Búsqueda.');
            }
        }else{
            session()->flash('msg_tipo_busqueda','warning');
            session()->flash('msg_busqueda','Ingrese un Parámetro Válido.'); 
        }

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
        $lista =  Insured::where('status','active')
                        ->latest()
                        ->limit(25)
                        ->get();
        return view('livewire.prestaciones.titulares.index-titulares',[
            'lista' => $lista,
            'dato' => $this->dato,
            'count' => $count->count(),
            'masculinos'=> $masculinos->count(),
            'femeninos'=> $femeninos->count(),
            'indefinidos'=> $indefinidos->count(),]);
    }
}
