<?php

namespace App\Livewire\Humanos\Slider;

use App\Models\Humanos\Slider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

class CargarSlider extends Component
{
    use WithFileUploads;
    #[Validate('required')]
    public $posicion;
    #[Validate('required|max:50')]
    public $titulo;
    #[Validate('required|max:150')]
    public $texto;
    #[Validate('required|image|max:512|dimensions:min_width=1600,min_height=700')]
    public $imagen;

    public function cargarSlider()
    {
        $this->validate();
        $slider = new Slider();
        $count = $slider->count(); 
        if($count >= 3){
            session()->flash('msg_tipo','warning');
            session()->flash('msg','El numero maximo de images para el slider es 3!');
            $this->js("alert('El numero maximo de images para el slider es 3!')"); 
        }else {
            $uuid =Str::uuid();
            $path = $this->imagen->storeAs('sliders',$uuid.'.'.$this->imagen->extension(),'public');                      
            $slider->position = $this->posicion;
            $slider->title = $this->titulo;
            $slider->text = $this->texto;
            $slider->img= $path;
            $slider->modified_by = Auth::user()->email;
            $slider->save();
            session()->flash('msg_tipo','success');
            session()->flash('msg','Imagen cargada con éxito!');
            $this->js("alert('Imagen Cargada con exito')");           
        }
    } 
  
    public function render()
    {
        return view('livewire.humanos.slider.cargar-slider');
    }
}
