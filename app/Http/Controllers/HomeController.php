<?php

namespace App\Http\Controllers;

use App\Models\Humanos\Slider;
use Illuminate\Http\Request;

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
        $slider1 = Slider::find(1);
        $slider2 = Slider::find(2);
        $slider3 = Slider::find(3);
        return view('home',['slider1'=>$slider1,
                            'slider2'=>$slider2,
                            'slider3'=>$slider3]);
    }
}
