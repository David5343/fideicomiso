<?php

namespace App\Livewire\Administracion\Tecnologias\Permisos;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreatePermiso extends Component
{
    #[Validate('required|unique:permissions,name|min:5|max:50')]
    public $nombre;
    #[Validate('required')]
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
        return view('livewire.administracion.tecnologias.permisos.create-permiso',['select'=>$select]);
    }
}
