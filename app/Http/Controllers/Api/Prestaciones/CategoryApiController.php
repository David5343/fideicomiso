<?php

namespace App\Http\Controllers\Api\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\Rank;

class CategoryApiController extends Controller
{
    public function listar()
    {
        $query = Rank::where('status', 'active')->get();

        //$subdepe["subdependencias"] = $query;
        return response()->json($query);
    }
}
