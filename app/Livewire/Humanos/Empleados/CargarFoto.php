<?php

namespace App\Livewire\Humanos\Empleados;

use App\Models\Humanos\Employee;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CargarFoto extends Component
{
    use WithFileUploads;
    #[Rule('required')]
    public $empleado_id;
    #[Rule('required|image|max:512')]
    public $foto;

    public function cargarFoto()
    {
        $this->validate();
        $customFoto = null;

        if($this->foto)
        {
            $uuid =Str::uuid();
            $customFoto = 'empleado/foto/'.$uuid.'.'.$this->foto->extension();
            $this->foto->storeAs('public',$customFoto);

        }
        $e = Employee::where('status','active')
                                        ->where('id',$this->empleado_id)
                                        ->first();
        if($e->photo == null){
            $e->photo = $customFoto;
            $e->modified_by = Auth::user()->email;
            $e->save();
            session()->flash('msg_tipo_modal','success');
            session()->flash('msg_modal','Imagen cargada con éxito!');
            $this->reset(['empleado_id','foto']);
            $this->dispatch('create_empleado',$e);  
        }else{
            Storage::delete('public/'.$e->photo);
            $e->photo = $customFoto;
            $e->modified_by = Auth::user()->email;
            $e->save();
            session()->flash('msg_tipo_modal','success');
            session()->flash('msg_modal','Imagen cargada con éxito!'); 
            $this->reset(['empleado_id','foto']);
            $this->dispatch('create_empleado',$e);        
        }

    } 
    public function cerrarModal(){
        $this->reset(['empleado_id','foto']);
        $this->resetValidation();
    }
    public function render()
    {
        $lista =  Employee::where('status','=','active')->get();
        return view('livewire.humanos.empleados.cargar-foto',['empleados'=>$lista]);
    }
}
