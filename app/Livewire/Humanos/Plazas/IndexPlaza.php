<?php

namespace App\Livewire\Humanos\Plazas;

use App\Models\Humanos\Category;
use App\Models\Humanos\Place;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPlaza extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public $numberRows = 5;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingnumberRows()
    {
        $this->resetPage();
    }

    #[On('create_plaza')]
    public function updateList($plaza = null)
    {

    }

    public function render()
    {
        $lista = Place::where('status', 'active')
            ->where('place_number', 'like', '%'.$this->search.'%')
            ->orderBy('place_number', 'asc')
            ->paginate($this->numberRows);
        $count = Place::where('status', 'active')
            ->get();
        $tabulador = Category::where('status', 'active')->get();
        $pa = $tabulador->sum('authorized_places');
        $po = $tabulador->sum('covered_places');
        $pd = $pa - $po;

        return view('livewire.humanos.plazas.index-plaza', [
            'lista' => $lista,
            'count' => $count->count(),
            'pa' => $pa,
            'po' => $po,
            'pd' => $pd]);
    }
}
