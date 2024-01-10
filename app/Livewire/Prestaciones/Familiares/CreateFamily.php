<?php

namespace App\Livewire\Prestaciones\Familiares;

use App\Models\Prestaciones\Affiliate;
use Livewire\Component;

class CreateFamily extends Component
{
    public $expediente ="";
    public $nombre_afiliado="";

    public function buscar()
    {
        $busqueda = Affiliate::where('file_number',$this->expediente)->first();
        dump($this->expediente);
        $this->nombre_afiliado = $busqueda->name;
    }

    public function render()
    {
        return view('livewire.prestaciones.familiares.create-family');
    }
}
