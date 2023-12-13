<?php

namespace App\Livewire\Humanos\Reportes;

use Livewire\Component;

class IndexReportes extends Component
{
    public $reporte;
    public function seleccion(){
        switch ($this->reporte) {
            case '1':
                // Acciones a realizar cuando $opcion es 'opcion1'
                return to_route('humanos.reportes.tabulador');
                break;
    
            case 'opcion2':
                // Acciones a realizar cuando $opcion es 'opcion2'
                return 'Seleccionaste la opción 2';
                break;
    
            case 'opcion3':
                // Acciones a realizar cuando $opcion es 'opcion3'
                return 'Seleccionaste la opción 3';
                break;
    
            default:
                // Acciones por defecto si $opcion no coincide con ninguna de las anteriores
                return 'Opción no válida';
                break;
        }
    }
    public function render()
    {
        return view('livewire.humanos.reportes.index-reportes');
    }
}
