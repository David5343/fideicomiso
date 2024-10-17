<?php

namespace App\Livewire\Prestaciones\Categorias;

use App\Models\Prestaciones\Rank;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateCategorias extends Component
{
    #[Validate('required|unique:ranks,name|min:5|max:50')]
    public $nombre;

    public function createCategory()
    {

        $this->validate();
        $categoria = new Rank();
        $categoria->name = $this->nombre;
        $categoria->status = 'active';
        $categoria->modified_by = Auth::user()->email;
        $categoria->save();
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Registro creado con éxito!');
        $this->dispatch('create_categoria', $categoria);
    }

    public function cerrarModal()
    {

        $this->reset(['nombre']);
        $this->resetValidation();

    }

    public function render()
    {
        return view('livewire.prestaciones.categorias.create-categorias');
    }
}
