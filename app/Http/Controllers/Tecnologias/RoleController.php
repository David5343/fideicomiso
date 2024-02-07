<?php

namespace App\Http\Controllers\Tecnologias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('tecnologias.roles.index');
    }
}
