<?php

namespace App\Http\Controllers\Humanos;

use App\Http\Controllers\Controller;
use App\Models\Humanos\Category;
use App\Models\Humanos\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaceController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('can:humanos.plazas.index');
        //$this->middleware('subscribed')->except('store');
    }

    public function index()
    {
        return view('humanos.plazas.index');
    }

    public function edit(string $id)
    {
        $row = Place::find($id);
        $select = Category::where('status', 'active')->get();

        return view('humanos.plazas.edit', ['select' => $select, 'plaza' => $row]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'num_plaza' => ['required', 'min:4', 'max:4', 'unique:places,place_number,'.$id],
            'puesto' => ['required', 'max:60'],
            'categoria_id' => ['required'],
        ]);

        $row = Place::find($id);
        if ($row->category_id !== $request->input('categoria_id')) {
            $decremento = Category::where('id', $row->category_id)->first();
            $decremento->decrement('covered_places');
            $decremento->save();
            //
            $incremento = Category::where('id', $request->input('categoria_id'))->first();
            $incremento->increment('covered_places');
            $incremento->save();
        }
        $row->place_number = $request->input('num_plaza');
        $row->job_position = $request->input('puesto');
        $row->category_id = $request->input('categoria_id');
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Registro actualizado con éxito!');

        return to_route('humanos.plazas.index');

    }

    public function destroy(string $id)
    {
        $plaza = Place::find($id);
        $plaza->status = 'inactive';
        $plaza->modified_by = Auth::user()->email;
        $plaza->save();
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Registro deshabilidado con éxito!');

        return to_route('humanos.plazas.index');
    }
}
