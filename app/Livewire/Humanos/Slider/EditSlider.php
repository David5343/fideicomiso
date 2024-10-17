<?php

namespace App\Livewire\Humanos\Slider;

use App\Models\Humanos\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditSlider extends Component
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

    public $sliderId;

    public function cargarSlider()
    {
        $this->validate();
        $slider = Slider::find($this->sliderId);
        Storage::disk('public')->delete($slider->img);
        // session()->flash('msg_tipo','warning');
        // session()->flash('msg','El numero maximo de images para el slider es 3!');
        // $this->js("alert('El numero maximo de images para el slider es 3!')");
        $uuid = Str::uuid();
        $path = $this->imagen->storeAs('sliders', $uuid.'.'.$this->imagen->extension(), 'public');
        $slider->position = $this->posicion;
        $slider->title = $this->titulo;
        $slider->text = $this->texto;
        $slider->img = $path;
        $slider->modified_by = Auth::user()->email;
        $slider->save();
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Imagen cargada con éxito!');
        $this->js("alert('Imagen Cargada con exito')");

    }

    public function mount(Request $request)
    {
        // Obtener el valor de la variable en la URL
        $this->sliderId = $request->segment(3);
        $row = Slider::find($this->sliderId);
        $this->posicion = $row->position;
        $this->titulo = $row->title;
        $this->texto = $row->text;
    }

    public function render()
    {
        return view('livewire.humanos.slider.edit-slider');
    }
}
