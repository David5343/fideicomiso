<?php

namespace App\Http\Controllers\Humanos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function create(){

        return view('humanos.slider.create');
    }

}
