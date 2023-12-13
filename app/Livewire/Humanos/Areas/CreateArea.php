<?php

namespace App\Livewire\Humanos\Areas;

use App\Models\Humanos\Area;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Rule;

class CreateArea extends Component
{
    #[Rule('required', 'unique:areas,name', 'min:5', 'max:50')]
    public $nombre;

    public function guardar(){

        $validated = $this->validate();
        $area = new Area();
        $area->name = $validated['nombre'];
        $area->status = 'active';
        $area->modified_by = Auth::user()->email;
        $area->save();
        session()->flash('msg_tipo','success');
        session()->flash('msg','Registro creado con éxito!'); 
        $this->reset(['nombre']);
        $this->dispatch('create_area',$area);
    }
    public function cerrarModal(){

        $this->reset(['nombre']);

    }
    public function render(){

        return view('livewire.humanos.areas.create-area');

    }
}
