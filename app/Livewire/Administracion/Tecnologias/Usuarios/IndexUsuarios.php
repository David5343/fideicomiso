<?php

namespace App\Livewire\Tecnologias\Usuarios;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class IndexUsuarios extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search='';
    public $numberRows = 5;

    public function updatingSearch(){
        $this->resetPage();
    }
    public function updatingnumberRows(){
        $this->resetPage();
    }
    #[On('create_user')]
    public function updateList($user = null){

    }
    public function render()
    {
        $lista =  User::where('status','=','active')
                        ->where('email','like','%'.$this->search.'%')
                        ->orderBy('created_at','desc')
                        ->paginate($this->numberRows);
        $count = $lista->count();
        return view('livewire.tecnologias.usuarios.index-usuarios',[
            'count' => $count,
            'lista' => $lista,]);
    }
}
