<?php

namespace App\Http\Controllers\Api\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\Subdependency;
use Illuminate\Http\Request;

class SubdependencyApiController extends Controller
{
    public function listar()
    {
        $subdepe = Subdependency::where('status','active')->get();
        return response()->json($subdepe);
    }
}
