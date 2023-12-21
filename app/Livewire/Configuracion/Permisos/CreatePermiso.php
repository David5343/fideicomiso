<?php

namespace App\Livewire\Configuracion\Permisos;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreatePermiso extends Component
{
    #[Rule('required|unique:permissions,name|min:5|max:50')]
    public $nombre;

    public function createPermission(){

        $this->validate();
        $role = Permission::create(['name' => $this->nombre]);
        session()->flash('msg_tipo','success');
        session()->flash('msg','Registro creado con éxito!'); 
        $this->reset(['nombre']);
        $this->resetValidation();
        $this->dispatch('create_role',$role);
    }
    public function cerrarModal(){

        $this->reset(['nombre']);
        $this->resetValidation();

    }
    public function render()
    {
        return view('livewire.configuracion.permisos.create-permiso');
    }
}
