<?php

namespace App\Livewire\Humanos\Plazas;

use App\Models\Humanos\Category;
use App\Models\Humanos\Place;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Rule;

class CreatePlaza extends Component
{
    #[Rule('required','min:3','max:5','unique:places,place_number')]
    public $num_plaza;
    #[Rule('required','max:60')]
    public $puesto;
    #[Rule('required')]
    public $categoria_id;

    public function guardar(){
        $validated = $this->validate();
        $categoria = Category::find($validated['categoria_id']);  
        $autorizadas = $categoria->authorized_places;
        $ocupadas = $categoria->covered_places;
        if($ocupadas < $autorizadas){
            //Creando la plaza
            $plaza = new Place();
            $plaza->place_number = $validated['num_plaza'];
            $plaza->job_position = $validated['puesto'];
            $plaza->category_id = $validated['categoria_id'];
            $plaza->status = 'active';
            $plaza->modified_by = Auth::user()->email;
            $plaza->save();
            //incrementando el numero de plazas ocupadas de la categoria
            $categoria->increment('covered_places');
            $categoria->modified_by = Auth::user()->email;
            $categoria->save();
            session()->flash('msg_tipo','success');
            session()->flash('msg','Registro creado con éxito!');  
            $this->reset(['num_plaza','puesto','categoria_id']);
            $this->dispatch('create_plaza',$plaza);
        }else{
            session()->flash('msg_tipo','danger'); 
            session()->flash('msg','Supero el numero de plazas autorizadas para la categoria: '.$categoria->name);
        }
    }
    public function cerrarModal(){
        $this->reset(['num_plaza','puesto','categoria_id']);
    }
    public function render()
    {
        $select = Category::where('status','active')->get();
        return view('livewire.humanos.plazas.create-plaza',['select'=>$select]);
    }
}
