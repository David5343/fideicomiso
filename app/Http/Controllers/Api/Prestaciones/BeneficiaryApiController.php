<?php

namespace App\Http\Controllers\Api\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\Beneficiary;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class BeneficiaryApiController extends Controller
{
    public function idgenerator()
    {
        $no_afiliacion = IdGenerator::generate(['table' => 'beneficiaries','field' => 'file_number', 'length' => 8, 'prefix' =>'F']);
        $response["no_afiliacion"] = $no_afiliacion;
        return response()->json($response);
    }
    public function index()
    {
        $familiares = Beneficiary::with('bank')
                                ->with('insured')
                                ->latest()
                                ->limit(25)
                                ->get();
        return response()->json($familiares);
    }
    public function store(Request $request)
    {

    }
}
