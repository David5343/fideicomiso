<?php

namespace App\Http\Controllers\Humanos;

use App\Http\Controllers\Controller;
use App\Models\Humanos\Slider;

class SliderController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('can:humanos.areas.index');
        //$this->middleware('subscribed')->except('store');
    }

    public function index()
    {
        $lista = Slider::all();

        return view('humanos.slider.index', ['lista' => $lista]);
    }

    public function create()
    {

        return view('humanos.slider.create');
    }

    public function edit(string $id)
    {
        $row = Slider::find($id);

        return view('humanos.slider.edit', ['slider' => $row]);
    }
}
