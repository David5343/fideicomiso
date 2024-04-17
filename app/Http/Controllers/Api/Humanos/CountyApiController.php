<?php

namespace App\Http\Controllers\Api\Humanos;

use App\Http\Controllers\Controller;
use App\Models\Humanos\County;
use Illuminate\Http\Request;

class CountyApiController extends Controller
{
    public function listar()
    {
        $query = County::where('status','active')->get();
        //$subdepe["subdependencias"] = $query;
        return response()->json($query);
    }
}
