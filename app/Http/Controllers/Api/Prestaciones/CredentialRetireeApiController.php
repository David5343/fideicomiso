<?php

namespace App\Http\Controllers\Api\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\CredentialRetiree;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CredentialRetireeApiController extends Controller
{
    public function index()
    {
        $pensionados = CredentialRetiree::with('retiree')
            ->latest()
            ->limit(25)
            ->get();

        return response()->json($pensionados);
    }
    public function show($id)
    {

        $codigo = 0;
        $response['status'] = 'fail';
        $response['message'] = '';
        $response['errors'] = '';
        $response['insured'] = '';
        $response['beneficiary'] = '';
        $response['retiree'] = '';
        $response['history'] = '';
        $response['credential'] = '0';
        $response['debug'] = '0';
        $credencial = CredentialRetiree::where('id', $id)
            ->with('retiree.insured')
            ->with('retiree.beneficiary')
                            //->with('subdependency')
                            // ->with('bank')
                            // ->with('beneficiaries')
            ->first();
        if ($credencial == null) {
            $response['message'] = 'Registro no encontrado';
            $codigo = 200;

            return response()->json($response, status: $codigo);
        } else {
            $history = CredentialRetiree::where('insured_id', $credencial->retiree_id)
                ->where('credential_status', 'VENCIDA')
                ->get();
            $response['status'] = 'success';
            $response['credential'] = $credencial;
            $response['history'] = $history;
            $codigo = 200;

            return response()->json($response, status: $codigo);
        }
    }
    public function store(Request $request)
    {
        $response['status'] = 'fail';
        $response['errors'] = '';
        $response['retiree'] = '';
        $response['debug'] = '';

        $rules = [
            'Retiree_id' => 'required | numeric',
            'Insured_id' => 'required|numeric',
            'Expires_at' => 'required|date_format:Y-m-d H:i:s',
        ];
        $validator = Validator::make($request->all(), $rules);
        // Comprobar si la validación falla
        if ($validator->fails()) {
            // Retornar errores de validación
            $response['errors'] = $validator->errors()->toArray();
            $response['debug'] = $request->all();

            return response()->json($response, 200);
        }
        DB::beginTransaction();
        try {
            $fechaActual = now()->toDateTimeString();
            $credencialRetire = new CredentialRetiree();
            $credencialRetire->issued_at = $fechaActual;
            $credencialRetire->expires_at = $request->input('Expires_at');
            $credencialRetire->retiree_id = $request->input('Retiree_id');
            if($request->input('Insured_type' == "Titular")){
                $credencialRetire->expiration_types = 'PERMANENTE';
            }else
            {
                $credencialRetire->expiration_types = 'PERSONALIZADO';
            }
            $credencialRetire->credential_status = 'VIGENTE';
            $credencialRetire->status = 'active';
            $credencialRetire->modified_by = Auth::user()->email;
            $credencialRetire->save();
            DB::commit();
            $response['status'] = 'success';
            $response['credential'] = $credencialRetire->id;

            return response()->json($response, 200);
        } catch (Exception $e) {
            DB::rollBack();
            $response['debug'] = $e->getMessage();

        }
    }
}
