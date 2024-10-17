<?php

namespace App\Livewire\Prestaciones\Dependencias;

use App\Models\Prestaciones\Dependency;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateDependencias extends Component
{
    #[Rule('required|unique:dependencies,name|min:5|max:50')]
    public $nombre;

    public function createDependency()
    {

        $this->validate();
        $dp = new Dependency();
        $dp->name = $this->nombre;
        $dp->status = 'active';
        $dp->modified_by = Auth::user()->email;
        $dp->save();
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Registro creado con éxito!');
        $this->dispatch('create_dependencia', $dp);
    }

    public function cerrarModal()
    {

        $this->reset(['nombre']);
        $this->resetValidation();

    }

    public function render()
    {
        return view('livewire.prestaciones.dependencias.create-dependencias');
    }
}
