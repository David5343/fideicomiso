<?php

namespace App\Http\Controllers\Api\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\Beneficiary;
use App\Models\Prestaciones\Insured;
use App\Models\Prestaciones\Subdependency;
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
    public function show($id)
    {
        $codigo = 0;
        $response['status'] ="fail";
        $response['message'] ="";
        $response['errors'] ="";
        $response['insured'] ="";
        $response['beneficiary'] ="";
        $response['history'] ="";
        $response['debug'] ="0";
        $familiar = Beneficiary::where('id',$id)
                            ->with('bank')
                            ->with('insured')
                            ->first();
        //datos de dependencia del titular que esta en el with de arriba->with('insured')
        $familiar->insured->subdependency = Subdependency::where('id',$familiar->insured->subdependency_id)->first();
        $familiar->secondary_insured = Insured::where('id',$familiar->secondary_insured_id)->first();
        if ($familiar == null) {
            $response['message'] = "Registro no encontrado";      
            $codigo = 200;
            return response()->json($response,status:$codigo);
        } else {
            $history = Beneficiary::where('file_number',$familiar->file_number)
            ->where('affiliate_status','Baja')
            ->with('bank')
            ->with('insured')
            ->get();
            $response['status'] ="success";
            $response['beneficiary'] =[$familiar];  
            $response['history'] =$history;      
            $codigo = 200;
            return response()->json($response,status:$codigo);     
        }
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
    public function porfolio(Request $request)
    {
        $dato = $request->dato;
        $codigo = 0;
        $response['status'] ="fail";
        $response['message'] ="";
        $response['errors'] ="";
        $response['insured'] ="";
        $response['beneficiary'] ="";
        $response['debug'] ="0";
        $familiar = Beneficiary::where('status','active')
                            ->where('file_number',$dato)
                            ->with('bank')
                            ->with('insured')
                            ->first();
        if ($familiar == null) {
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
    public function porrfc(Request $request)
    {
        $dato = $request->dato;
        $codigo = 0;
        $response['status'] ="fail";
        $response['message'] ="";
        $response['errors'] ="";
        $response['insured'] ="";
        $response['beneficiary'] ="";
        $response['debug'] ="0";
        $familiar = Beneficiary::where('status','active')
                            ->where('rfc',$dato)
                            ->with('bank')
                            ->with('insured')
                            ->first();
        if ($familiar == null) {
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
    public function porcurp(Request $request)
    {
        $dato = $request->dato;
        $codigo = 0;
        $response['status'] ="fail";
        $response['message'] ="";
        $response['errors'] ="";
        $response['insured'] ="";
        $response['beneficiary'] ="";
        $response['debug'] ="0";
        $familiar = Beneficiary::where('status','active')
                            ->where('curp',$dato)
                            ->with('bank')
                            ->with('insured')
                            ->first();
        if ($familiar == null) {
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
