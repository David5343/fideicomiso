<?php

namespace App\Http\Controllers\Humanos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('can:humanos.areas.index');
        //$this->middleware('subscribed')->except('store');
    }
    public function create(){

        return view('humanos.slider.create');
    }

}
