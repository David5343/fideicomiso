<?php

namespace App\Http\Controllers;

use App\Models\Humanos\Slider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slider1 = Slider::where('position', 'Primero')->first();
        $slider2 = Slider::where('position', 'Segundo')->first();
        $slider3 = Slider::where('position', 'Tercero')->first();

        return view('home', ['slider1' => $slider1,
            'slider2' => $slider2,
            'slider3' => $slider3]);
    }
}
