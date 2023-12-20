<?php

namespace App\Http\Controllers\Prestaciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubdependencyController extends Controller
{
    public function index()
    {
        return view('prestaciones.subdependencias.index');
    }
}
