<?php

namespace App\Livewire\Humanos\Categorias;

use App\Models\Humanos\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Rule;

class CreateCategoria extends Component
{
    #[Rule('required | min:5 | max:50 | unique:categories,name')]
    public $nombre;
    #[Rule('required | regex:/^\d{1,10}(\.\d{1,2})?$/')]
    public $sueldo;
    #[Rule('required | regex:/^\d{1,10}(\.\d{1,2})?$/')]
    public $compensacion;
    #[Rule('required | regex:/^\d{1,10}(\.\d{1,2})?$/')]
    public $complementaria;
    #[Rule('required | regex:/^\d{1,10}(\.\d{1,2})?$/')]
    public $isr;
    #[Rule('required | numeric | min:1 | max: 3')]
    public $plazas_autorizadas;

    public function guardar(){
        $validated = $this->validate();
        $categoria = new Category();
        //Haciendo calculos de sueldo bruto y sueldo neto
        if($validated['sueldo'] !== 0||$validated['compensacion'] !== 0||$validated['complementaria'] !== 0)
        {
            $sueldo_bruto = $validated['sueldo'] + $validated['compensacion'] + $validated['complementaria'] ;
            $categoria->gross_salary = $sueldo_bruto;
            if($validated['isr']  !== 0)
            {
                $sueldo_neto = $sueldo_bruto - $validated['isr'];
                $categoria->net_salary = $sueldo_neto;
            }
        }

        $categoria->name = $validated['nombre'];
        $categoria->salary = $validated['sueldo'];
        $categoria->compensation = $validated['compensacion'];
        $categoria->complementary = $validated['complementaria'];         
        $categoria->isr = $validated['isr']; 
        $categoria->authorized_places = $validated['plazas_autorizadas'];
        $categoria->covered_places = 0;
        $categoria->status = 'active';
        $categoria->modified_by = Auth::user()->email;
        $categoria->save();
        session()->flash('msg_tipo','success');
        session()->flash('msg','Registro creado con éxito!'); 
        $this->reset(['nombre','sueldo','compensacion','complementaria','isr','plazas_autorizadas']);
        $this->dispatch('create_categoria',$categoria);
    }
    public function cerrarModal(){
        $this->reset(['nombre','sueldo','compensacion','complementaria','isr','plazas_autorizadas']);
    }
    public function render(){
        return view('livewire.humanos.categorias.create-categoria');
    }
}
