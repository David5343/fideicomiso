<?php

namespace App\Http\Controllers\Api\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\Beneficiary;
use App\Models\Prestaciones\Insured;
use App\Models\Prestaciones\Retiree;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class RetireeApiController extends Controller
{
    public function index()
    {

    }
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
        $response['status'] = 'fail';
        $response['errors'] = '';
        $response['retiree'] = '';
        $response['debug'] = '';

        $rules = [
            'Pension_id' => 'required | numeric',
            'Start_date' => 'required|date_format:Y-m-d',
        ];
        $validator = Validator::make($request->all(), $rules);
        // Comprobar si la validación falla
        if ($validator->fails()) {
            // Retornar errores de validación
            $response['errors'] = $validator->errors()->toArray();
            $response['debug'] = $request->input('Start_date');

            return response()->json($response, 200);
        }
         DB::beginTransaction();
        try {

            $pension = new Retiree();
            $no_afiliacion = IdGenerator::generate(['table' => 'retirees', 'field' => 'file_number', 'length' => 8, 'prefix' => 'P']);
            $pension->file_number = $no_afiliacion;
            $pension->start_date = $request->input('Start_date');
            $pension->insured_type = $request->input('Insured_type');
            $pension->pension_type = $request->input('Pension_type');
            if($request->input('Insured_id') == 0){
                $pension->insured_id = null;
            }else{
                $pension->insured_id =$request->input('Insured_id');
            }
            if($request->input('Beneficiary_id') == 0){
                $pension->beneficiary_id  = null;
            }else{
                $pension->beneficiary_id = $request->input('Beneficiary_id');
            }

            $pension->pension_status = 'ACTIVO';
            $pension->status = 'active';
            $pension->modified_by = Auth::user()->email;
            $pension->save();
            DB::commit();
            $response['status'] = 'success';
            $response['retiree'] = $pension->file_number;

            return response()->json($response, 200);
        } catch (Exception $e) {
            DB::rollBack();
            $response['debug'] = $e->getMessage();
            return response()->json($response, 200);
        }
    }
}
