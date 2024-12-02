<?php

namespace App\Http\Controllers\Api\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\Beneficiary;
use App\Models\Prestaciones\Insured;
use App\Models\Prestaciones\Retiree;
use App\Models\Prestaciones\Ticket;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TicketApiController extends Controller
{
    public function index()
    {
        $turnos = Ticket::with(['insured', 'beneficiary', 'retiree', 'retiree.insured', 'retiree.beneficiary'])
        ->whereDate('created_at', Carbon::today())
        ->latest()
        ->get();

        return response()->json($turnos);
    }
    public function busqueda(Request $request)
    {
        $dato = $request->dato;
        $codigo = 0;
        $response['status'] = 'fail';
        $response['message'] = '';
        $response['errors'] = '';
        $response['insured'] = null;
        $response['beneficiary'] = null;
        $response['retiree'] = null;
        $response['debug'] = '0';
        $titular = Insured::where('affiliate_status', 'Activo')
        ->where(function ($query) use ($dato) {
            $query->where('file_number', $dato)
                  ->orWhere('rfc', $dato)
                  ->orWhere('curp', $dato);
        })
        ->first();
        $familiar = Beneficiary::where('affiliate_status', 'Activo')
            ->where(function($query) use ($dato){
                $query->where('file_number', $dato)
                ->orwhere('rfc', $dato)
                ->orwhere('curp', $dato);
            })
            ->first();
            $retiree = Retiree::where('pension_status', 'ACTIVO')
            ->with(['pensionType', 'insured', 'beneficiary'])
            ->where('file_number', $dato)
            ->orwhere('noi_number', $dato)
            ->orWhereHas('insured', function ($query) use ($dato) {
                $query->where('file_number', $dato);
            })
            ->orWhereHas('insured', function ($query) use ($dato) {
                $query->where('rfc', $dato);
            })
            ->orWhereHas('insured', function ($query) use ($dato) {
                $query->where('curp', $dato);
            })
            ->orWhereHas('beneficiary', function ($query) use ($dato) {
                $query->where('file_number', $dato);
            })
            ->orWhereHas('beneficiary', function ($query) use ($dato) {
                $query->where('rfc', $dato);
            })
            ->orWhereHas('beneficiary', function ($query) use ($dato) {
                $query->where('curp', $dato);
            })
            ->first();
        if ($titular != null) {
            $response['status'] = 'success';
            $response['insured'] = $titular;
            $codigo = 200;

            return response()->json($response, status: $codigo);
        } elseif ($familiar != null) {
            $response['status'] = 'success';
            $response['beneficiary'] = $familiar;
            $codigo = 200;

            return response()->json($response, status: $codigo);
        }
        elseif ($retiree != null) {
            $response['status'] = 'success';
            $response['retiree'] = $retiree;
            $codigo = 200;

            return response()->json($response, status: $codigo);
        }
        else {

            $response['status'] = 'fail';
            $response['message'] = 'Registro no encontrado';
            $codigo = 200;

            return response()->json($response, status: $codigo);
        }
    }
    public function store(Request $request)
    {
        $response['status'] = 'fail';
        $response['message'] = '';
        $response['errors'] = '';
        $response['insured'] = '';
        $response['beneficiary'] = '';
        $response['retiree'] = '';
        $response['debug'] = '0';

        $rules = [
            'Ticket_number' => 'required | numeric | max:3 | min:1',
            'Requester' => 'required | max:70 | min:4',
            'Procedure_type' => 'required',
            'Requester_movil' =>'required | max:14',
            'Insured_type' =>'nullable'
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
            //$fecha = Carbon::parse($request->input('Ticket_date'))->format('Y-m-d H:i:s');
            $fechaActual = now()->toDateTimeString();
            $turno = new Ticket();
            $turno->ticket_number = $request->input('Ticket_number');
            $turno->requester = $request->input('Requester');
            $turno->ticket_date = $fechaActual;
            $turno->procedure_type = $request->input('Procedure_type');
            $turno->requester_movil = $request->input('Requester_movil');
            $turno->insured_type = $request->input('Insured_type');
            if($request->input('Insured_id') != null){
                $turno->insured_id = $request->input('Insured_id');
            }
            if($request->input('Beneficiary_id') != null){
                $turno->beneficiary_id = $request->input('Beneficiary_id');
            }
            if($request->input('Retiree_id') != null){
                $turno->retiree_id = $request->input('Retiree_id');
            }
            $turno->ticket_status = "EN PROCESO";
            $turno->status = 'active';
            $turno->modified_by = Auth::user()->email;
            $turno->save();
            DB::commit();
            $response['status'] = 'success';
            $response['ticket'] = $turno->id;

            return response()->json($response, 200);
        } catch (Exception $e) {
            DB::rollBack();
            $response['debug'] = $e->getMessage();

        }
    }
}
