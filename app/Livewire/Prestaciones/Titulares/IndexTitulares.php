<?php

namespace App\Livewire\Prestaciones\Titulares;

use App\Models\Prestaciones\Insured;
use Livewire\Component;
use Livewire\WithPagination;

class IndexTitulares extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $busqueda_por;
    public $dato;

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
        if(empty($this->search)){
            session()->flash('msg_tipo_busqueda','warning');
            session()->flash('msg_busqueda','Ingrese un Parámetro Válido.'); 

        }else{
            if(empty($this->busqueda_por)){
                session()->flash('msg_tipo_busqueda','warning');
                session()->flash('msg_busqueda','Elija un Parámetro de Búsqueda.');
                //dump($this->busqueda_por);
            }else{
                $row = Insured::where($this->busqueda_por,$this->search)->first();
                if($row !== null){
                    $this->dato = $row;
                }else{
                    session()->flash('msg_tipo_busqueda','info');
                    session()->flash('msg_busqueda','Ups!, No se encontro ningun registro.'); 
                }
            }
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
        $lista =  Insured::latest()
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
