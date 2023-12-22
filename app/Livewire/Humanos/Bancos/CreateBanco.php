<?php

namespace App\Livewire\Humanos\Bancos;

use App\Models\Humanos\Bank;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Illuminate\Support\Str;

class CreateBanco extends Component
{
    #[Rule('required|unique:banks,key|min:3|max:5')]
    public $clave;
    #[Rule('required|min:3|max:50')]
    public $nombre;
    #[Rule('required|min:5|max:120')]
    public $razon_social;
    
    public function createBank(){

        $this->validate();
        $string = Str::upper($this->nombre);
        $banco = new Bank();
        $banco->key = $this->clave;
        $banco->name = $string;
        $banco->legal_name = $this->razon_social;
        $banco->status = 'active';
        $banco->modified_by = Auth::user()->email;
        $banco->save();
        session()->flash('msg_tipo','success');
        session()->flash('msg','Registro creado con éxito!'); 
        $this->dispatch('create_banco',$banco);
    }
    public function cerrarModal(){
        $this->reset(['clave','nombre','razon_social']);
        $this->resetValidation();
    }
    public function render(){
        return view('livewire.humanos.bancos.create-banco');
    }
}
