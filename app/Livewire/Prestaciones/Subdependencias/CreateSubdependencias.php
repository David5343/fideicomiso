<?php

namespace App\Livewire\Prestaciones\Subdependencias;

use App\Models\Prestaciones\Dependency;
use App\Models\Prestaciones\Subdependency;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Rule;

class CreateSubdependencias extends Component
{
    #[Rule('required|unique:subdependencies,name|min:5|max:50')]
    public $nombre;
    #[Rule('required')]
    public $dependencia_id;

    public function createSubdependency(){

        $this->validate();
        $sd = new Subdependency();
        $sd->name = $this->nombre;
        $sd->dependency_id = $this->dependencia_id;
        $sd->status = 'active';
        $sd->modified_by = Auth::user()->email;
        $sd->save();
        session()->flash('msg_tipo','success');
        session()->flash('msg','Registro creado con éxito!'); 
        $this->dispatch('create_subdependencia',$sd);
    }
    public function cerrarModal(){

        $this->reset(['nombre','dependencia_id']);
        $this->resetValidation();

    }
    public function render()
    {
        $select = Dependency::where('status','active')->get();
        return view('livewire.prestaciones.subdependencias.create-subdependencias',['select'=>$select]);
    }
}
