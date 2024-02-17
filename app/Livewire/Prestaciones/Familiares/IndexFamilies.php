<?php

namespace App\Livewire\Prestaciones\Familiares;

use App\Models\Prestaciones\Beneficiary;
use Livewire\Component;

class IndexFamilies extends Component
{

    public $search='';
    public $busqueda_por;
    public $dato='';

    public function limpiar()
    {
        $this->dato ='';
    }
    public function buscar()
    {
        if($this->search !== ''){
            if($this->busqueda_por !== null){
                $row = Beneficiary::where($this->busqueda_por,$this->search)->first();
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
        $count = Beneficiary::where('status','active')
                ->get();
        $padres = Beneficiary::where('status','active')
                ->where('relationship','Padre')
                ->get();
        $madres = Beneficiary::where('status','active')
                ->where('relationship','Madre')
                ->get();
        $esposas = Beneficiary::where('status','active')
                ->where('relationship','Esposa')
                ->get();
        $hijos = Beneficiary::where('status','active')
                ->where('relationship','Hijo/a')
                ->get();
        $concubinas = Beneficiary::where('status','active')
                ->where('relationship','Concubina')
                ->get();
        $lista =  Beneficiary::where('status','active')
                        ->latest()
                        ->limit(25)
                        ->get();     
        return view('livewire.prestaciones.familiares.index-families',[
            'lista' => $lista,
            'dato' => $this->dato,
            'count' => $count->count(),
            'padres'=> $padres->count(),
            'madres'=> $madres->count(),
            'esposas'=> $esposas->count(),
            'hijos'=> $hijos->count(),
            'concubinas'=> $concubinas->count(),]);
    }
}
