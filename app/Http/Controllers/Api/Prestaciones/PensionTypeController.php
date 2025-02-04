<?php

namespace App\Http\Controllers\Api\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\PensionType;

class PensionTypeController extends Controller
{
    public function index()
    {
        $tipoPensiones = PensionType::where('status', 'active')
            ->get();

        return response()->json($tipoPensiones);
    }
}
