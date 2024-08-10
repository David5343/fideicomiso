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
    public function busqueda(Request $request)
    {
        $dato = $request->dato;
        $codigo = 0;
        $response['status'] ="fail";
        $response['message'] ="";
        $response['errors'] ="";
        $response['insured'] ="";
        $response['beneficiary'] ="";
        $response['debug'] ="0";
        $familiar = Beneficiary::where('id',$dato)
                            ->orwhere('file_number',$dato)
                            ->orwhere('rfc',$dato)
                            ->orwhere('curp',$dato)
                            ->orwhere('name','like','%'.$dato.'%')
                            ->orwhere('last_name_1','like','%'.$dato.'%')
                            ->orwhere('last_name_2','like','%'.$dato.'%')
                            ->with('bank')
                            ->with('insured')
                            ->get();
        if ($familiar->isEmpty()) {
            $response['message'] = "Registro no encontrado";    
            $codigo = 200;
            return response()->json($response,status:$codigo);
        } else {
            $response['status'] ="success";
            $response['beneficiary'] =$familiar;        
            $codigo = 200;
            return response()->json($response,status:$codigo);     
        }
    }
}
