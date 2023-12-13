<?php

namespace App\Livewire\Humanos\Municipios;

use App\Models\Humanos\County;
use App\Models\Humanos\State;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Rule;

class CreateMunicipio extends Component
{

    #[Rule('required','min:3','max:50','unique:counties,name')]
    public $nombre;
    #[Rule('required')]
    public $estado_id;

    public function guardar(){
        $validated = $this->validate();
        $municipio = new County();
        $municipio->name = $validated['nombre'];
        $municipio->state_id = $validated['estado_id'];
        $municipio->status = 'active';
        $municipio->modified_by = Auth::user()->email;
        $municipio->save();
        session()->flash('msg_tipo','success');
        session()->flash('msg','Registro creado con éxito!'); 
        $this->reset(['nombre','estado_id']);
        $this->dispatch('create_municipio',$municipio);
    }
    public function cerrarModal(){
        $this->reset(['nombre','estado_id']);
    }
    public function render()
    
    {
        $select = State::where('status','active')->get();
        return view('livewire.humanos.municipios.create-municipio',['select'=>$select]);
    }
}
