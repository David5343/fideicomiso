<?php

namespace App\Http\Controllers\Administracion\Tecnologias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('administracion.tecnologias.roles.index');
    }
}
