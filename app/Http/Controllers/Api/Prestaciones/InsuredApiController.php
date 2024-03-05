<?php

namespace App\Http\Controllers\Api\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\Insured;
use Illuminate\Http\Request;

class InsuredApiController extends Controller
{
    public function index()
    {   
        $titulares = Insured::where('status','active')
                                ->latest()
                                ->limit(25)
                                ->get();
        return response()->json($titulares);
    }
}
