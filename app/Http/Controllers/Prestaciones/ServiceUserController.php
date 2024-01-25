<?php

namespace App\Http\Controllers\Prestaciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ServiceUserController extends Controller
{
    public function index()
    {
        return view('prestaciones.titulares.index');
    }
    public function create()
    {
        return  view('prestaciones.titulares.create');
    }
}
