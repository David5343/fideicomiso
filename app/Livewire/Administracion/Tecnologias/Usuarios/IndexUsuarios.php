<?php

namespace App\Livewire\Administracion\Tecnologias\Usuarios;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    #[On('create_token')]
    public function crearToken($id)
    {
        $user = User::find($id);
        if($user->api_token == null){
            //tokens por default no caducan
            //Creando nuevo token
            $token = $user->createToken($user->email);
            $api_token= $token->plainTextToken;
            $user->api_token = $api_token;
            $user->modified_by = Auth::user()->email;
            $user->save();

        }else{
            //Eliminando token existente
            $user->tokens()->where('name', $user->email)->delete();
            //Creando nuevo token
            $token = $user->createToken($user->email);
            $api_token= $token->plainTextToken;
            $user->api_token = $api_token;
            $user->modified_by = Auth::user()->email;
            $user->save();
        }

    }
    public function render()
    {
        $lista =  User::where('status','active')
                        ->where('email','like','%'.$this->search.'%')
                        ->orderBy('created_at','desc')
                        ->paginate($this->numberRows);
        $count = $lista->count();
        return view('livewire.administracion.tecnologias.usuarios.index-usuarios',[
            'count' => $count,
            'lista' => $lista,]);
    }
}
