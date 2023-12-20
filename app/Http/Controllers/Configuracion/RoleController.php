<?php

namespace App\Http\Controllers\Configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('configuracion.roles.index');
    }
}
