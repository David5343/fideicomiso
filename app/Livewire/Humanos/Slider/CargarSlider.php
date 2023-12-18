<?php

namespace App\Livewire\Humanos\Slider;

use App\Models\Humanos\Slider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CargarSlider extends Component
{
    use WithFileUploads;
    #[Rule('required')]
    public $titulo_1;
    #[Rule('required')]
    public $texto_1;
    #[Rule('required|image|max:512')]
    public $imagen_1;
    // #[Rule('required')]
    // public $titulo_2;
    // #[Rule('required')]
    // public $text_2;
    // #[Rule('required|image|max:512')]
    // public $imagen_2;
    // #[Rule('required')]
    // public $titulo_3;
    // #[Rule('required')]
    // public $texto_3;
    // #[Rule('required|image|max:512')]
    // public $imagen_3;

    public function cargarSlider()
    {
        $this->validate();
        $customFoto_1 = null;

        if($this->imagen_1)
        {
            $uuid =Str::uuid();
            $customFoto_1 = 'slider/'.$uuid.'.'.$this->imagen_1->extension();
            $this->imagen_1->storeAs('public',$customFoto_1);

        }
        $search = Slider::where('img_1',$customFoto_1)
                                        ->count();
        dump($search);
        exit();
        if($search == null){
            $slider = new Slider();           
            $slider->img_1 = $customFoto_1;
            $slider->modified_by = Auth::user()->email;
            $slider->title_1 = $this->titulo_1;
            $slider->text_1 = $this->texto_1;
            $slider->save();
            session()->flash('msg_tipo','success');
            session()->flash('msg','Imagen cargada con éxito!');
            //$this->reset(['empleado_id','foto']);  
        }else{
            $row = Slider::find(1);
            dump($row);
            exit();
            Storage::delete('public/'.$row->img_1);
            $row->img_1 = $customFoto_1;
            $row->modified_by = Auth::user()->email;
            $row->title_1 = $this->titulo_1;
            $row->text_1 = $this->texto_1;
            $row->save();
            session()->flash('msg_tipo','success');
            session()->flash('msg','Imagen cargada con éxito!');
            //$this->reset(['empleado_id','foto']);        
        }

    } 

    public function cerrarModal(){
        //$this->reset(['empleado_id','foto']);
        $this->resetValidation();
    }    
    public function render()
    {
        return view('livewire.humanos.slider.cargar-slider');
    }
}
