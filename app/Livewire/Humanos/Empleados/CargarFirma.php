<?php

namespace App\Livewire\Humanos\Empleados;

use App\Models\Humanos\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class CargarFirma extends Component
{
    use WithFileUploads;

    #[Rule('required')]
    public $empleado_id;

    #[Rule('required|image|max:512')]
    public $firma;

    public function cargarFirma()
    {
        $this->validate();
        $customFirma = null;

        if ($this->firma) {
            $uuid = Str::uuid();
            $customFirma = 'empleado/firma/'.$uuid.'.'.$this->firma->extension();
            $this->firma->storeAs('public', $customFirma);

        }
        $e = Employee::where('status', 'active')
            ->where('id', $this->empleado_id)
            ->first();
        if ($e->signature == null) {
            $e->signature = $customFirma;
            $e->modified_by = Auth::user()->email;
            $e->save();
            session()->flash('msg_tipo_modal', 'success');
            session()->flash('msg_modal', 'Imagen cargada con éxito!');
            $this->reset(['empleado_id', 'firma']);
            $this->dispatch('create_empleado', $e);
        } else {
            Storage::delete('public/'.$e->signature);
            $e->signature = $customFirma;
            $e->modified_by = Auth::user()->email;
            $e->save();
            session()->flash('msg_tipo_modal', 'success');
            session()->flash('msg_modal', 'Imagen cargada con éxito!');
            $this->reset(['empleado_id', 'firma']);
            $this->dispatch('create_empleado', $e);
        }

    }

    public function cerrarModal()
    {
        $this->reset(['empleado_id', 'firma']);
        $this->resetValidation();
    }

    public function render()
    {
        $lista = Employee::where('status', 'active')->get();

        return view('livewire.humanos.empleados.cargar-firma', ['empleados' => $lista]);
    }
}
