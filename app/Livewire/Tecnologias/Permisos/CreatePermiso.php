<?php

namespace App\Livewire\Tecnologias\Permisos;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreatePermiso extends Component
{
    #[Rule('required|unique:permissions,name|min:5|max:50')]
    public $nombre;
    #[Rule('required')]
    public $rol;

    public function createPermission(){

        $this->validate();
        $permission = Permission::create(['name' => $this->nombre]);
        $permission->assignRole($this->rol);
        session()->flash('msg_tipo','success');
        session()->flash('msg','Registro creado con éxito!'); 
        $this->dispatch('create_permission',$permission);
    }
    public function cerrarModal(){

        $this->reset(['nombre','rol']);
        $this->resetValidation();

    }
    public function render()
    {
        $select = Role::all();
        return view('livewire.tecnologias.permisos.create-permiso',['select'=>$select]);
    }
}
