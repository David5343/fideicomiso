<?php

namespace App\Http\Controllers\Api\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\Insured;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

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

    public function idgenerator()
    {
        $no_expediente = IdGenerator::generate(['table' => 'insureds','field' => 'file_number', 'length' => 8, 'prefix' =>'T']);
        return response()->json($no_expediente);
    }
}

