<?php

namespace App\Livewire\Configuracion\Roles;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class IndexRoles extends Component
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
    #[On('create_role')]
    public function updateList($role = null){

    }
    public function render()
    {
        $lista =  Role::where('name','like','%'.$this->search.'%')
                        ->orderBy('name','asc')
                        ->paginate($this->numberRows);
        $count = $lista->count();
        return view('livewire.configuracion.roles.index-roles',[
            'count' => $count,
            'lista' => $lista,]);
    }
}
