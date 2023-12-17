<?php

namespace App\Livewire\Humanos\Estados;

use App\Models\Humanos\State;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Illuminate\Support\Str;

class CreateEstado extends Component
{
    #[Rule('required|unique:states,key|min:3|max:5')]
    public $clave;
    #[Rule('required|min:3|max:40')]
    public $nombre;

    public function createState(){
        $this->validate();
        $string = Str::upper($this->nombre);
        $estado = new State();
        $estado->key = $this->clave;
        $estado->name = $string;
        $estado->status = 'active';
        $estado->modified_by = Auth::user()->email;
        $estado->save();
        session()->flash('msg_tipo','success');
        session()->flash('msg','Registro creado con éxito!'); 
        $this->reset(['clave','nombre']);
        $this->dispatch('create_estado',$estado);
    }
    public function cerrarModal(){
        $this->reset(['clave','nombre']);
        $this->resetValidation();
    }
    public function render()
    {
        return view('livewire.humanos.estados.create-estado');
    }
}
