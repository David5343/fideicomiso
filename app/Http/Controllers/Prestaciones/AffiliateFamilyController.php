<?php

namespace App\Http\Controllers\Prestaciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AffiliateFamilyController extends Controller
{
    public function index()
    {
        return view('prestaciones.familiares.index');
    }
    public function create()
    {
        return view('prestaciones.familiares.create');
    }
}
