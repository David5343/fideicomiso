<?php

namespace App\Livewire\Configuracion\Usuarios;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Rule;

class CreateUsuarios extends Component
{
    #[Rule('required', 'string', 'max:255')]
    public $nombre;
    #[Rule('required', 'string', 'email', 'max:255', 'unique:users')]
    public $email;
    #[Rule('required', 'string', 'min:8')]
    public $password;

    public function guardar()
    {
        $validated = $this->validate();
        $usuario = new User();
        $usuario->name = $validated['nombre'];
        $usuario->email = $validated['email'];
        $usuario->password = $validated['password'];
        $usuario->status = 'active';
        $usuario->modified_by = Auth::user()->email;
        $usuario->save();
        session()->flash('msg_tipo','success');
        session()->flash('msg','Registro creado con éxito!'); 
        $this->dispatch('create_user',$usuario);
    }
    public function cerrarModal()
    {
        $this->reset(['nombre','email','password']);
        $this->resetValidation();
    }
    public function render()
    {
        return view('livewire.configuracion.usuarios.create-usuarios');
    }
}
