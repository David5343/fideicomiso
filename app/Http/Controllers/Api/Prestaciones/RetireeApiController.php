<?php

namespace App\Http\Controllers\Api\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\Beneficiary;
use App\Models\Prestaciones\Insured;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RetireeApiController extends Controller
{
    public function busqueda(Request $request)
    {
        $dato = $request->dato;
        $codigo = 0;
        $response['status'] = 'fail';
        $response['message'] = '';
        $response['errors'] = '';
        $response['insured'] = '';
        $response['beneficiary'] = '';
        $response['debug'] = '0';
        $titular = Insured::where('affiliate_status', 'Baja')
            ->where('inactive_motive', 'Pensión')
            ->where('id', $dato)
            ->orwhere('file_number', $dato)
            ->orwhere('rfc', $dato)
            ->orwhere('curp', $dato)
            ->orwhere('name', 'like', '%'.$dato.'%')
            ->orwhere('last_name_1', 'like', '%'.$dato.'%')
            ->orwhere('last_name_2', 'like', '%'.$dato.'%')
            ->get();
        $familiar = Beneficiary::where('affiliate_status', 'Baja')
            ->where('inactive_motive', 'Pensión')
            ->where('id', $dato)
            ->orwhere('file_number', $dato)
            ->orwhere('rfc', $dato)
            ->orwhere('curp', $dato)
            ->orwhere('name', 'like', '%'.$dato.'%')
            ->orwhere('last_name_1', 'like', '%'.$dato.'%')
            ->orwhere('last_name_2', 'like', '%'.$dato.'%')
            ->get();
        if ($titular->count() > 0) {
            $response['status'] = 'success';
            $response['insured'] = $titular;
            $codigo = 200;

            return response()->json($response, status: $codigo);
        } elseif ($familiar->count() > 0) {
            $response['status'] = 'success';
            $response['beneficiary'] = $familiar;
            $codigo = 200;

            return response()->json($response, status: $codigo);
        } else {

            $response['status'] = 'fail';
            $response['message'] = 'Registro no encontrado';
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
            'pension_type' => 'required | numeric',
            // 'Beneficiary_id' => 'required|numeric',
            // 'Expires_at' => 'required|date_format:Y-m-d H:i:s',
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
            //$fechaActual = now()->toDateTimeString();
            //$pension = Retiree
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
