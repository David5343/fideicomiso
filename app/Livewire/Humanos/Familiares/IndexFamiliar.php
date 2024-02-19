<?php

namespace App\Livewire\Humanos\Familiares;

use App\Models\Humanos\EmployeeFamily;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class IndexFamiliar extends Component
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
    #[On('create_familia')]
    public function updateList($fam = null){

    }
    public function render()
    {
        $lista =  EmployeeFamily::where('status','=','active')
                                    ->where('name','like','%'.$this->search.'%')
                                    ->orwhere('last_name_1','like','%'.$this->search.'%')
                                    ->orwhere('last_name_2','like','%'.$this->search.'%')
                                    ->orderBy('created_at','desc')
                                    ->paginate($this->numberRows);
        $count = $lista->count();
        return view('livewire.humanos.familiares.index-familiar',[
            'count' => $count,
            'lista' => $lista,]);
    }
}
