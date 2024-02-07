<?php

namespace App\Livewire\Tecnologias\Roles;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    #[Rule('required|unique:roles,name|min:5|max:50')]
    public $nombre;

    public function createRole(){

        $this->validate();
        $role = Role::create(['name' => $this->nombre]);
        session()->flash('msg_tipo','success');
        session()->flash('msg','Registro creado con éxito!'); 
        $this->dispatch('create_role',$role);
    }
    public function cerrarModal(){

        $this->reset(['nombre']);
        $this->resetValidation();

    }
    public function render()
    {
        return view('livewire.tecnologias.roles.create-role');
    }
}
