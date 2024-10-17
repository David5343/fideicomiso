<?php

namespace App\Livewire\Humanos\Areas;

use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditArea extends Component
{
    #[Rule('required')]
    public $nombre;

    #[On('enviar-id')]
    public function actualizar($id)
    {
        dd($id);
    }

    public function cerrarModal()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.humanos.areas.edit-area');
    }
}
