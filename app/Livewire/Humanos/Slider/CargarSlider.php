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
    #[Rule('required|max:50')]
    public $titulo;
    #[Rule('required|max:150')]
    public $texto;
    #[Rule('required|image|max:512|dimensions:min_width=1600,min_height=700')]
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
