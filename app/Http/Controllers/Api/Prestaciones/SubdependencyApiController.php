<?php

namespace App\Http\Controllers\Api\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\Subdependency;

class SubdependencyApiController extends Controller
{
    public function listar()
    {
        $query = Subdependency::where('status', 'active')->get();

        //$subdepe["subdependencias"] = $query;
        return response()->json($query);
    }
}
