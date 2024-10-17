<?php

namespace App\Livewire\Humanos\Areas;

use App\Models\Humanos\Area;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateArea extends Component
{
    #[Rule('required|unique:areas,name|min:5|max:50')]
    public $nombre;

    public function createArea()
    {

        $this->validate();
        $area = new Area();
        $area->name = $this->nombre;
        $area->status = 'active';
        $area->modified_by = Auth::user()->email;
        $area->save();
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Registro creado con éxito!');
        $this->dispatch('create_area', $area);
    }

    public function cerrarModal()
    {

        $this->reset(['nombre']);
        $this->resetValidation();

    }

    public function render()
    {

        return view('livewire.humanos.areas.create-area');

    }
}
