<?php

namespace App\Http\Controllers\Api\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\CredentialInsured;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Exception;

class CredentialInsuredApiController extends Controller
{
    public function index()
    {   
        $titulares = CredentialInsured::with('insured')
                                //->with('subdependency')
                                ->latest()
                                ->limit(25)
                                ->get();
        return response()->json($titulares);
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
        $response['credential'] ="0";
        $response['debug'] ="0";
        $credencial = CredentialInsured::where('id',$id)
                            ->with('insured.subdependency')
                            //->with('subdependency')
                            // ->with('bank')
                            // ->with('beneficiaries')
                            ->first();
        if ($credencial == null) {
            $response['message'] = "Registro no encontrado";      
            $codigo = 200;
            return response()->json($response,status:$codigo);
        } else {
            $history = CredentialInsured::where('insured_id',$credencial->insured_id)
            ->where('credential_status','VENCIDA')
            // ->with('subdependency')
            // ->with('rank')
            // ->with('bank')
            // ->with('beneficiaries')
            ->get();
            $response['status'] ="success";
            $response['credential'] =$credencial;  
            $response['history'] =$history;      
            $codigo = 200;
            return response()->json($response,status:$codigo);     
        }
    }
    public function store(Request $request)
    {
        $response['status'] ="0";
        $response['errors'] ="0";
        $response['insured'] ="0";
        $response['debug'] ="0";

        $rules=[
            'Insured_id'=> 'required|numeric',
            'Expires_at'=> 'required|date_format:Y-m-d H:i:s'
        ];
        $validator = Validator::make($request->all(),$rules);
        // Comprobar si la validación falla
        if ($validator->fails()) {
            // Retornar errores de validación
            $response['errors'] = $validator->errors()->toArray();
            $response['debug'] = $request->all();
            return response()->json($response, 200);
        }
        DB::beginTransaction();
        try
        {
            $fechaActual = now()->toDateTimeString();
           $credencialTitular = new CredentialInsured();
           $credencialTitular->issued_at = $fechaActual;
           $credencialTitular->expires_at = $request->input('Expires_at');
           $credencialTitular->insured_id = $request->input('Insured_id');
           $credencialTitular->expiration_types ="PERSONALIZADO";
           $credencialTitular->credential_status ="VIGENTE";
           $credencialTitular->status = 'active';
            $credencialTitular->modified_by = Auth::user()->email;
            $credencialTitular->save();
           DB::commit();
           $response['status'] ="1";
           $response['credential'] =$credencialTitular->id;
           return response()->json($response, 200);
        }catch(Exception $e){
            DB::rollBack();
            $response['debug'] =$e->getMessage(); 
            
        } 
    }
}