<?php

namespace App\Http\Controllers\Administracion\Tecnologias;

use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function __construct()
    {

        $this->middleware('can:administracion.tecnologias.roles.index');

    }

    public function index()
    {
        return view('administracion.tecnologias.roles.index');
    }
}
