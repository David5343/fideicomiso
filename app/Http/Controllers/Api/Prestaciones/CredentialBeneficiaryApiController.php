<?php

namespace App\Http\Controllers\Api\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\CredentialBeneficiary;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CredentialBeneficiaryApiController extends Controller
{
    public function index()
    {
        $familiares = CredentialBeneficiary::with('beneficiary')
            ->latest()
            ->limit(25)
            ->get();

        return response()->json($familiares);
    }

    public function show($id)
    {

        $codigo = 0;
        $response['status'] = 'fail';
        $response['message'] = '';
        $response['errors'] = '';
        $response['insured'] = '';
        $response['beneficiary'] = '';
        $response['history'] = '';
        $response['credential'] = '0';
        $response['debug'] = '0';
        $credencial = CredentialBeneficiary::where('id', $id)
            ->with('beneficiary.insured.subdependency')
            ->first();
        if ($credencial == null) {
            $response['message'] = 'Registro no encontrado';
            $codigo = 200;

            return response()->json($response, status: $codigo);
        } else {
            $history = CredentialBeneficiary::where('beneficiary_id', $credencial->beneficiary_id)
                ->where('credential_status', 'VENCIDA')
            // ->with('subdependency')
            // ->with('rank')
            // ->with('bank')
            // ->with('beneficiaries')
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
        $response['status'] = '0';
        $response['errors'] = '0';
        $response['insured'] = '0';
        $response['debug'] = '0';

        $rules = [
            'Beneficiary_id' => 'required|numeric',
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
        // Verificar si ya existe un registro "VIGENTE" para el retiree_id dado
        $existeVigente = CredentialBeneficiary::where('beneficiary_id', $request->input('Beneficiary_id'))
            ->where('credential_status', 'VIGENTE')
            ->exists();

        if ($existeVigente) {
            $response['errors'] = ['Beneficiary_id' => 'Ya existe una credencial vigente para este Familiar.'];

            return response()->json($response, 200);
        }
        DB::beginTransaction();
        try {
            $fechaActual = now()->toDateTimeString();
            $credencialFamiliar = new CredentialBeneficiary();
            $credencialFamiliar->issued_at = $fechaActual;
            $credencialFamiliar->expires_at = $request->input('Expires_at');
            $credencialFamiliar->beneficiary_id = $request->input('Beneficiary_id');
            $credencialFamiliar->expiration_types = 'PERSONALIZADO';
            $credencialFamiliar->credential_status = 'VIGENTE';
            $credencialFamiliar->status = 'active';
            $credencialFamiliar->modified_by = Auth::user()->email;
            $credencialFamiliar->save();
            DB::commit();
            $response['status'] = '1';
            $response['credential'] = $credencialFamiliar->id;

            return response()->json($response, 200);
        } catch (Exception $e) {
            DB::rollBack();
            $response['debug'] = $e->getMessage();

        }
    }
}
